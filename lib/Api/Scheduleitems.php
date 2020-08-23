<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Scheduleitems extends ForteResourceModel{

	private $authentication;

	function __construct($authentication)
	{
	    $this->authentication = $authentication;
	}

	public function setOrganizationId( $organization_id = null ){
		if( is_null($organization_id) ){
			throw new \Exception("setOrganizationId expects one string type parameter which contains the identification number of the merchant organization.");
		}

		if ( strpos($organization_id, 'org_') !== 0 ) {
		   	$this->organization_id = "org_".$organization_id;
		}else{
			$this->organization_id = $organization_id;
		}

		return $this;

	}

	public function getOrganizationId(){
		return $this->organization_id;
	}

	public function setLocationId( $location_id = null ){
		if( is_null($location_id) ){
			throw new \Exception("setLocationId expects one string type parameter which contains the identification number of the associated location.");
		}

		if ( strpos($location_id, 'loc_') !== 0 ) {
		   	$this->location_id = "loc_".$location_id;
		}else{
			$this->location_id = $location_id;
		}

		return $this;

	}

	public function getLocationId(){
		return $this->location_id;
	}

	public function setScheduleItemId( $schedule_item_id = null ){
		if( is_null($schedule_item_id) ){
			throw new \Exception("setScheduleItemId expects one string type parameter which contains a unique string used to represent a schedule item.");
		}

		if ( strpos($schedule_item_id, 'sci_') !== 0 ) {
		   	$this->schedule_item_id = "sci_".$schedule_item_id;
		}else{
			$this->schedule_item_id = $schedule_item_id;
		}

		return $this;

	}

	public function getScheduleItemId(){
		return $this->schedule_item_id;
	}

	public function setCustomerToken( $customer_token = null ){
		if( is_null($customer_token) ){
			throw new \Exception("setCustomerToken expects one string type parameter which contains a unique string used to represent a customer.");
		}

		if ( strpos($customer_token, 'cst_') !== 0 ) {
		   	$this->customer_token = "cst_".$customer_token;
		}else{
			$this->customer_token = $customer_token;
		}

		return $this;

	}

	public function getCustomerToken(){
		return $this->customer_token;
	}

	public function setPaymethodToken( $paymethod_token = null ){
		if( is_null($paymethod_token) ){
			throw new \Exception("setPaymethodToken expects one string type parameter which contains a unique string used to represent a payment method.");
		}

		if ( strpos($paymethod_token, 'mth_') !== 0 ) {
		   	$this->paymethod_token = "mth_".$paymethod_token;
		}else{
			$this->paymethod_token = $paymethod_token;
		}

		return $this;

	}

	public function getPaymethodToken()
	{
	    return $this->paymethod_token;
	}

	public function setTransactionId( $transaction_id = null ){
		if( is_null($transaction_id) ){
			throw new \Exception("setTransactionId expects one string type parameter which contains a unique string used to represent a completed schedule item.");
		}

		if ( strpos($transaction_id, 'trn_') !== 0 ) {
		   	$this->transaction_id = "trn_".$transaction_id;
		}else{
			$this->transaction_id = $transaction_id;
		}

		return $this;

	}

	public function getTransactionId()
	{
	    return $this->transaction_id;
	}

	public function setScheduleId( $schedule_id = null ){
		if( is_null($schedule_id) ){
			throw new \Exception("setScheduleId expects one string type parameter which contains a unique string used to represent a schedule.");
		}

		if ( strpos($schedule_id, 'sch_') !== 0 ) {
		   	$this->schedule_id = "sch_".$schedule_id;
		}else{
			$this->schedule_id = $schedule_id;
		}

		return $this;
	}

	public function getScheduleId()
	{
	    return $this->schedule_id;
	}

	public function setScheduleItemAmount( $schedule_item_amount = null ){
		if( is_null($schedule_item_amount) ){
			throw new \Exception("setScheduleItemAmount expects one decimal type parameter which indicates the amount of the scheduled item.");
		}

		$this->schedule_item_amount = $schedule_item_amount;

		return $this;
	}

	public function getScheduleItemAmount()
	{
	    return $this->schedule_item_amount;
	}

	public function setScheduleItemServiceFeeAmount( $schedule_item_service_fee_amount = null ){
		if( is_null($schedule_item_service_fee_amount) ){
			throw new \Exception("setScheduleItemServiceFeeAmount expects one decimal type parameter which contains the amount of the service fee.");
		}

		$this->schedule_item_service_fee_amount = $schedule_item_service_fee_amount;

		return $this;
	}

	public function getScheduleItemServiceFeeAmount()
	{
	    return $this->schedule_item_service_fee_amount;
	}

	public function setScheduleItemAuthorizationAmount( $schedule_item_authorization_amount = null ){
		if( is_null($schedule_item_authorization_amount) ){
			throw new \Exception("setScheduleItemAuthorizationAmount expects one decimal type parameter which indicates the amount of the scheule item.");
		}

		$this->schedule_item_authorization_amount = $schedule_item_authorization_amount;

		return $this;
	}

	public function getScheduleItemAuthorizationAmount()
	{
	    return $this->schedule_item_authorization_amount;
	}

	public function setScheduleItemStatus( $schedule_item_status = null ){
		if( is_null($schedule_item_status) ){
			throw new \Exception("setScheduleItemStatus expects one string type parameter which indicates the status of the scheduled item.");
		}

		$this->schedule_item_status = $schedule_item_status;

		return $this;
	}

	public function getScheduleItemStatus()
	{
	    return $this->schedule_item_status;
	}

	public function setScheduleItemDate( $schedule_item_date = null ){
		if( is_null($schedule_item_date) ){
			throw new \Exception("setScheduleItemDate expects one datetime type parameter which indicates the status of the scheduled item.");
		}

		$this->schedule_item_date = $schedule_item_date;

		return $this;
	}

	public function getScheduleItemDate()
	{
	    return $this->schedule_item_date;
	}

	public function setScheduleItemProcessDate( $schedule_item_processed_date = null ){
		if( is_null($schedule_item_processed_date) ){
			throw new \Exception("setScheduleItemProcessDate expects one datetime type parameter which indicates the date of the scheduled item.");
		}

		$this->schedule_item_processed_date = $schedule_item_processed_date;

		return $this;
	}

	public function getScheduleItemProcessDate()
	{
	    return $this->schedule_item_processed_date;
	}

	public function setScheduleItemCreatedDate( $schedule_item_created_date = null ){
		if( is_null($schedule_item_created_date) ){
			throw new \Exception("setScheduleItemCreatedDate expects one datetime type parameter which indicates the date when the merchant created the scheduled item.");
		}

		$this->schedule_item_created_date = $schedule_item_created_date;

		return $this;
	}

	public function getScheduleItemCreatedDate()
	{
	    return $this->schedule_item_created_date;
	}

	public function setScheduleItemDescription( $schedule_item_description = null ){
		if( is_null($schedule_item_description) ){
			throw new \Exception("setScheduleItemDescription expects one string type parameter which contains a brief description of the scheduled item being processed.");
		}

		$this->schedule_item_description = $schedule_item_description;

		return $this;
	}

	public function getScheduleItemDescription()
	{
	    return $this->schedule_item_description;
	}
	

	public function create( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( empty($this->schedule_id) ){
			throw new \Exception("Schedule_id is required. Please set the schedule id using the function setScheduleId.");
		}
		
		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/schedules/".$this->schedule_id."/scheduleitems";

		$json = self::executeCall(
		    $url,
		    "POST",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		$this->fromJson($json);

		return $this;

	}

	public function update( $scheduleitems_id = null, $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( empty($scheduleitems_id) ){
			throw new \Exception("update is required two parameters, one is authentication and another one is schedule items id.");
		}

		if ( strpos($scheduleitems_id, 'sci_') !== 0 ) {
			$scheduleitems_id = "sci_".$scheduleitems_id;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/scheduleitems/".$scheduleitems_id;

		$json = self::executeCall(
		    $url,
		    "PUT",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		$this->fromJson($json);

		return $this;

	}

	public function delete( $scheduleitems_id = null, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( empty($scheduleitems_id) ){
			throw new \Exception("delete is required schedule items id.");
		}

		if ( strpos($scheduleitems_id, 'sci_') !== 0 ) {
			$scheduleitems_id = "sci_".$scheduleitems_id;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/scheduleitems/".$scheduleitems_id;

		$json = self::executeCall(
		    $url,
		    "DELETE",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		$this->fromJson($json);

		return $this;

	}

	public function getScheduleItemsById( $scheduleitems_id = null, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( empty($scheduleitems_id) ){
			throw new \Exception("getScheduleItemsById is required schedule item id.");
		}

		if ( strpos($scheduleitems_id, 'sci_') !== 0 ) {
			$scheduleitems_id = "sci_".$scheduleitems_id;
		}

		$url = "/organizations/org_".$config['org_id']."/scheduleitems/".$scheduleitems_id;

		$json = self::executeCall(
		    $url,
		    "GET",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		$this->fromJson($json);

		return $this;

	}

	public function getScheduleItemsOfaLocation( $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/scheduleitems/";

		$json = self::executeCall(
		    $url,
		    "GET",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		$this->fromJson($json);

		return $this;

	}

	public function getScheduleItemsOfAnOrganization( $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/scheduleitems/";

		$json = self::executeCall(
		    $url,
		    "GET",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		$this->fromJson($json);

		return $this;

	}

	public function getScheduleItemsForaCustomer( $customer_token = null, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( empty($customer_token) ){
			throw new \Exception("getScheduleItemsForaCustomer is required customer token.");
		}

		if ( strpos($customer_token, 'cst_') !== 0 ) {
		   	$customer_token = "cst_".$customer_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/customers/".$customer_token."/scheduleitems?filter=schedule_item_status+eq+'scheduled'";

		$json = self::executeCall(
		    $url,
		    "GET",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		$this->fromJson($json);

		return $this;

	}

	public function getScheduleItemsForaPaymethod( $paymethod_token = null, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( empty($paymethod_token) ){
			throw new \Exception("getScheduleItemsForaPaymethod is required paymethod token.");
		}

		if ( strpos($paymethod_token, 'mth_') !== 0 ) {
		   	$paymethod_token = "mth_".$paymethod_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/paymethods/".$paymethod_token."/scheduleitems?filter=schedule_item_status+eq+'scheduled'";

		$json = self::executeCall(
		    $url,
		    "GET",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		$this->fromJson($json);

		return $this;

	}

}