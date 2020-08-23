<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Fundings extends ForteResourceModel{

	private $authentication;

	function __construct($authentication)
	{
	    $this->authentication = $authentication;
	}

	public function getFundingsByOrganization( $org_id = null, $restCall = null ){
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

		$url = "/organizations/".$org_id."/fundings/";

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

	public function getFundingsByDateRange( $start_date = null, $end_date = null, $org_id = null, $restCall = null )
	{
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array( "X-Forte-Auth-Organization-Id" => "org_".$config['org_id'] );

		if( is_null($start_date) || is_null($end_date) ){
			throw new \Exception('getFundingsByDateRange expects two parameters which contains start and end date');
		}

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}else{
			$org_id = $org_id;
		}

		$search_query_string = "start_effective_date+eq+%27".$start_date."%27+and+end_effective_date+eq+%27".$end_date."%27";

		$url = "/organizations/".$org_id."/fundings?filter=".$search_query_string;

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

	public function getFundingsByID( $fund_id = null, $org_id = null, $restCall = null ){
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

		if ( strpos($fund_id, 'fnd_') !== 0 ) {
			$fund_id = "fnd_".$fund_id;
		}else{
			$fund_id = $fund_id;
		}

		$url = "/organizations/".$org_id."/fundings/".$fund_id;

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

	public function getTransactionsOfFunding( $fund_id = null, $org_id = null, $restCall = null ){
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

		if ( strpos($fund_id, 'fnd_') !== 0 ) {
			$fund_id = "fnd_".$fund_id;
		}else{
			$fund_id = $fund_id;
		}

		$url = "/organizations/".$org_id."/fundings/".$fund_id."/transactions";

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

	public function getSettlementsOfFunding( $fund_id = null, $org_id = null, $restCall = null ){
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

		if ( strpos($fund_id, 'fnd_') !== 0 ) {
			$fund_id = "fnd_".$fund_id;
		}else{
			$fund_id = $fund_id;
		}

		$url = "/organizations/".$org_id."/fundings/".$fund_id."/settlements";

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