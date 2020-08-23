<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Transactions extends ForteResourceModel{

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

	public function setStatus( $status = null ){

		if( is_null($status) ){
			throw new \Exception( "setStatus expects one string type parameter which contains the current dispositon of the transaction." );
		}

		$this->status = $status;

		return $this;

	}

	public function getStatus(){
		return $this->status;
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

	public function setAuthorizationAmount( $authorization_amount = null ){
		if( is_null($authorization_amount) ){
			throw new \Exception("setAuthorizationAmount expects one string type parameter which contains the amount to be charged/credited to the customer.");
		}

		$this->authorization_amount = $authorization_amount;

		return $this;
	}

	public function getAuthorizationAmount()
	{
	    return $this->authorization_amount;
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

	public function setOriginalTransactionID( $original_transaction_id = null ){
		if( is_null($original_transaction_id) ){
			throw new \Exception("setOriginalTransactionID expects one string type parameter which contains the trace number returned by the original transaction.");
		}

		$this->original_transaction_id = $original_transaction_id;

		return $this;
	}

	public function getOriginalTransactionID()
	{
	    return $this->original_transaction_id;
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

	public function setAuthorizationCode( $authorization_code = null ){
		if( is_null($authorization_code) ){
			throw new \Exception("setTransactionId expects one string type parameter which contains an approval code from a vendor that authorizes a merchant to void a transaction.");
		}
		$this->authorization_code = $authorization_code;
		return $this;
	}

	public function getAuthorizationCode(){
	    return $this->authorization_code;
	}

	public function setEnteredBy( $entered_by = null ){
		if( is_null($entered_by) ){
			throw new \Exception("setEnteredBy expects one string type parameter which contains the name or the ID of the person entering the data.");
		}
		$this->entered_by = $entered_by;
		return $this;
	}

	public function getEnteredBy(){
	    return $this->entered_by;
	}

	public function setRecievedDate( $received_date = null ){
		if( is_null($received_date) ){
			throw new \Exception("setEnteredBy expects one string type parameter which contains the date the merchant received the transaction.");
		}
		$this->received_date = $received_date;
		return $this;
	}

	public function getRecievedDate(){
		return $this->received_date;
	}

	public function setOriginalDate( $origination_date = null ){
		if( is_null($origination_date) ){
			throw new \Exception("setOriginalDate expects one string type parameter which contains the date the funds of the transaction go to the originating depository financial institution.");
		}
		$this->origination_date = $origination_date;
		return $this;
	}

	public function getOriginalDate(){
		return $this->origination_date;
	}

	public function setSalesTaxAmount( $sales_tax_amount = null ){
		if( is_null($sales_tax_amount) ){
			throw new \Exception("setSalesTaxAmount expects one string type parameter which contains the sales tax amount.");
		}
		$this->sales_tax_amount = $sales_tax_amount;
		return $this;
	}

	public function getSalesTaxAmount(){
		return $this->sales_tax_amount;
	}

	public function setSubtotalAmount( $subtotal_amount = null ){
		if( is_null($subtotal_amount) ){
			throw new \Exception("setSubtotalAmount expects one string type parameter which contains the base amount of the good or service.");
		}
		$this->subtotal_amount = $subtotal_amount;
		return $this;
	}

	public function getSubtotalAmount(){
		return $this->subtotal_amount;
	}

	public function setServiceFeeAmount( $service_fee_amount = null ){
		if( is_null($service_fee_amount) ){
			throw new \Exception("setServiceFeeAmount expects one string type parameter which contains the service fee (i.e., convenience fee) for this transaction.");
		}
		$this->service_fee_amount = $service_fee_amount;
		return $this;
	}

	public function getServiceFeeAmount(){
		return $this->service_fee_amount;
	}

	public function setRecurringIndicator( $recurring_indicator = null ){
		if( is_null($recurring_indicator) ){
			throw new \Exception("setRecurringIndicator expects one string type parameter which contains a merchant-assigned flag used to indicate recurring credit card transactions.");
		}
		$this->recurring_indicator = $recurring_indicator;
		return $this;
	}

	public function getRecurringIndicator(){
		return $this->recurring_indicator;
	}

	public function setCustomerIPAddress( $customer_ip_address = null ){
		if( is_null($customer_ip_address) ){
			throw new \Exception("setRecurringIndicator expects one string type parameter which contains the customer's originating IP address.");
		}
		$this->customer_ip_address = $customer_ip_address;
		return $this;
	}

	public function getCustomerIPAddress(){
		return $this->customer_ip_address;
	}

	public function setSaveToken( $save_token = null ){
		if( is_null($save_token) ){
			throw new \Exception("setSaveToken expects one string type parameter, this parameter creates customer and/or paymethod tokens for any transaction POST request—whether passed via request parameters or via swipe data through the card.card_data parameter.");
		}
		$this->save_token = $save_token;
		return $this;
	}

	public function getSaveToken(){
		return $this->save_token;
	}

	public function setAttemptNumber( $attempt_number = null ){
		if( is_null($attempt_number) ){
			throw new \Exception("setAttemptNumber expects one string type parameter which contains the number of times Forte has presented an ACH transaction for settlement.");
		}
		$this->attempt_number = $attempt_number;
		return $this;
	}

	public function getAttemptNumber(){
		return $this->attempt_number;
	}

	public function setCOFTransactionType( $cof_transaction_type = null ){
		if( is_null($cof_transaction_type) ){
			throw new \Exception("setCOFTransactionType expects one string type parameter which indicates whether the credential on file (COF) transaction is recurring (0) or customer initiated (1).");
		}
		$this->cof_transaction_type = $cof_transaction_type;
		return $this;
	}

	public function getCOFTransactionType(){
		return $this->cof_transaction_type;
	}

	public function setCOFInitialTransactionID( $cof_initial_transaction_id = null ){
		if( is_null($cof_initial_transaction_id) ){
			throw new \Exception("setCOFInitialTransactionID expects one string type parameter which contains the processor’s transaction ID of the first transaction for a stored credential on file. This field is required for non-tokenized, credential-on-file subsequent transactions.");
		}
		$this->cof_initial_transaction_id = $cof_initial_transaction_id;
		return $this;
	}

	public function getCOFInitialTransactionID(){
		return $this->cof_initial_transaction_id;
	}

	public function setBillingAddressToken( $address_token = null ){
		if( is_null($address_token) ){
			throw new \Exception('setBillingAddressToken expects single parameter which contains a unique string used to represent an address.');
		}else{

			if ( strpos($address_token, 'add_') !== 0 ) {
			   	$address_token = "add_".$address_token;
			}

			$this->billing_address = array("address_token" => $address_token);
		}
		return $this;
	}

	public function getBillingAddressToken(){
		return $this->billing_address["address_token"];
	}

	public function setBillingAddressCustomerToken( $customer_token = null ){
		if( is_null($customer_token) ){
			throw new \Exception('setBillingAddressCustomerToken expects single parameter which contains a unique string used to represent a customer.');
		}else{

			if ( strpos($customer_token, 'cst_') !== 0 ) {
			   	$customer_token = "cst_".$customer_token;
			}

			$this->billing_address = array("customer_token" => $customer_token);
		}
		return $this;
	}

	public function getBillingAddressCustomerToken(){
		return $this->billing_address["customer_token"];
	}

	public function setBillingAddressOrganizationID( $organization_id = null ){
		if( is_null($organization_id) ){
			throw new \Exception('setBillingAddressOrganizationID expects single parameter which contains the identification number of the associated organization.');
		}else{

			if ( strpos($organization_id, 'org_') !== 0 ) {
			   	$organization_id = "org_".$organization_id;
			}

			$this->billing_address = array("organization_id" => $organization_id);
		}
		return $this;
	}

	public function getBillingAddressOrganizationID(){
		return $this->billing_address["organization_id"];
	}

	public function setBillingAddressLocationID( $location_id = null ){
		if( is_null($location_id) ){
			throw new \Exception('setBillingAddressLocationID expects single parameter which contains the identification number of the associated location.');
		}else{

			if ( strpos($location_id, 'loc_') !== 0 ) {
			   	$location_id = "loc_".$location_id;
			}

			$this->billing_address = array("location_id" => $location_id);
		}
		return $this;
	}

	public function getBillingAddressLocationID(){
		return $this->billing_address["location_id"];
	}

	public function setBillingAddressFirstName( $first_name = null ){
		if( is_null($first_name) ){
			throw new \Exception('setBillingAddressFirstName expects single parameter which contains the first name of the user associated with this billing address.');
		}else{
			$this->billing_address = array("first_name" => $first_name);
		}
		return $this;
	}

	public function getBillingAddressFirstName(){
		return $this->billing_address["first_name"];
	}

	public function setBillingAddressLastName( $last_name = null ){
		if( is_null($last_name) ){
			throw new \Exception('setBillingAddressLastName expects single parameter which contains the last name of the user associated with this billing address.');
		}else{
			$this->billing_address = array("last_name" => $last_name);
		}
		return $this;
	}

	public function getBillingAddressLastName(){
		return $this->billing_address["last_name"];
	}

	public function setBillingAddressCompanyName( $company_name = null ){
		if( is_null($company_name) ){
			throw new \Exception('setBillingAddressCompanyName expects single parameter which contains the name of the company associated with this billing address.');
		}else{
			$this->billing_address = array("company_name" => $company_name);
		}
		return $this;
	}

	public function getBillingAddressCompanyName(){
		return $this->billing_address["company_name"];
	}

	public function setBillingAddressPhone( $phone = null ){
		if( is_null($phone) ){
			throw new \Exception('setBillingAddressPhone expects single parameter which contains the phone number associated with this billing address.');
		}else{
			$this->billing_address = array("phone" => $phone);
		}
		return $this;
	}

	public function getBillingAddressPhone(){
		return $this->billing_address["phone"];
	}

	public function setBillingAddressEmail( $email = null ){
		if( is_null($email) ){
			throw new \Exception('setBillingAddressEmail expects single parameter which contains the email number associated with this billing address.');
		}else{
			$this->billing_address = array("email" => $email);
		}
		return $this;
	}

	public function getBillingAddressEmail(){
		return $this->billing_address["email"];
	}

	public function setBillingAddressLabel( $label = null ){
		if( is_null($label) ){
			throw new \Exception('setBillingAddressLabel expects single parameter which contains a label that succinctly identifies the address.');
		}else{
			$this->billing_address = array("label" => $label);
		}
		return $this;
	}

	public function getBillingAddressLabel(){
		return $this->billing_address["label"];
	}

	public function setBillingAddressType( $address_type = null ){
		if( is_null($address_type) ){
			throw new \Exception('setBillingAddressType expects single parameter which contains the type of address.');
		}else{
			$this->billing_address = array("address_type" => $address_type);
		}
		return $this;
	}

	public function getBillingAddressType(){
		return $this->billing_address["address_type"];
	}

	public function setBillingAddressShippingAddressType( $shipping_address_type = null ){
		if( is_null($shipping_address_type) ){
			throw new \Exception('setBillingAddressShippingAddressType expects single parameter which indicates whether the address is a residential or commercial address (if the address is both a billing and shipping address).');
		}else{
			$this->billing_address = array("shipping_address_type" => $shipping_address_type);
		}
		return $this;
	}

	public function getBillingAddressShippingAddressType(){
		return $this->billing_address["shipping_address_type"];
	}

	public function setBillingAddressStreetLine1( $street_line1 = null ){
		if( is_null($street_line1) ){
			throw new \Exception('setBillingAddressStreetLine1 expects single parameter which contains the first line of the street address.');
		}else{
			$this->billing_address = array( "physical_address" => array("street_line1" => $street_line1) );
		}
		return $this;
	}

	public function getBillingAddressStreetLine1(){
		return $this->billing_address["physical_address"]["street_line1"];
	}

	public function setBillingAddressStreetLine2( $street_line2 = null ){
		if( is_null($street_line2) ){
			throw new \Exception('setBillingAddressStreetLine2 expects single parameter which contains the second line of the street address.');
		}else{
			$this->billing_address = array( "physical_address" => array("street_line2" => $street_line2) );
		}
		return $this;
	}

	public function getBillingAddressStreetLine2(){
		return $this->billing_address["physical_address"]["street_line2"];
	}

	public function setBillingAddressLocality( $locality = null ){
		if( is_null($locality) ){
			throw new \Exception('setBillingAddressLocality expects single parameter which contains the locality or city/town/village.');
		}else{
			$this->billing_address = array( "physical_address" => array("locality" => $locality) );
		}
		return $this;
	}

	public function getBillingAddressLocality(){
		return $this->billing_address["physical_address"]["locality"];
	}

	public function setBillingAddressRegion( $region = null ){
		if( is_null($region) ){
			throw new \Exception('setBillingAddressRegion expects single parameter which contains the region or state/province.');
		}else{
			$this->billing_address = array( "physical_address" => array("region" => $region) );
		}
		return $this;
	}

	public function getBillingAddressRegion(){
		return $this->billing_address["physical_address"]["region"];
	}

	public function setBillingAddressCountry( $country = null ){
		if( is_null($country) ){
			throw new \Exception('setBillingAddressCountry expects single parameter which contains the ISO 3166-1 alpha-2 country abbreviation.');
		}else{
			$this->billing_address = array( "physical_address" => array("country" => $country) );
		}
		return $this;
	}

	public function getBillingAddressCountry(){
		return $this->billing_address["physical_address"]["country"];
	}

	public function setBillingAddressPostalCode( $postal_code = null ){
		if( is_null($postal_code) ){
			throw new \Exception('setBillingAddressPostalCode expects single parameter which contains the postal code.');
		}else{
			$this->billing_address = array( "physical_address" => array("postal_code" => $postal_code) );
		}
		return $this;
	}

	public function getBillingAddressPostalCode(){
		return $this->billing_address["physical_address"]["postal_code"];
	}

	public function setShippingAddressToken( $address_token = null ){
		if( is_null($address_token) ){
			throw new \Exception('setShippingAddressToken expects single parameter which contains a unique string used to represent an address.');
		}else{

			if ( strpos($address_token, 'add_') !== 0 ) {
			   	$address_token = "add_".$address_token;
			}

			$this->shipping_address = array("address_token" => $address_token);
		}
		return $this;
	}

	public function getShippingAddressToken(){
		return $this->shipping_address["address_token"];
	}

	public function setShippingAddressCustomerToken( $customer_token = null ){
		if( is_null($customer_token) ){
			throw new \Exception('setShippingAddressCustomerToken expects single parameter which contains a unique string used to represent a customer.');
		}else{

			if ( strpos($customer_token, 'cst_') !== 0 ) {
			   	$customer_token = "cst_".$customer_token;
			}

			$this->shipping_address = array("customer_token" => $customer_token);
		}
		return $this;
	}

	public function getShippingAddressCustomerToken(){
		return $this->shipping_address["customer_token"];
	}

	public function getShippingAddressOrganizationID(){
		return $this->shipping_address["organization_id"];
	}

	public function setShippingAddressLocationID( $location_id = null ){
		if( is_null($location_id) ){
			throw new \Exception('setShippingAddressLocationID expects single parameter which contains the identification number of the associated location.');
		}else{

			if ( strpos($location_id, 'loc_') !== 0 ) {
			   	$location_id = "loc_".$location_id;
			}

			$this->shipping_address = array("location_id" => $location_id);
		}
		return $this;
	}

	public function getShippingAddressLocationID(){
		return $this->shipping_address["location_id"];
	}

	public function setShippingAddressFirstName( $first_name = null ){
		if( is_null($first_name) ){
			throw new \Exception('setShippingAddressFirstName expects single parameter which contains the first name of the user associated with this shipping address.');
		}else{
			$this->shipping_address = array("first_name" => $first_name);
		}
		return $this;
	}

	public function getShippingAddressFirstName(){
		return $this->shipping_address["first_name"];
	}

	public function setShippingAddressLastName( $last_name = null ){
		if( is_null($last_name) ){
			throw new \Exception('setShippingAddressLastName expects single parameter which contains the last name of the user associated with this shipping address.');
		}else{
			$this->shipping_address = array("last_name" => $last_name);
		}
		return $this;
	}

	public function getShippingAddressLastName(){
		return $this->shipping_address["last_name"];
	}

	public function setShippingAddressCompanyName( $company_name = null ){
		if( is_null($company_name) ){
			throw new \Exception('setShippingAddressCompanyName expects single parameter which contains the name of the company associated with this shipping address.');
		}else{
			$this->shipping_address = array("company_name" => $company_name);
		}
		return $this;
	}

	public function getShippingAddressCompanyName(){
		return $this->shipping_address["company_name"];
	}

	public function setShippingAddressPhone( $phone = null ){
		if( is_null($phone) ){
			throw new \Exception('setShippingAddressPhone expects single parameter which contains the phone number associated with this shipping address.');
		}else{
			$this->shipping_address = array("phone" => $phone);
		}
		return $this;
	}

	public function getShippingAddressPhone(){
		return $this->shipping_address["phone"];
	}

	public function setShippingAddressEmail( $email = null ){
		if( is_null($email) ){
			throw new \Exception('setShippingAddressEmail expects single parameter which contains the email number associated with this shipping address.');
		}else{
			$this->shipping_address = array("email" => $email);
		}
		return $this;
	}

	public function getShippingAddressEmail(){
		return $this->shipping_address["email"];
	}

	public function setShippingAddressLabel( $label = null ){
		if( is_null($label) ){
			throw new \Exception('setShippingAddressLabel expects single parameter which contains a label that succinctly identifies the address.');
		}else{
			$this->shipping_address = array("label" => $label);
		}
		return $this;
	}

	public function getShippingAddressLabel(){
		return $this->shipping_address["label"];
	}

	public function setShippingAddressType( $address_type = null ){
		if( is_null($address_type) ){
			throw new \Exception('setShippingAddressType expects single parameter which contains the type of address.');
		}else{
			$this->shipping_address = array("address_type" => $address_type);
		}
		return $this;
	}

	public function getShippingAddressType(){
		return $this->shipping_address["address_type"];
	}

	public function setShippingAddressShippingAddressType( $shipping_address_type = null ){
		if( is_null($shipping_address_type) ){
			throw new \Exception('setShippingAddressShippingAddressType expects single parameter which indicates whether the address is a residential or commercial address.');
		}else{
			$this->shipping_address = array("shipping_address_type" => $shipping_address_type);
		}
		return $this;
	}

	public function getShippingAddressShippingAddressType(){
		return $this->shipping_address["shipping_address_type"];
	}

	public function setShippingAddressStreetLine1( $street_line1 = null ){
		if( is_null($street_line1) ){
			throw new \Exception('setShippingAddressStreetLine1 expects single parameter which contains the first line of the street address.');
		}else{
			$this->shipping_address = array( "physical_address" => array("street_line1" => $street_line1) );
		}
		return $this;
	}

	public function getShippingAddressStreetLine1(){
		return $this->shipping_address["physical_address"]["street_line1"];
	}

	public function setShippingAddressStreetLine2( $street_line2 = null ){
		if( is_null($street_line2) ){
			throw new \Exception('setShippingAddressStreetLine2 expects single parameter which contains the second line of the street address.');
		}else{
			$this->shipping_address = array( "physical_address" => array("street_line2" => $street_line2) );
		}
		return $this;
	}

	public function getShippingAddressStreetLine2(){
		return $this->shipping_address["physical_address"]["street_line2"];
	}

	public function setShippingAddressLocality( $locality = null ){
		if( is_null($locality) ){
			throw new \Exception('setShippingAddressLocality expects single parameter which contains the locality or city/town/village.');
		}else{
			$this->shipping_address = array( "physical_address" => array("locality" => $locality) );
		}
		return $this;
	}

	public function getShippingAddressLocality(){
		return $this->shipping_address["physical_address"]["locality"];
	}

	public function setShippingAddressRegion( $region = null ){
		if( is_null($region) ){
			throw new \Exception('setShippingAddressRegion expects single parameter which contains the region or state/province.');
		}else{
			$this->shipping_address = array( "physical_address" => array("region" => $region) );
		}
		return $this;
	}

	public function getShippingAddressRegion(){
		return $this->shipping_address["physical_address"]["region"];
	}

	public function setShippingAddressCountry( $country = null ){
		if( is_null($country) ){
			throw new \Exception('setShippingAddressCountry expects single parameter which contains the ISO 3166-1 alpha-2 country abbreviation.');
		}else{
			$this->shipping_address = array( "physical_address" => array("country" => $country) );
		}
		return $this;
	}

	public function getShippingAddressCountry(){
		return $this->shipping_address["physical_address"]["country"];
	}

	public function setShippingAddressPostalCode( $postal_code = null ){
		if( is_null($postal_code) ){
			throw new \Exception('setShippingAddressPostalCode expects single parameter which contains the postal code.');
		}else{
			$this->shipping_address = array( "physical_address" => array("postal_code" => $postal_code) );
		}
		return $this;
	}

	public function getShippingAddressPostalCode(){
		return $this->shipping_address["physical_address"]["postal_code"];
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

	public function setCardReader( $card_reader = null ){
		if( is_null($card_reader) ){
			throw new \Exception("setCardReader expects one string type parameter which contains the eight-digit device part number specifying which swipe device was used to capture the card data.");
		}
		$this->card = array("card_reader" => $card_reader);
		return $this;
	}

	public function getCardReader(){
		return $this->card["card_reader"];
	}

	public function setCardData( $card_data = null ){
		if( is_null($card_data) ){
			throw new \Exception("setCardData expects one string type parameter which contains the full set of swipe data received from the encrypting swipe device.");
		}
		$this->card = array("card_data" => $card_data);
		return $this;
	}

	public function getCardData(){
		return $this->card["card_data"];
	}

	public function setCardEmvData( $card_emv_data = null ){
		if( is_null($card_emv_data) ){
			throw new \Exception("setCardEmvData expects one string type parameter which contains the full set of emv data received from the emv device.");
		}
		$this->card = array("card_emv_data" => $card_emv_data);
		return $this;
	}

	public function getCardEmvData(){
		return $this->card["card_emv_data"];
	}

	public function setFallbackSwipe( $fallback_swipe = null ){
		if( is_null($fallback_swipe) ){
			throw new \Exception("setFallbackSwipe expects one string type parameter which indicates if this swiped transaction is a fallback swipe after a dipped transaction failed to process.");
		}
		$this->card = array("fallback_swipe" => $fallback_swipe);
		return $this;
	}

	public function getFallbackSwipe(){
		return $this->card["fallback_swipe"];
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

	public function setLineItemHeader( $line_item_header = null ){
		if( is_null($line_item_header) ){
			throw new \Exception("setLineItemHeader expects one string type parameter which contains the description of the data elements contained within each line item.");
		}
		$this->line_items = array("line_item_header" => $line_item_header);
		return $this;
	}

	public function getLineItemHeader(){
		return $this->line_items["line_item_header"];
	}

	public function setLineItemContents( $line_item_contents = null ){
		if( is_null($line_item_contents) ){
			throw new \Exception("setLineItemContents expects one string type parameter which contains the contents of the line item formatted according to the line_item_header.");
		}
		$this->line_items = array("line_item_1-10000" => $line_item_contents);
		return $this;
	}

	public function getLineItemContents(){
		return $this->line_items["line_item_1-10000"];
	}

	public function setXdata( $xdata = null ){
		if( is_null($xdata) ){
			throw new \Exception("setXdata expects one string type parameter which contains up to nine fields (1-9) of extra data that can be associated with a schedule or transaction.");
		}else{
			if ( strpos($xdata, 'xdata_') !== 0 ) {
			   	$xdata = "xdata_".$xdata;
			}
			$this->xdata = array("xdata_1-9" => $xdata);
		}
		return $this;
	}

	public function getXdata()
	{
	    return $this->xdata["xdata_1-9"];
	}

	public function transaction( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions";

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

	public function transactionAlternateURI( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/transactions";

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

	public function transactionSale( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/sale";

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

	public function transactionCredit( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/credit";

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

	public function transactionAuthorize( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/authorize";

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

	public function transactionVerify( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/verify";

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

	public function transactionForce( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/force";

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

	public function getAllTransaction( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions";

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

	public function getAllSaleTransaction( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/sale";

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

	public function getAllCreditTransaction( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/credit";

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

	public function getAllAuthorizeTransaction( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/authorize";

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

	public function getAllVerifyTransaction( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/verify";

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

	public function getAllInquiryTransaction( $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/inquiry";

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

	public function getTransactionByCustomerToken( $customer_token = null, $restCall = null ){

		if( is_null( $customer_token ) ){
			throw new \Exception("getTransactionByCustomerToken needs one parameter customer_token.");
		}

		if ( strpos($customer_token, 'cst_') !== 0 ) {
		   	$customer_token = "cst_".$customer_token;
		}

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/customers/".$customer_token."/transactions";

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

	public function getTransactionById( $transation_id = null, $restCall = null ){

		if( is_null( $transation_id ) ){
			throw new \Exception("getTransactionId needs one parameter transation_id.");
		}

		if ( strpos($transation_id, 'trn_') !== 0 ) {
		   	$transation_id = "trn_".$transation_id;
		}

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/".$transation_id;

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

	public function getTransactionByDate( $start_date = null, $end_date = null, $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/?filter=start_received_date+eq+%27".$start_date."%27+AND+end_received_date+eq+%27".$end_date."%27";

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

	public function voidTransaction( $transation_id = null, $restCall = null ){

		if( is_null( $transation_id ) ){
			throw new \Exception("voidTransaction needs one parameter transation_id.");
		}

		if ( strpos($transation_id, 'trn_') !== 0 ) {
		   	$transation_id = "trn_".$transation_id;
		}

		$this->setAction("void");

		$payLoad = $this->toJSON();

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/transactions/".$transation_id;

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

}