<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;

Class Authentication{

	private $access_id     = '';

	private $secret_id     = '';

	private $authorization = '';

	private $requestId;

	private static $instance;

	public function __construct( $access_id = null, $secret_id = null, $requestId = null  ){

		if( !is_null( $access_id ) && !is_null( $secret_id ) ){

			$this->access_id = $access_id;
			$this->secret_id = $secret_id;
			$this->requestId = $requestId;

			$this->encode_auth_key();

		}else{
			throw new \Exception("Invalid access and secret ID.");
		}	

	}

	public function encode_auth_key(){

		$combine_access_id_secret_id = $this->access_id.':'.$this->secret_id;
		$this->authorization = base64_encode($combine_access_id_secret_id);
		return $this;

	}

	public function set_config( $config ){

		if( !is_array( $config ) ){

			throw new \Exception("Parameter must be an array.");

		}

		ForteConfigManager::getInstance()->addConfigs($config);
		return;

	}

	public function getConfig()
	{
	    return ForteConfigManager::getInstance()->getConfigHashmap();
	}

	public static function getInstance()
   	{
       	if (!isset(self::$instance)) {
           	self::$instance = new self();
      	}
       	return self::$instance;
   	}

   	public function getAuthorization(){
   		return $this->authorization;
   	}

   	/**
   	 * Get Request ID
   	 *
   	 * @return string
   	 */
   	public function getRequestId()
   	{
   	    return $this->requestId;
   	}

   	/**
   	 * Sets the request ID
   	 *
   	 * @param string $requestId the Forte-Request-Id value to use
   	 */
   	public function setRequestId($requestId)
   	{
   	    $this->requestId = $requestId;
   	}

   	public function getRequestHeaders()
    {
        $result = ForteConfigManager::getInstance()->get('http.headers');
        $headers = array();
        foreach ($result as $header => $value) {
            $headerName = ltrim($header, 'http.headers');
            $headers[$headerName] = $value;
        }
        return $headers;
    }

    public function addRequestHeader($name, $value)
    {
        // Determine if the name already has a 'http.headers' prefix. If not, add one.
        if (!(substr($name, 0, strlen('http.headers')) === 'http.headers')) {
            $name = 'http.headers.' . $name;
        }
        ForteConfigManager::getInstance()->addConfigs(array($name => $value));
    }

}