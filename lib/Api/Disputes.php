<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Disputes extends ForteResourceModel{

	private $authentication;

	function __construct($authentication)
	{
	    $this->authentication = $authentication;
	}

	public function getDisputesByOrganization( $org_id = null, $restCall = null ){
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}else{
			$org_id = $org_id;
		}

		$url = "/organizations/".$org_id."/disputes/";

		$json = self::executeCall(
		    $url,
		    "GET",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		return json_decode($json);
	}

	public function getDisputesBySearchFilter( $filter_data = null, $org_id = null, $restCall = null )
	{
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array( "X-Forte-Auth-Organization-Id" => "org_".$config['org_id'] );

		if( !is_array($filter_data) ){
			throw new \Exception('getDisputesBySearchFilter expects 2nd parameter ($filter_data) as an array contains "field" => "value".');
		}

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}else{
			$org_id = $org_id;
		}

		$num_items = count($filter_data);
		$i = 0;
		$search_query_string = '';
		foreach ($filter_data as $field => $value) {
			$search_query_string .= $field."+eq+'".$value."'";
			if(++$i !== $num_items) {
				$search_query_string .= "+and+";
			}	
		}

		$url = "/organizations/".$org_id."/disputes?filter=".$search_query_string;

		$json = self::executeCall(
		    $url,
		    "GET",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		return json_decode($json);
	}

	public function getDisputesByID( $dsp_id = null, $org_id = null, $restCall = null ){
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}else{
			$org_id = $org_id;
		}

		if ( strpos($dsp_id, 'dsp_') !== 0 ) {
			$dsp_id = "dsp_".$dsp_id;
		}else{
			$dsp_id = $dsp_id;
		}

		$url = "/organizations/".$org_id."/disputes/".$dsp_id;

		$json = self::executeCall(
		    $url,
		    "GET",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		return json_decode($json);
	}

}