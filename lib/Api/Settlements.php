<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Settlements extends ForteResourceModel{

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

	public function setFundingId( $funding_id = null ){
		if( is_null($funding_id) ){
			throw new \Exception("setFundingId expects one string type parameter which contains A unique string used to represent a funding entry.");
		}

		if ( strpos($funding_id, 'fnd_') !== 0 ) {
		   	$this->funding_id = "fnd_".$funding_id;
		}else{
			$this->funding_id = $funding_id;
		}

		return $this;

	}

	public function getFundingId(){
		return $this->funding_id;
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

	public function setCustomerId( $customer_id = null ){
		if( is_null($customer_id) ){
			throw new \Exception("setCustomerId expects one string type parameter which contains a merchant-defined string created at the customer level to identify the customer.");
		}

		$this->customer_id = $customer_id;

		return $this;
	}

	public function getCustomerId()
	{
	    return $this->customer_id;
	}

	public function setOrderNumber( $order_number = null ){
		if( is_null($order_number) ){
			throw new \Exception("setOrderNumber expects one string type parameter which contains a merchant-assigned ID code that is returned with the transaction response.");
		}

		$this->order_number = $order_number;

		return $this;
	}

	public function getOrderNumber()
	{
	    return $this->order_number;
	}

	public function setReferenceId( $reference_id = null ){
		if( is_null($reference_id) ){
			throw new \Exception("setReferenceId expects one string type parameter which contains a merchant-defined string that identifies the transaction.");
		}

		$this->reference_id = $reference_id;

		return $this;
	}

	public function getReferenceId()
	{
	    return $this->reference_id;
	}

	public function setSettleId( $settle_id = null ){
		if( is_null($settle_id) ){
			throw new \Exception("setSettleId expects one string type parameter which contains the settlement ID of the settled transaction.");
		}

		$this->settle_id = $settle_id;

		return $this;
	}

	public function getSettleId()
	{
	    return $this->settle_id;
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

	public function setSettleBatchId( $settle_batch_id = null ){
		if( is_null($settle_batch_id) ){
			throw new \Exception("setSettleBatchId expects one string type parameter which contains the ID of the credit card settlement batch, which the merchant can use to reconcile credit card bank deposits.");
		}
		
		$this->settle_batch_id = $settle_batch_id;

		return $this;
	}

	public function getSettleBatchId()
	{
	    return $this->settle_batch_id;
	}

	public function setSettleDate( $settle_date = null ){
		if( is_null($settle_date) ){
			throw new \Exception("setSettleDate expects one string type parameter which contains the date when the transaction was settled.");
		}
		
		$this->settle_date = $settle_date;

		return $this;
	}

	public function getSettleDate()
	{
	    return $this->settle_date;
	}

	public function setSettleType( $settle_type = null ){
		if( is_null($settle_type) ){
			throw new \Exception("setSettleType expects one string type parameter which contains the type of settlement.");
		}
		
		$this->settle_type = $settle_type;

		return $this;
	}

	public function getSettleType()
	{
	    return $this->settle_type;
	}

	public function setResponseCode( $settle_response_code = null ){
		if( is_null($settle_response_code) ){
			throw new \Exception("setResponseCode expects one string type parameter.");
		}
		
		$this->settle_response_code = $settle_response_code;

		return $this;
	}

	public function getResponseCode()
	{
	    return $this->settle_response_code;
	}

	public function setSettleAmount( $settle_amount = null ){
		if( is_null($settle_amount) ){
			throw new \Exception("setSettleAmount expects one string type parameter which contains the amount the transaction settled for.");
		}
		
		$this->settle_amount = $settle_amount;

		return $this;
	}

	public function getSettleAmount()
	{
	    return $this->settle_amount;
	}

	public function setMethod( $method = null ){
		if( is_null($method) ){
			throw new \Exception("setMethod expects one string type parameter which contains the payment method.");
		}
		
		$this->method = $method;

		return $this;
	}

	public function getMethod()
	{
	    return $this->method;
	}

	public function getSettlements( $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/settlements/";

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

	public function getSettlementsByTransactionId( $transaction_id = null, $restCall = null ){

		if( empty($transaction_id) ){
			throw new \Exception("getSettlementsByTransactionId is required transaction ID.");
		}

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if ( strpos($transaction_id, 'trn_') !== 0 ) {
		   	$transaction_id = "trn_".$transaction_id;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/".$transaction_id."/settlements/";

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

	public function getSettlementsByDate( $start_date = null, $end_date = null, $restCall = null )
	{

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/settlements/?filter=start_settle_date+eq+%27".$start_date."%27+AND+end_settle_date+eq+%27".$end_date."%27";

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