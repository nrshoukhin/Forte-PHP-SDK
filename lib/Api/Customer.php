<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Customer extends ForteResourceModel{

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

	public function setDefaultPaymethodToken( $default_paymethod_token = null ){
		if( is_null($default_paymethod_token) ){
			throw new \Exception("setDefaultPaymethodToken expects one string type parameter which contains the customer's default paymethod token.");
		}else{
			if ( strpos($default_paymethod_token, 'mth_') !== 0 ) {
			   	$this->default_paymethod_token = "mth_".$default_paymethod_token;
			}else{
				$this->default_paymethod_token = $default_paymethod_token;
			}
		}
		return $this;
	}

	public function getDefaultPaymethodToken(){
		return $this->default_paymethod_token;
	}

	public function setDefaultBillingAddressToken( $default_billing_address_token = null ){
		if( is_null($default_billing_address_token) ){
			throw new \Exception("setDefaultBillingAddressToken expects one string type parameter which contains a unique string used to represent the customer's default billing address.");
		}else{
			if ( strpos($default_billing_address_token, 'add_') !== 0 ) {
			   	$this->default_billing_address_token = "add_".$default_billing_address_token;
			}else{
				$this->default_billing_address_token = $default_billing_address_token;
			}
		}
		return $this;
	}

	public function getDefaultBillingAddressToken(){
		return $this->default_billing_address_token;
	}

	public function setDefaultShippingAddressToken( $default_shipping_address_token = null ){
		if( is_null($default_shipping_address_token) ){
			throw new \Exception("setDefaultShippingAddressToken expects one string type parameter which contains a unique string used to represent a customer's default shipping address.");
		}else{
			if ( strpos($default_shipping_address_token, 'add_') !== 0 ) {
			   	$this->default_shipping_address_token = "add_".$default_shipping_address_token;
			}else{
				$this->default_shipping_address_token = $default_shipping_address_token;
			}
		}
		return $this;
	}

	public function getDefaultShippingAddressToken(){
		return $this->default_shipping_address_token;
	}

	public function setFirstName( $first_name = null ){
		if( is_null($first_name) ){
			throw new \Exception("setFirstName expects one string type parameter which contains the customer first name.");
		}
		$this->first_name = $first_name;
		return $this;
	}

	public function getFirstName(){
		return $this->first_name;
	}

	public function setLastName( $last_name = null ){
		if( is_null($last_name) ){
			throw new \Exception("setLastName expects one string type parameter which contains the customer last name.");
		}
		$this->last_name = $last_name;
		return $this;
	}

	public function getLastName(){
		return $this->last_name;
	}

	public function setCompanyName( $company_name = null ){
		if( is_null($company_name) ){
			throw new \Exception("setCompanyName expects one string type parameter which contains the customer company name.");
		}
		$this->company_name = $company_name;
		return $this;
	}

	public function getCompanyName(){
		return $this->company_name;
	}

	public function setStatus( $status = null ){
		if( is_null($status) ){
			throw new \Exception("setStatus expects one string type parameter.");
		}else{
			$this->status = $status;
		}
		return $this;
	}

	public function  getStatus(){
		return $this->status;
	}

	public function setDisplayName( $display_name = null ){
		if( is_null($display_name) ){
			throw new \Exception("setDisplayName expects one string type parameter.");
		}else{
			$this->display_name = $display_name;
		}
		return $this;
	}

	public function  getDisplayName(){
		return $this->display_name;
	}

	public function setCreatedDate($created_date = null){
		if( is_null($created_date) ){
			throw new \Exception("setCreatedDate expects one parameter which contains the date and time when the customer record was created.");
		}else{
			$this->created_date = $created_date;
		}
		return $this;
	}

	public function getCreatedDate(){
		return $this->created_date;
	}

	public function setUpdatedDate($updated_date = null){
		if( is_null($updated_date) ){
			throw new \Exception("setUpdatedDate expects one parameter which contains the date and time when the customer record was updated.");
		}else{
			$this->updated_date = $updated_date;
		}
		return $this;
	}

	public function getUpdatedDate(){
		return $this->updated_date;
	}

	public function setDeletedDate($deleted_date = null){
		if( is_null($deleted_date) ){
			throw new \Exception("setDeletedDate expects one parameter which contains the date and time when the customer record was deleted.");
		}else{
			$this->deleted_date = $deleted_date;
		}
		return $this;
	}

	public function getDeletedDate(){
		return $this->deleted_date;
	}

	public function setPaymethod($paymethod = null){
		if( is_null($paymethod) ){
			throw new \Exception("setPaymethod expects one parameter which contains the paymethod object.");
		}else{
			$this->paymethod = $paymethod;
		}
		return $this;
	}

	public function getPaymethod(){
		return $this->paymethod;
	}

	public function setPaymethodOrganizationId( $org_id = null ){
		if( is_null($org_id) ){
			throw new \Exception("setPaymethodOrganizationId expects a string which contains the identification number of the associated organization.");
		}
		$this->paymethod = array("organization_id" => $org_id);
		return $this;
	}

	public function getPaymethodOrganizationId(){
		return $this->paymethod["organization_id"];
	}

	public function setPaymethodLocationId( $location_id = null ){
		if( is_null($location_id) ){
			throw new \Exception("setPaymethodLocationId expects a string which contains the identification number of the associated location.");
		}else{
			if ( strpos($location_id, 'loc_') !== 0 ) {
				$this->paymethod = array("location_id" => "loc_".$location_id);
			}else{
				$this->paymethod = array("location_id" => $location_id);
			}
		}
		return $this;
	}

	public function getPaymethodLocationId(){
		return $this->paymethod["location_id"];
	}

	public function setPaymethodCustomerToken( $customer_token = null ){
		if( is_null($customer_token) ){
			throw new \Exception("setPaymethodCustomerToken expects a string which contains a unique string used to represent a customer.");
		}else{
			if ( strpos($customer_token, 'cst_') !== 0 ) {
				$this->paymethod = array("customer_token" => "cst_".$customer_token);
			}else{
				$this->paymethod = array("customer_token" => $customer_token);
			}
		}
		return $this;
	}

	public function getPaymethodCustomerToken(){
		return $this->paymethod["customer_token"];
	}

	public function setPaymethodToken( $paymethod_token = null ){
		if( is_null($paymethod_token) ){
			throw new \Exception("setPaymethodToken expects a string which contains a unique string used to represent a payment method.");
		}else{
			if ( strpos($paymethod_token, 'mth_') !== 0 ) {
				$this->paymethod = array("paymethod_token" => "mth_".$paymethod_token);
			}else{
				$this->paymethod = array("paymethod_token" => $paymethod_token);
			}
		}
		return $this;
	}

	public function getPaymethodToken(){
		return $this->paymethod["paymethod_token"];
	}

	public function setUpdatePaymethodToken( $paymethod_token = null ){
		if( is_null($paymethod_token) ){
			throw new \Exception("setPaymethodToken expects a string which contains a unique string used to represent a payment method.");
		}else{
			if ( strpos($paymethod_token, 'mth_') !== 0 ) {
				$this->paymethod_token = "mth_".$paymethod_token;
			}else{
				$this->paymethod_token = $paymethod_token;
			}
		}
		return $this;
	}

	public function getUpdatePaymethodToken(){
		return $this->paymethod_token;
	}

	public function setPaymethodLabel( $label = null ){
		if( is_null($label) ){
			throw new \Exception('setPaymethodLabel expects a string which contains a friendly, customer-defined name for the payment method. For example, "Moms Credit Card," "Work Credit Card," "Visa - 1234," etc.');
		}else{
			$this->paymethod = array("label" => $label);
		}
		return $this;
	}

	public function getPaymethodLabel(){
		return $this->paymethod["label"];
	}

	public function setPaymethodCard( $card = null ){
		if( is_null($card) ){
			throw new \Exception('setPaymethodCard expects a string which contains the Card Object.');
		}else{
			$this->paymethod = array("card" => $card);
		}
		return $this;
	}

	public function getPaymethodCard(){
		return $this->paymethod["card"];
	}

	public function setPaymethodCardType( $card_type = null ){
		if( is_null($card_type) ){
			throw new \Exception('setPaymethodCardType expects a string which contains the type of credit card.');
		}else{
			$this->paymethod = array("card" => array("card_type" => $card));
		}
		return $this;
	}

	public function getPaymethodCardType(){
		return $this->paymethod["card"]["card_type"];
	}

	public function setPaymethodNameOnCard( $name_on_card = null ){
		if( is_null($name_on_card) ){
			throw new \Exception('setPaymethodNameOnCard expects a string which contains the name printed on the on the credit card.');
		}else{
			$this->paymethod = array("card" => array("name_on_card" => $card));
		}
		return $this;
	}

	public function getPaymethodNameOnCard(){
		return $this->paymethod["card"]["name_on_card"];
	}

	public function setPaymethodAccountNumber( $account_number = null ){
		if( is_null($account_number) ){
			throw new \Exception('setPaymethodAccountNumber expects a string which contains the card number.');
		}else{
			$this->paymethod = array("card" => array("account_number" => $card));
		}
		return $this;
	}

	public function getPaymethodAccountNumber(){
		return $this->paymethod["card"]["account_number"];
	}

	public function setPaymethodExpireMonth( $expire_month = null ){
		if( is_null($expire_month) ){
			throw new \Exception('setPaymethodExpireMonth expects a string which contains the expiration month.');
		}else{
			$this->paymethod = array("card" => array("expire_month" => $expire_month));
		}
		return $this;
	}

	public function getPaymethodExpireMonth(){
		return $this->paymethod["card"]["expire_month"];
	}

	public function setPaymethodExpireYear( $expire_year = null ){
		if( is_null($expire_year) ){
			throw new \Exception('setPaymethodExpireYear expects a string which contains the expiration year.');
		}else{
			$this->paymethod = array("card" => array("expire_year" => $expire_year));
		}
		return $this;
	}

	public function getPaymethodExpireYear(){
		return $this->paymethod["card"]["expire_year"];
	}

	public function setPaymethodCardVerficationValue( $card_verification_value = null ){
		if( is_null($card_verification_value) ){
			throw new \Exception('setPaymethodCardVerficationValue expects a string which contains the card verification number.');
		}else{
			$this->paymethod = array("card" => array("card_verification_value" => $card_verification_value));
		}
		return $this;
	}

	public function getPaymethodCardVerficationValue(){
		return $this->paymethod["card"]["card_verification_value"];
	}

	public function setPaymethodProcurementCard( $procurement_card = null ){
		if( is_null($procurement_card) ){
			throw new \Exception('setPaymethodProcurementCard expects a string which indicates whether or not this is a procurement card transaction.');
		}else{
			$this->paymethod = array("card" => array("procurement_card" => $procurement_card));
		}
		return $this;
	}

	public function getPaymethodProcurementCard(){
		return $this->paymethod["card"]["procurement_card"];
	}

	public function setPaymethodCustomerAccountingCode( $customer_accounting_code = null ){
		if( is_null($customer_accounting_code) ){
			throw new \Exception('setPaymethodCustomerAccountingCode expects a string which lists the procurement card accounting code.');
		}else{
			$this->paymethod = array("card" => array("customer_accounting_code" => $customer_accounting_code));
		}
		return $this;
	}

	public function getPaymethodCustomerAccountingCode(){
		return $this->paymethod["card"]["customer_accounting_code"];
	}

	public function setPaymethodOneTimeToken( $one_time_token = null ){
		if( is_null($one_time_token) ){
			throw new \Exception('setPaymethodOneTimeToken expects a string which contains a single use token generated by Forte.');
		}else{
			$this->paymethod = array("card" => array("one_time_token" => $one_time_token));
		}
		return $this;
	}

	public function getPaymethodOneTimeToken(){
		return $this->paymethod["card"]["one_time_token"];
	}

	public function setPaymethodEcheck( $echeck = null ){
		if( is_null($echeck) ){
			throw new \Exception('setPaymethodEcheck expects a string which contains the eCheck Object.');
		}else{
			$this->paymethod = array("echeck" => $echeck);
		}
		return $this;
	}

	public function getPaymethodEcheck(){
		return $this->paymethod["echeck"];
	}

	public function setEcheckAccountHolder( $account_holder = null ){
		if( is_null($account_holder) ){
			throw new \Exception('setEcheckAccountHolder expects a string which contains the name of the account owner.');
		}else{
			$this->paymethod = array("echeck" => array("account_holder" => $account_holder));
		}
		return $this;
	}

	public function getEcheckAccountHolder(){
		return $this->paymethod["echeck"]["account_holder"];
	}

	public function setEcheckAccountNumber( $account_number = null ){
		if( is_null($account_number) ){
			throw new \Exception('setEcheckAccountNumber expects a string which contains the name of the account owner.');
		}else{
			$this->paymethod = array("echeck" => array("account_number" => $account_number));
		}
		return $this;
	}

	public function getEcheckAccountNumber(){
		return $this->paymethod["echeck"]["account_number"];
	}

	public function setEcheckRoutingNumber( $routing_number = null ){
		if( is_null($routing_number) ){
			throw new \Exception('setEcheckRoutingNumber expects a string which contains the transit routing number.');
		}else{
			$this->paymethod = array("echeck" => array("routing_number" => $routing_number));
		}
		return $this;
	}

	public function getEcheckRoutingNumber(){
		return $this->paymethod["echeck"]["routing_number"];
	}

	public function setEcheckAccountType( $account_type = null ){
		if( is_null($account_type) ){
			throw new \Exception('setEcheckAccountType expects a string which contains the type of account.');
		}else{
			$this->paymethod = array("echeck" => array("account_type" => $account_type));
		}
		return $this;
	}

	public function getEcheckAccountType(){
		return $this->paymethod["echeck"]["account_type"];
	}

	public function setEcheckSecCode( $sec_code = null ){
		if( is_null($sec_code) ){
			throw new \Exception('setEcheckSecCode expects a string which contains the Sec Code.');
		}else{
			$this->paymethod = array("echeck" => array("sec_code" => $sec_code));
		}
		return $this;
	}

	public function getEcheckSecCode(){
		return $this->paymethod["echeck"]["sec_code"];
	}

	public function setPaymethodNotes( $notes = null ){
		if( is_null($notes) ){
			throw new \Exception('setPaymethodNotes expects a string which contains a short description of the paymethod.');
		}else{
			$this->paymethod = array("notes" => $notes);
		}
		return $this;
	}

	public function getPaymethodNotes(){
		return $this->paymethod["notes"];
	}

	public function setAddresses( $addresses = null ){
		if( is_null($addresses) ){
			throw new \Exception('setAddresses expects an array of Address Objects.');
		}else{
			$this->addresses = $addresses;
		}
		return $this;
	}

	public function getAddresses(){
		return $this->addresses;
	}

	public function setAddressToken( $address_token = null ){
		if( is_null($address_token) ){
			throw new \Exception('setAddressToken expects A unique string used to represent an address.');
		}else{
			if ( strpos($address_token, 'add_') !== 0 ) {
				$this->addresses = array("address_token" => "add_".$address_token);
			}else{
				$this->addresses = array("address_token" => $address_token);
			}
		}
		return $this;
	}

	public function getAddressToken(){
		return $this->addresses["address_token"];
	}

	public function setAddressCustomerToken( $customer_token = null ){
		if( is_null($customer_token) ){
			throw new \Exception('setAddressCustomerToken expects A unique string used to represent a customer.');
		}else{
			if ( strpos($customer_token, 'cst_') !== 0 ) {
				$this->addresses = array("customer_token" => "cst_".$customer_token);
			}else{
				$this->addresses = array("customer_token" => $customer_token);
			}
		}
		return $this;
	}

	public function getAddressCustomerToken(){
		return $this->addresses["customer_token"];
	}

	public function setAddressOrganizationId( $organization_id = null ){
		if( is_null($organization_id) ){
			throw new \Exception('setAddressOrganizationId expects the identification number of the associated organization.');
		}else{
			if ( strpos($organization_id, 'org_') !== 0 ) {
				$this->addresses = array("organization_id" => "org_".$organization_id);
			}else{
				$this->addresses = array("organization_id" => $organization_id);
			}
		}
		return $this;
	}

	public function getAddressOrganizationId(){
		return $this->addresses["organization_id"];
	}

	public function setAddressLocationId( $location_id = null ){
		if( is_null($location_id) ){
			throw new \Exception('setAddressLocationId expects the identification number of the associated location.');
		}else{
			if ( strpos($location_id, 'loc_') !== 0 ) {
				$this->addresses = array("location_id" => "loc_".$location_id);
			}else{
				$this->addresses = array("location_id" => $location_id);
			}
		}
		return $this;
	}

	public function getAddressLocationId(){
		return $this->addresses["location_id"];
	}

	public function setAddressFirstName( $first_name = null ){
		if( is_null($first_name) ){
			throw new \Exception('setAddressLocationId expects The first name of the user associated with this billing or shipping address.');
		}else{
			$this->addresses = array("first_name" => $first_name);
		}
		return $this;
	}

	public function getAddressFirstName(){
		return $this->addresses["first_name"];
	}

	public function setAddressLastName( $last_name = null ){
		if( is_null($last_name) ){
			throw new \Exception('setAddressLastName expects The last name of the user associated with this billing or shipping address.');
		}else{
			$this->addresses = array("last_name" => $last_name);
		}
		return $this;
	}

	public function getAddressLastName(){
		return $this->addresses["last_name"];
	}

	public function setAddressCompanyName( $company_name = null ){
		if( is_null($company_name) ){
			throw new \Exception('setAddressCompanyName expects single parameter which contains The name of the company associated with this billing or shipping address.');
		}else{
			$this->addresses = array("company_name" => $company_name);
		}
		return $this;
	}

	public function getAddressCompanyName(){
		return $this->addresses["company_name"];
	}

	public function setAddressPhone( $phone = null ){
		if( is_null($phone) ){
			throw new \Exception('setAddressPhone expects single parameter which contains the phone number associated with this billing or shipping address.');
		}else{
			$this->addresses = array("phone" => $phone);
		}
		return $this;
	}

	public function getAddressPhone(){
		return $this->addresses["phone"];
	}

	public function setAddressEmail( $email = null ){
		if( is_null($email) ){
			throw new \Exception('setAddressEmail expects single parameter which contains The email address associated with this billing or shipping address.');
		}else{
			$this->addresses = array("email" => $email);
		}
		return $this;
	}

	public function getAddressEmail(){
		return $this->addresses["email"];
	}

	public function setAddressLabel( $label = null ){
		if( is_null($label) ){
			throw new \Exception('setAddressLabel expects single parameter which contains A label that succinctly identifies the address. For example, "Work" or "Home."');
		}else{
			$this->addresses = array("label" => $label);
		}
		return $this;
	}

	public function getAddressLabel(){
		return $this->addresses["label"];
	}

	public function setAddressType( $address_type = null ){
		if( is_null($address_type) ){
			throw new \Exception('setAddressType expects single parameter which contains The type of address.');
		}else{
			$this->addresses = array("address_type" => $address_type);
		}
		return $this;
	}

	public function getAddressType(){
		return $this->addresses["address_type"];
	}

	public function setAddressTypeShipping( $shipping_address_type = null ){
		if( is_null($shipping_address_type) ){
			throw new \Exception('setAddressTypeShipping expects single parameter which Indicates whether the address is a residential or commercial address.');
		}else{
			$this->addresses = array("shipping_address_type" => $shipping_address_type);
		}
		return $this;
	}

	public function getAddressTypeShipping(){
		return $this->addresses["shipping_address_type"];
	}

	public function setPhysicalAddress( $physical_address = null ){
		if( is_null($physical_address) ){
			throw new \Exception('setPhysicalAddress expects single parameter which contains The Physical Address Object.');
		}else{
			$this->addresses = array("physical_address" => $physical_address);
		}
		return $this;
	}

	public function getPhysicalAddress(){
		return $this->addresses["physical_address"];
	}

	public function setPhysicalAddressStreeLine1( $street_line1 = null ){
		if( is_null($street_line1) ){
			throw new \Exception('setPhysicalAddressStreeLine1 expects single parameter which contains The first line of the street address.');
		}else{
			$this->addresses = array("physical_address" => array("street_line1"=>$street_line1));
		}
		return $this;
	}

	public function getPhysicalAddressStreeLine1(){
		return $this->addresses["physical_address"]["street_line1"];
	}

	public function setPhysicalAddressStreeLine2( $street_line2 = null ){
		if( is_null($street_line2) ){
			throw new \Exception('setPhysicalAddressStreeLine2 expects single parameter which contains The second line of the street address.');
		}else{
			$this->addresses = array("physical_address" => array("street_line2"=>$street_line2));
		}
		return $this;
	}

	public function getPhysicalAddressStreeLine2(){
		return $this->addresses["physical_address"]["street_line2"];
	}

	public function setPhysicalAddressLocality( $locality = null ){
		if( is_null($locality) ){
			throw new \Exception('setPhysicalAddressLocality expects single parameter which contains Locality or city/town/village.');
		}else{
			$this->addresses = array("physical_address" => array("locality"=>$locality));
		}
		return $this;
	}

	public function getPhysicalAddressLocality(){
		return $this->addresses["physical_address"]["locality"];
	}

	public function setPhysicalAddressRegion( $region = null ){
		if( is_null($region) ){
			throw new \Exception('setPhysicalAddressRegion expects single parameter which contains Region or state/province.');
		}else{
			$this->addresses = array("physical_address" => array("region"=>$region));
		}
		return $this;
	}

	public function getPhysicalAddressRegion(){
		return $this->addresses["physical_address"]["region"];
	}

	public function setPhysicalAddressPostalCode( $postal_code = null ){
		if( is_null($postal_code) ){
			throw new \Exception('setPhysicalAddressPostalCode expects single parameter which contains Postal Code.');
		}else{
			$this->addresses = array("physical_address" => array("postal_code"=>$postal_code));
		}
		return $this;
	}

	public function getPhysicalAddressPostalCode(){
		return $this->addresses["physical_address"]["postal_code"];
	}

	public function create( $restCall = null ){
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);
		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/customers/";
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

	public function getCustomerOfOrganization( $org_id = null, $restCall = null ){
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

		$url = "/organizations/".$org_id."/customers/";

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

	public function getCustomerOfLocation( $org_id = null, $loc_id = null,
		$restCall = null )
	{
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

		if ( is_null( $loc_id ) ) {
			$loc_id = "loc_".$config['loc_id'];
		}else if ( strpos($loc_id, 'loc_') !== 0 ) {
			$loc_id = "loc_".$loc_id;
		}else{
			$loc_id = $loc_id;
		}

		$url = "/organizations/".$org_id."/locations/".$loc_id."/customers/";

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

	public function getCustomerById( $cst_token = null, $org_id = null, $loc_id = null, $restCall = null ){
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

		if ( is_null( $loc_id ) ) {
			$loc_id = "loc_".$config['loc_id'];
		}else if ( strpos($loc_id, 'loc_') !== 0 ) {
			$loc_id = "loc_".$loc_id;
		}else{
			$loc_id = $loc_id;
		}

		if ( strpos($cst_token, 'cst_') !== 0 ) {
			$cst_token = "cst_".$cst_token;
		}else{
			$cst_token = $cst_token;
		}

		$url = "/organizations/".$org_id."/locations/".$loc_id."/customers/".$cst_token;

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

	public function getCustomersBySearchFilter( $filter_data = null, $org_id = null, $restCall = null )
	{
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array( "X-Forte-Auth-Organization-Id" => "org_".$config['org_id'] );

		if( !is_array($filter_data) ){
			throw new \Exception('getCustomersBySearchFilter expects 2nd parameter ($filter_data) as an array contains "field" => "value".');
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
			$search_query_string .= $field."%20eq%20'".$value."'";
			if(++$i !== $num_items) {
				$search_query_string .= "%20and%20";
			}	
		}

		$url = "/organizations/".$org_id."/customers/?filter=".$search_query_string;

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

	public function update( $customer_token = null, $org_id = null, $loc_id = null, $restCall = null )
	{
		if( is_null($customer_token) ){
			throw new \Exception("Update function needs one parameters - 1: Customer Token.");
		}

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}else{
			$org_id = $org_id;
		}

		if ( is_null( $loc_id ) ) {
			$loc_id = "loc_".$config['loc_id'];
		}else if ( strpos($loc_id, 'loc_') !== 0 ) {
			$loc_id = "loc_".$loc_id;
		}else{
			$loc_id = $loc_id;
		}

		if (strpos($customer_token, 'cst_') !== 0) {
		   $customer_token = "cst_".$customer_token;
		}

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/".$org_id."/locations/".$loc_id."/customers/".$customer_token;

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

	public function updateAltURI( $customer_token = null, $org_id = null, $restCall = null )
	{
		if( is_null($customer_token) ){
			throw new \Exception("Update function needs one parameters - 1: Customer Token.");
		}

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}else{
			$org_id = $org_id;
		}

		if (strpos($customer_token, 'cst_') !== 0) {
		   $customer_token = "cst_".$customer_token;
		}

		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/".$org_id."/customers/".$customer_token;

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

	public function updateWithPaymethod( $customer_token = null, $org_id = null, $loc_id = null, $restCall = null )
	{
		if( is_null($customer_token) ){
			throw new \Exception("Update function needs one parameter - 1: Customer Token.");
		}

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}else{
			$org_id = $org_id;
		}

		if ( is_null( $loc_id ) ) {
			$loc_id = "loc_".$config['loc_id'];
		}else if ( strpos($loc_id, 'loc_') !== 0 ) {
			$loc_id = "loc_".$loc_id;
		}else{
			$loc_id = $loc_id;
		}

		if (strpos($customer_token, 'cst_') !== 0) {
		   $customer_token = "cst_".$customer_token;
		}

		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/".$org_id."/locations/".$loc_id."/customers/".$customer_token."/paymethods";

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

	public function delete( $customer_token = null, $org_id = null, $loc_id = null, $restCall = null )
	{
		if( is_null($customer_token) ){
			throw new \Exception("Delete function needs three parameters - 1: Customer Token.");
		}

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}else{
			$org_id = $org_id;
		}

		if ( is_null( $loc_id ) ) {
			$loc_id = "loc_".$config['loc_id'];
		}else if ( strpos($loc_id, 'loc_') !== 0 ) {
			$loc_id = "loc_".$loc_id;
		}else{
			$loc_id = $loc_id;
		}

		if (strpos($customer_token, 'cst_') !== 0) {
		   $customer_token = "cst_".$customer_token;
		}
		
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/".$org_id."/locations/".$loc_id."/customers/".$customer_token;

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

}