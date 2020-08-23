<?php

namespace Shoukhin\Forte\Common;


class ForteModel
{

	private $_propMap = array();

	/**
     * Converts Params to Array
     *
     * @param $param
     * @return array
     */
    private function _convertToArray($param)
    {
        $ret = array();
        foreach ($param as $k => $v) {
            if ($v instanceof ForteModel) {
                $ret[$k] = $v->toArray();
            } elseif (is_array($v) && sizeof($v) <= 0) {
                $ret[$k] = array();
            } elseif (is_array($v)) {
                $ret[$k] = $this->_convertToArray($v);
            } else {
                $ret[$k] = $v;
            }
        }
        // If the array is empty, which means an empty object,
        // we need to convert array to StdClass object to properly
        // represent JSON String
        if (sizeof($ret) <= 0) {
            $ret = new ForteModel();
        }
        return $ret;
    }

    /**
     * Fills object value from Array list
     *
     * @param $arr
     * @return $this
     */
    public function fromArray($arr)
    {
        if (!empty($arr)) {
            // Iterate over each element in array
            foreach ($arr as $k => $v) {
                // If the value is an array, it means, it is an object after conversion
                if (is_array($v)) {
                    // Determine the class of the object
                    if (($clazz = ReflectionUtil::getPropertyClass(get_class($this), $k)) != null) {
                        // If the value is an associative array, it means, its an object. Just make recursive call to it.
                        if (empty($v)) {
                            if (ReflectionUtil::isPropertyClassArray(get_class($this), $k)) {
                                // It means, it is an array of objects.
                                $this->assignValue($k, array());
                                continue;
                            }
                            $o = new $clazz();
                            //$arr = array();
                            $this->assignValue($k, $o);
                        } elseif (ArrayUtil::isAssocArray($v)) {
                            /** @var self $o */
                            $o = new $clazz();
                            $o->fromArray($v);
                            $this->assignValue($k, $o);
                        } else {
                            // Else, value is an array of object/data
                            $arr = array();
                            // Iterate through each element in that array.
                            foreach ($v as $nk => $nv) {
                                if (is_array($nv)) {
                                    $o = new $clazz();
                                    $o->fromArray($nv);
                                    $arr[$nk] = $o;
                                } else {
                                    $arr[$nk] = $nv;
                                }
                            }
                            $this->assignValue($k, $arr);
                        }
                    } else {
                        $this->assignValue($k, $v);
                    }
                } else {
                    $this->assignValue($k, $v);
                }
            }
        }
        return $this;
    }

    private function assignValue($key, $value)
    {
        $setter = 'set'. $this->convertToCamelCase($key);
        // If we find the setter, use that, otherwise use magic method.
        if (method_exists($this, $setter)) {
            $this->$setter($value);
        } else {
            $this->__set($key, $value);
        }
    }

    /**
     * Converts the input key into a valid Setter Method Name
     *
     * @param $key
     * @return mixed
     */
    private function convertToCamelCase($key)
    {
        return str_replace(' ', '', ucwords(str_replace(array('_', '-'), ' ', $key)));
    }

    /**
     * Fills object value from Json string
     *
     * @param $json
     * @return $this
     */
    public function fromJson($json)
    {
        return $this->fromArray(json_decode($json, true));
    }

    //test function
    public function dd($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        exit();
    }


    /**
     * Returns array representation of object
     *
     * @return array
     */

	public function toArray()
	{
	    return $this->_convertToArray($this->_propMap);
	}

	/**
     * Returns object JSON representation
     *
     * @param int $options http://php.net/manual/en/json.constants.php
     * @return string
     */

	 /**
     * Magic Get Method
     *
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        if ($this->__isset($key)) {
            return $this->_propMap[$key];
        }
        return null;
    }

    private function _setMultiArrayValue(&$prop_map, $value)
    {
        foreach ($value as $k => $v) {
            if( !isset($prop_map[$k]) ){
                $prop_map[$k] = $v;
                return;
            }elseif (is_array($v)) {
                $this->_setMultiArrayValue($prop_map[$k], $v);
            }
        }
    }

    /**
     * Magic Set Method
     *
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        if (!is_array($value) && $value === null) {
            $this->__unset($key);
        }else if ( is_array($value) && !empty($value) && isset($this->{$key}) ) {
            $this->_setMultiArrayValue($this->_propMap[$key], $value);
            //$this->_propMap[$key] = $this->_propMap[$key]+$value;
        } else {
            $this->_propMap[$key] = $value;
        }
    }

    /**
     * Magic isSet Method
     *
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->_propMap[$key]);
    }

    /**
     * Magic Unset Method
     *
     * @param $key
     */
    public function __unset($key)
    {
        unset($this->_propMap[$key]);
    }

    public function toJSON($options = 0)
    {
        // Because of PHP Version 5.3, we cannot use JSON_UNESCAPED_SLASHES option
        // Instead we would use the str_replace command for now.
        // TODO: Replace this code with return json_encode($this->toArray(), $options | 64); once we support PHP >= 5.4
        if (version_compare(phpversion(), '5.4.0', '>=') === true) {
            return json_encode($this->toArray(), $options | 64);
        }
        return str_replace('\\/', '/', json_encode($this->toArray(), $options));
    }

}