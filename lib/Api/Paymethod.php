<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Paymethod extends ForteResourceModel{

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

	public function setLabel( $label = null ){

		if( is_null($label) ){

			throw new \Exception("setLabel expects one string type parameter.");
		}

		$this->label = $label;

		return $this;

	}

	public function getLabel(){

		return $this->label;

	}

	public function setCustomerId( $customer_id = null ){
		if( is_null($customer_id) ){
			throw new \Exception("setCustomerId expects one string type parameter which contains a merchant-defined string used to identify the customer.");
		}else{
			$this->customer_id = $customer_id;
		}
		return $this;
	}

	public function getCustomerId(){
		return $this->customer_id;
	}

	public function setIsDefault( $is_default = null ){
		if( is_null($is_default) ){
			throw new \Exception("setCustomerId expects one string type parameter which indicates whether or not a payment method is the Default Payment Method for a customer.");
		}else{
			$this->is_default = $is_default;
		}
		return $this;
	}

	public function getIsDefault(){
		return $this->is_default;
	}

	public function setBillingAddressToken( $billing_address_token = null ){
		if( is_null($billing_address_token) ){
			throw new \Exception("setBillingAddressToken expects one string type parameter which contains a unique string used to represent the billing address associated with this payment method.");
		}else{
			if ( strpos($billing_address_token, 'add_') !== 0 ) {
			   	$this->billing_address_token = "add_".$billing_address_token;
			}else{
				$this->billing_address_token = $billing_address_token;
			}
		}
		return $this;
	}

	public function getBillingAddressToken(){
		return $this->billing_address_token;
	}

	public function setNotes( $notes = null ){

		if( is_null($notes) ){

			throw new \Exception("set_notes expects one string type parameter.");
		}

		$this->notes = $notes;

		return $this;

	}

	public function getNotes(){

		return $this->notes;

	}

	public function setCardType( $card_type = null ){

		if( is_null($card_type) ){

			throw new \Exception("setCardType expects one string type parameter.");
		}

		$this->card = array("card_type" => $card_type);

		return $this;

	}

	public function getCardType(){

		return $this->card["card_type"];

	}

	public function setNameOnCard( $name_on_card = null ){

		if( is_null($name_on_card) ){

			throw new \Exception("setNameOnCard expects one string type parameter.");
		}

		$this->card = array("name_on_card" => $name_on_card);

		return $this;

	}

	public function getNameOnCard(){

		return $this->card["name_on_card"];

	}

	public function setCardLast4AccountNumber( $last_4_account_number = null ){

		if( is_null($last_4_account_number) ){

			throw new \Exception("setCardLast4AccountNumber expects one string type parameter which contains the last four digits of the redactied DDA or eCheck account number.");
		}

		$this->card = array("last_4_account_number" => $last_4_account_number);

		return $this;

	}

	public function getCardLast4AccountNumber(){
		return $this->card["last_4_account_number"];
	}

	public function setCardAccountNumber( $account_number = null ){

		if( is_null($account_number) ){

			throw new \Exception("setCardAccountNumber expects one string type parameter.");
		}

		$this->card = array("account_number" => $account_number);

		return $this;

	}

	public function getCardAccountNumber(){

		return $this->card["account_number"];

	}

	public function setExpireMonth( $expire_month = null ){

		if( is_null($expire_month) ){

			throw new \Exception("setExpireMonth expects one string type parameter.");
		}

		$this->card = array("expire_month" => $expire_month);

		return $this;

	}

	public function getExpireMonth(){

		return $this->card["expire_month"];

	}

	public function setExpireYear( $expire_year = null ){

		if( is_null($expire_year) ){

			throw new \Exception("set_expire_year expects one string type parameter");
		}

		$this->card = array("expire_year" => $expire_year);

		return $this;

	}

	public function getExpireYear(){

		return $this->card["expire_year"];

	}

	public function setCardVerificationValue( $card_verification_value = null ){

		if( is_null($card_verification_value) ){

			throw new \Exception("setCardVerificationValue expects one string type parameter.");
		}

		$this->card = array("card_verification_value" => $card_verification_value);

		return $this;

	}

	public function getCardVerificationValue(){

		return $this->card["card_verification_value"];

	}

	public function setProcurementCard( $procurement_card = null ){

		if( is_null($procurement_card) ){

			throw new \Exception("setProcurementCard expects one string type parameter which indicates whether or not this is a procurement card transaction.");
		}

		$this->card = array("procurement_card" => $procurement_card);

		return $this;

	}

	public function getProcurementCard(){

		return $this->card["procurement_card"];

	}

	public function setCardOneTimeToken( $one_time_token = null ){
		if( is_null($one_time_token) ){
			throw new \Exception("setCardOneTimeToken expects one string type parameter which is a single use token generated by Forte.js.");
		}else{
			if ( strpos($one_time_token, 'ott_') !== 0 ) {
				$one_time_token = "ott_".$one_time_token;
			}
			$this->card = array("one_time_token" => $one_time_token);
		}
		return $this;
	}

	public function getCardOneTimeToken(){
		return $this->card["one_time_token"];
	}

	public function setCustomerAccountingCode( $customer_accounting_code = null ){

		if( is_null($customer_accounting_code) ){

			throw new \Exception("setCustomerAccountingCode expects one string type parameter which contains procurement card accounting code.");
		}

		$this->card = array("customer_accounting_code" => $customer_accounting_code);

		return $this;

	}

	public function getCustomerAccountingCode(){

		return $this->card["customer_accounting_code"];

	}

	public function setAuCode( $au_code = null ){

		if( is_null($au_code) ){

			throw new \Exception("setAuCode expects one string type parameter which indicates the type of changes Account Updater found for the card associated with that payment token.");
		}

		$this->card = array("au_code" => $au_code);

		return $this;

	}

	public function getAuCode(){

		return $this->card["au_code"];

	}

	public function setSuppressAccountUpdater( $suppress_account_updater = null ){

		if( $suppress_account_updater !== "true" && $suppress_account_updater !== "false" ){

			throw new \Exception("setSuppressAccountUpdater expects one string type parameter contains 'true' or 'false'.");
		}

		$this->card = array("suppress_account_updater" => $suppress_account_updater);

		return $this;

	}

	public function getSuppressAccountUpdater(){

		return $this->card["suppress_account_updater"];

	}

	public function setAuUpdateDate( $au_updated_date = null ){

		if( is_null($au_updated_date) ){

			throw new \Exception("setAuUpdateDate expects one string type parameter which contains the date and timestamp when the token was last updated by Forte's Account Updater services.");
		}

		$this->card = array("au_updated_date" => $au_updated_date);

		return $this;

	}

	public function getAuUpdateDate(){

		return $this->card["au_updated_date"];

	}

	public function setAuDescription( $au_description = null ){

		if( is_null($au_description) ){

			throw new \Exception("setAuDescription expects one string type parameter which contains a concise description of what update was performed on the credit card associated with the payment token.");
		}

		$this->card = array("au_description" => $au_description);

		return $this;

	}

	public function getAuDescription(){

		return $this->card["au_description"];

	}

	public function setAccountHolder( $account_holder = null ){

		if( is_null($account_holder) ){

			throw new \Exception("setAccountHolder expects one string type parameter.");
		}

		$this->echeck = array("account_holder" => $account_holder);

		return $this;

	}

	public function getAccountHolder(){

		return $this->echeck["account_holder"];

	}

	public function setEcheckLast4AccountNumber( $last_4_account_number = null ){

		if( is_null($last_4_account_number) ){

			throw new \Exception("set_last_4_account_number expects one string type parameter which contains the last four digits of the redactied DDA or eCheck account number.");
		}

		$this->echeck = array("last_4_account_number" => $last_4_account_number);

		return $this;

	}

	public function getEcheckLast4AccountNumber(){
		return $this->echeck["last_4_account_number"];
	}

	public function setAccountNumber( $account_number = null ){

		if( is_null($account_number) ){

			throw new \Exception("setAccountNumber expects one string type parameter.");
		}

		$this->echeck = array("account_number" => $account_number);

		return $this;

	}

	public function getAccountNumber(){

		return $this->echeck["account_number"];

	}

	public function setRoutingNumber( $routing_number = null ){

		if( is_null($routing_number) ){

			throw new \Exception("setRoutingNumber expects one string type parameter.");
		}

		$this->echeck = array("routing_number" => $routing_number);

		return $this;

	}

	public function getRoutingNumber(){

		return $this->echeck["routing_number"];

	}

	public function setAccountType( $account_type = null ){

		if( is_null($account_type) ){

			throw new \Exception("setAccountType expects one string type parameter");
		}

		$this->echeck = array("account_type" => $account_type);

		return $this;

	}

	public function getAccountType(){

		return $this->echeck["account_type"];

	}

	public function setSecCode( $sec_code = null ){

		if( is_null($sec_code) ){

			throw new \Exception("setSecCode expects one string type parameter");
		}

		$this->echeck = array("sec_code" => $sec_code);

		return $this;

	}

	public function getSecCode(){

		return $this->echeck["sec_code"];

	}

	public function setEcheckOneTimeToken( $one_time_token = null ){
		if( is_null($one_time_token) ){
			throw new \Exception("setEcheckOneTimeToken expects one string type parameter which is a single use token generated by Forte.js.");
		}else{
			if ( strpos($one_time_token, 'ott_') !== 0 ) {
				$one_time_token = "ott_".$one_time_token;
			}
			$this->echeck = array("one_time_token" => $one_time_token);
		}
		return $this;
	}

	public function getEcheckOneTimeToken(){
		return $this->echeck["one_time_token"];
	}

	public function setItemDescription( $item_description = null ){

		if( is_null($item_description) ){

			throw new \Exception("setItemDescription expects one string type parameter");
		}

		$this->echeck = array("item_description" => $item_description);

		return $this;

	}

	public function getItemDescription(){

		return $this->echeck["item_description"];

	}

	/**
	 * Identifier of the paymethod.
	 *
	 * @return string
	 */
	public function getPaymethodToken()
	{
	    return $this->paymethod_token;
	}

	public function create( $customer_token = null, $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( is_null($customer_token) ){
			$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/paymethods";
		}else{
			if ( strpos($customer_token, 'cst_') !== 0 ) {
				$customer_token = "cst_".$customer_token;
			}
			$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/customers/".$customer_token."/paymethods";
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

	public function update( $paymethod_token, $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if ( strpos($paymethod_token, 'mth_') !== 0 ) {
			$paymethod_token = "mth_".$paymethod_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/paymethods/".$paymethod_token;

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

	public function delete( $paymethod_token, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if ( strpos($paymethod_token, 'mth_') !== 0 ) {
			$paymethod_token = "mth_".$paymethod_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/paymethods/".$paymethod_token;

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

	public function createLocationlessPaymethod( $customer_token, $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if ( strpos($customer_token, 'cst_') !== 0 ) {
			$customer_token = "cst_".$customer_token;
		}
		$url = "/customers/".$customer_token."/paymethods";

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

	public function getPaymethodByCustomerToken( $customer_token, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if ( strpos($customer_token, 'cst_') !== 0 ) {
			$customer_token = "cst_".$customer_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/customers/".$customer_token."/paymethods";

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

	public function getPaymethodById( $paymethod_token, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if ( strpos($paymethod_token, 'mth_') !== 0 ) {
			$paymethod_token = "mth_".$paymethod_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/paymethods/".$paymethod_token;

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

	public function getPaymethodOfaLocation( $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/paymethods/";

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

	public function getPaymethodOfAnOrganization( $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/paymethods/";

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

	public function getAccountUpdaterTokenUpdates( $start_date, $end_date, $restCall = null ){

		$payLoad = null;
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/paymethods/?filter=start_au_updated_date+eq+'".$start_date."'+and+end_au_updated_date+eq+'".$end_date."'";

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