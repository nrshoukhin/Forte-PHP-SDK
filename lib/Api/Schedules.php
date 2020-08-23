<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Schedules extends ForteResourceModel{

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

	public function setAction( $action = null ){
		if( is_null($action) ){
			throw new \Exception("setAction expects one string type parameter which contains the supported transaction types.");
		}

		$this->action = $action;

		return $this;
	}

	public function getAction()
	{
	    return $this->action;
	}

	public function setScheduleQuantity( $schedule_quantity = null ){
		if( is_null($schedule_quantity) ){
			throw new \Exception("setScheduleQuantity expects one string type parameter which indicates the quantity of transactions to perform.");
		}

		$this->schedule_quantity = $schedule_quantity;

		return $this;
	}

	public function getScheduleQuantity()
	{
	    return $this->schedule_quantity;
	}

	public function setScheduleFrequency( $schedule_frequency = null ){
		if( is_null($schedule_frequency) ){
			throw new \Exception("setScheduleFrequency expects one string type parameter which indicates the frequency of the scheduled transactions.");
		}

		$this->schedule_frequency = $schedule_frequency;

		return $this;
	}

	public function getScheduleFrequency()
	{
	    return $this->schedule_frequency;
	}

	public function setScheduleAmount( $schedule_amount = null ){
		if( is_null($schedule_amount) ){
			throw new \Exception("setScheduleAmount expects one string type parameter which indicates the amount of each recurring transaction plus any sales taxes, shipping fees, tips or other extraneous amounts.");
		}

		$this->schedule_amount = $schedule_amount;

		return $this;
	}

	public function getScheduleAmount()
	{
	    return $this->schedule_amount;
	}

	public function setScheduleServiceFeeAmount( $schedule_service_fee_amount = null ){
		if( is_null($schedule_service_fee_amount) ){
			throw new \Exception("setScheduleServiceFeeAmount expects one string type parameter which contains the amount of the service fee.");
		}

		$this->schedule_service_fee_amount = $schedule_service_fee_amount;

		return $this;
	}

	public function getScheduleServiceFeeAmount()
	{
	    return $this->schedule_service_fee_amount;
	}

	public function setScheduleAuthorizationAmount( $schedule_authorization_amount = null ){
		if( is_null($schedule_authorization_amount) ){
			throw new \Exception("setScheduleAuthorizationAmount expects one string type parameter which indicates the amount of the recurring payment.");
		}

		$this->schedule_authorization_amount = $schedule_authorization_amount;

		return $this;
	}

	public function getScheduleAuthorizationAmount()
	{
	    return $this->schedule_authorization_amount;
	}

	public function setScheduleStartDate( $schedule_start_date = null ){
		if( is_null($schedule_start_date) ){
			throw new \Exception("setScheduleStartDate expects one string type parameter which indicates the start day of the next recurring transaction in MM/DD/YYYY format.");
		}

		$this->schedule_start_date = $schedule_start_date;

		return $this;
	}

	public function getScheduleStartDate()
	{
	    return $this->schedule_start_date;
	}

	public function setScheduleCreatedDate( $schedule_created_date = null ){
		if( is_null($schedule_created_date) ){
			throw new \Exception("setScheduleCreatedDate expects one string type parameter which indicates the date the schedule was created.");
		}

		$this->schedule_created_date = $schedule_created_date;

		return $this;
	}

	public function getScheduleCreatedDate()
	{
	    return $this->schedule_created_date;
	}

	public function setCustomerAcctCode( $customer_acct_code = null ){
		if( is_null($customer_acct_code) ){
			throw new \Exception("setCustomerAcctCode expects one string type parameter which indicates the customer accounting code.");
		}

		$this->customer_acct_code = $customer_acct_code;

		return $this;
	}

	public function getCustomerAcctCode()
	{
	    return $this->customer_acct_code;
	}

	public function setSecCode( $sec_code = null ){
		if( is_null($sec_code) ){
			throw new \Exception("setSecCode expects one string type parameter which indicates Standard Entry Class code for the transaction.");
		}

		$this->sec_code = $sec_code;

		return $this;
	}

	public function getSecCode()
	{
	    return $this->sec_code;
	}

	public function setScheduleStatus( $schedule_status = null ){
		if( is_null($schedule_status) ){
			throw new \Exception("setScheduleStatus expects one string type parameter which indicates the current status of the schedule.");
		}

		$this->schedule_status = $schedule_status;

		return $this;
	}

	public function getScheduleStatus()
	{
	    return $this->schedule_status;
	}

	public function setItemDescription( $item_description = null ){
		if( is_null($item_description) ){
			throw new \Exception("setItemDescription expects one string type parameter which indicates the check number or other description of the item to be processed.");
		}

		$this->item_description = $item_description;

		return $this;
	}

	public function getItemDescription()
	{
	    return $this->item_description;
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

	public function setScheduleNextMonth( $schedule_next_amount = null ){
		if( is_null($schedule_next_amount) ){
			throw new \Exception("setScheduleNextMonth expects one string type parameter which contains the amount of the next scheduled transaction that will be processed.");
		}

		$this->summary = array("schedule_next_amount" => $schedule_next_amount);

		return $this;
	}

	public function getScheduleNextMonth()
	{
	    return $this->summary["schedule_next_amount"];
	}
	
	public function setScheduleNextDate( $schedule_next_date = null ){
		if( is_null($schedule_next_date) ){
			throw new \Exception("setScheduleNextDate expects one string type parameter which contains the next date when a scheduled transaction will be processed.");
		}

		$this->summary = array("schedule_next_date" => $schedule_next_date);

		return $this;
	}

	public function getScheduleNextDate()
	{
	    return $this->summary["schedule_next_date"];
	}

	public function setScheduleLastAmount( $schedule_last_amount = null ){
		if( is_null($schedule_last_amount) ){
			throw new \Exception("setScheduleLastAmount expects one string type parameter which contains the authorization amount for the last scheduled transaction that Forte processed.");
		}

		$this->summary = array("schedule_last_amount" => $schedule_last_amount);

		return $this;
	}

	public function getScheduleLastAmount()
	{
	    return $this->summary["schedule_next_date"];
	}

	public function setScheduleLastDate( $schedule_last_date = null ){
		if( is_null($schedule_last_date) ){
			throw new \Exception("setScheduleLastDate expects one string type parameter which contains the date and timestamp when Forte processed the last scheduled transaction.");
		}

		$this->summary = array("schedule_last_date" => $schedule_last_date);

		return $this;
	}

	public function getScheduleLastDate()
	{
	    return $this->summary["schedule_last_date"];
	}

	public function setScheduleSuccessfulAmount( $schedule_successful_amount = null ){
		if( is_null($schedule_successful_amount) ){
			throw new \Exception("setScheduleSuccessfulAmount expects one string type parameter which contains the total amount of the successful transactions for this schedule.");
		}

		$this->summary = array("schedule_successful_amount" => $schedule_successful_amount);

		return $this;
	}

	public function getScheduleSuccessfulAmount()
	{
	    return $this->summary["schedule_successful_amount"];
	}

	public function setScheduleSuccessfulAuthorizationAmount( $schedule_successful_authorization_amount = null ){
		if( is_null($schedule_successful_authorization_amount) ){
			throw new \Exception("setScheduleSuccessfulAuthorizationAmount expects one string type parameter which contains the authorization amount of the last scheduled transaction that Forte successfully processed.");
		}

		$this->summary = array("schedule_successful_authorization_amount" => $schedule_successful_authorization_amount);

		return $this;
	}

	public function getScheduleSuccessfulAuthorizationAmount()
	{
	    return $this->summary["schedule_successful_authorization_amount"];
	}

	public function setScheduleSuccessfulQuantity( $schedule_successful_quantity = null ){
		if( is_null($schedule_successful_quantity) ){
			throw new \Exception("setScheduleSuccessfulQuantity expects one string type parameter which contains the total number of successful transactions for this schedule.");
		}

		$this->summary = array("schedule_successful_quantity" => $schedule_successful_quantity);

		return $this;
	}

	public function getScheduleSuccessfulQuantity()
	{
	    return $this->summary["schedule_successful_quantity"];
	}

	public function setScheduleFailedAmount( $schedule_failed_amount = null ){
		if( is_null($schedule_failed_amount) ){
			throw new \Exception("setScheduleFailedAmount expects one string type parameter which contains the total amount of failed transactions for this schedule.");
		}

		$this->summary = array("schedule_failed_amount" => $schedule_failed_amount);

		return $this;
	}

	public function getScheduleFailedAmount()
	{
	    return $this->summary["schedule_failed_amount"];
	}

	public function setScheduleFailedQuantity( $schedule_failed_quantity = null ){
		if( is_null($schedule_failed_quantity) ){
			throw new \Exception("setScheduleFailedQuantity expects one string type parameter which contains the total number of failed transactions for this schedule.");
		}

		$this->summary = array("schedule_failed_quantity" => $schedule_failed_quantity);

		return $this;
	}

	public function getScheduleFailedQuantity()
	{
	    return $this->summary["schedule_failed_quantity"];
	}

	public function setScheduleRemainingAmount( $scheduled_remaining_amount = null ){
		if( is_null($scheduled_remaining_amount) ){
			throw new \Exception("setScheduleRemainingAmount expects one string type parameter which contains the total amount of the remaining transactions for this schedule.");
		}

		$this->summary = array("scheduled_remaining_amount" => $scheduled_remaining_amount);

		return $this;
	}

	public function getScheduleRemainingAmount()
	{
	    return $this->summary["scheduled_remaining_amount"];
	}

	public function setScheduleRemainingQuantity( $scheduled_remaining_quantity = null ){
		if( is_null($scheduled_remaining_quantity) ){
			throw new \Exception("setScheduleRemainingQuantity expects one string type parameter which contains the total number of the remaining transactions for this schedule.");
		}

		$this->summary = array("scheduled_remaining_quantity" => $scheduled_remaining_quantity);

		return $this;
	}

	public function getScheduleRemainingQuantity()
	{
	    return $this->summary["scheduled_remaining_quantity"];
	}

	public function setScheduleSuspendedAmount( $scheduled_suspended_amount = null ){
		if( is_null($scheduled_suspended_amount) ){
			throw new \Exception("setScheduleSuspendedAmount expects one string type parameter which contains the total amount of the suspended transactions for this schedule.");
		}

		$this->summary = array("scheduled_suspended_amount" => $scheduled_suspended_amount);

		return $this;
	}

	public function getScheduleSuspendedAmount()
	{
	    return $this->summary["scheduled_suspended_amount"];
	}

	public function setScheduleSuspendedQuantity( $scheduled_suspended_quantity = null ){
		if( is_null($scheduled_suspended_quantity) ){
			throw new \Exception("setScheduleSuspendedQuantity expects one string type parameter which contains the total number of suspended transactions for this schedule.");
		}

		$this->summary = array("scheduled_suspended_quantity" => $scheduled_suspended_quantity);

		return $this;
	}

	public function getScheduleSuspendedQuantity()
	{
	    return $this->summary["scheduled_suspended_quantity"];
	}

	public function setXdata( $xdata = null ){
		if( is_null($xdata) ){
			throw new \Exception("setXdata expects one string type parameter which contains up to nine fields (1-9) of extra data that can be associated with a schedule or transaction.");
		}

		if ( strpos($xdata, 'xdata_') !== 0 ) {
		   	$this->xdata = array("xdata_1-9" => "xdata_".$xdata);
		}else{
			$this->xdata = array("xdata_1-9" => $xdata);
		}

		return $this;
	}

	public function getXdata()
	{
	    return $this->xdata["xdata_1-9"];
	}

	public function create( $customer_token = null, $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( !empty($customer_token) ){
			if ( strpos($customer_token, 'cst_') !== 0 ) {
			   	$customer_token = "cst_".$customer_token;
			}
			
			$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/customers/".$customer_token."/schedules";
		}else{
			$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/schedules";
		}

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

	public function update( $schedule_id = null, $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( empty($schedule_id) ){
			throw new \Exception("update is required schedule id.");
		}

		if ( strpos($schedule_id, 'sch_') !== 0 ) {
			$schedule_id = "sch_".$schedule_id;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/schedules/".$schedule_id;

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

	public function delete( $schedule_id = null, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( empty($schedule_id) ){
			throw new \Exception("Delete is required schedule id.");
		}

		if ( strpos($schedule_id, 'sch_') !== 0 ) {
			$schedule_id = "sch_".$schedule_id;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/schedules/".$schedule_id;

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

	public function getSchedulesForALocation( $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/schedules/";

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

	public function getSchedulesForACustomer( $customer_token = null, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( empty($customer_token) ){
			throw new \Exception("getSchedulesForACustomer is required customer token.");
		}

		if ( strpos($customer_token, 'cst_') !== 0 ) {
			$customer_token = "cst_".$customer_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/customers/".$customer_token."/schedules";

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

	public function getScheduleById( $schedule_id = null, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( empty($schedule_id) ){
			throw new \Exception("getScheduleById is required schedule id.");
		}

		if ( strpos($schedule_id, 'sch_') !== 0 ) {
			$schedule_id = "sch_".$schedule_id;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/schedules/".$schedule_id;

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