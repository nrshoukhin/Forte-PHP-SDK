<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Address extends ForteResourceModel{

	private $authentication;

	function __construct($authentication)
	{
	    $this->authentication = $authentication;
	}

	public function setStreetLine1( $street_line1 = null ){
		if( is_null($street_line1) ){
			throw new \Exception("setStreetLine1 expects one string type parameter.");
		}
		$this->physical_address = array("street_line1" => $street_line1);
		return $this;
	}

	public function getStreetLine1(){
		return $this->physical_address["street_line1"];
	}

	public function setStreetLine2( $street_line2 = null ){
		if( is_null($street_line2) ){
			throw new \Exception("setStreetLine2 expects one string type parameter.");
		}
		$this->physical_address = array("street_line2" => $street_line2);
		return $this;
	}

	public function getStreetLine2(){
		return $this->physical_address["street_line2"];
	}

	public function setLocality( $locality = null ){
		if( is_null($locality) ){
			throw new \Exception("setLocality expects one string type parameter.");
		}
		$this->physical_address = array("locality" => $locality);
		return $this;
	}

	public function getLocality(){
		return $this->physical_address["locality"];
	}

	public function setRegion( $region = null ){
		if( is_null($region) ){
			throw new \Exception("setRegion expects one string type parameter");
		}
		$this->physical_address = array("region" => $region);
		return $this;
	}

	public function getRegion(){
		return $this->physical_address["region"];
	}

	public function setCountry( $country = null ){
		if( is_null($country) ){
			throw new \Exception("setCountry expects one string type parameter");
		}
		$this->physical_address = array("country" => $country);
		return $this;
	}

	public function getCountry(){
		return $this->physical_address["country"];
	}

	public function setPostalCode( $postal_code = null ){
		if( is_null($postal_code) ){
			throw new \Exception("setPostalCode expects one string type parameter");
		}
		$this->physical_address = array("postal_code" => $postal_code);
		return $this;
	}

	public function getPostalCode(){
		return $this->physical_address["postal_code"];
	}

	public function setLabel( $label = null ){
		if( is_null($label) ){
			throw new \Exception("setLabel expects one string type parameter");
		}
		$this->label = $label;
		return $this;
	}

	public function getLabel(){
		return $this->label;
	}

	public function setFirstName( $first_name = null ){
		if( is_null($first_name) ){
			throw new \Exception("setFirstName expects one string type parameter");
		}
		$this->first_name = $first_name;
		return $this;
	}

	public function getFirstName(){
		return $this->first_name;
	}

	public function setLastName( $last_name = null ){
		if( is_null($last_name) ){
			throw new \Exception("setLastName expects one string type parameter");
		}
		$this->last_name = $last_name;
		return $this;
	}

	public function getLastName(){
		return $this->last_name;
	}

	public function setCompanyName( $company_name = null ){
		if( is_null($company_name) ){
			throw new \Exception("setCompanyName expects one string type parameter");
		}
		$this->company_name = $company_name;
		return $this;
	}

	public function getCompanyName(){
		return $this->company_name;
	}

	public function setPhone( $phone = null ){
		if( is_null($phone) ){
			throw new \Exception("setPhone expects one string type parameter");
		}
		$this->phone = $phone;
		return $this;
	}

	public function getPhone(){
		return $this->phone;
	}

	public function setEmail( $email = null ){
		if( is_null($email) ){
			throw new \Exception("setEmail expects one string type parameter");
		}
		$this->email = $email;
		return $this;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setShippingAddressType( $shipping_address_type = null ){
		if( is_null($shipping_address_type) ){
			throw new \Exception("setShippingAddressType expects one string type parameter");
		}
		$this->shipping_address_type = $shipping_address_type;
		return $this;
	}

	public function getShippingAddressType(){
		return $this->shipping_address_type;
	}

	public function setAddressType( $address_type = null ){
		if( is_null($address_type) ){
			throw new \Exception("setAddressType expects one string type parameter");
		}
		$this->address_type = $address_type;
		return $this;
	}

	public function getAddressType(){
		return $this->address_type;
	}

	/**
	 * Identifier of a customer's address token.
	 *
	 * @return string
	 */
	public function getAddressToken(){
	    return $this->address_token;
	}

	public function getAddressById( $address_token = null, $restCall = null ){

		if( is_null($address_token) ){
			throw new \Exception("create function needs one parameter - 1: Address Token.");
		}

		$payLoad = $this->toJSON();

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if (strpos($address_token, 'add_') !== 0) {
		   $address_token = "add_".$address_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/addresses/".$address_token;

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

	public function getAddressByCustomerToken( $customer_token = null, $restCall = null ){

		if( is_null($customer_token) ){
			throw new \Exception("create function needs one parameter - 1: Customer Token.");
		}

		$payLoad = $this->toJSON();

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if (strpos($customer_token, 'cst_') !== 0) {
		   $customer_token = "cst_".$customer_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/customers/".$customer_token."/addresses";

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

	public function getAllAddressForLocation( $restCall = null ){

		$payLoad = $this->toJSON();

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/addresses";

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

	public function getAllAddressForOrganization( $restCall = null ){

		$payLoad = $this->toJSON();

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/addresses";

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

	public function create( $customer_token = null, $restCall = null ){

		if( is_null($customer_token) ){
			throw new \Exception("create function needs one parameter - 1: Customer Token.");
		}

		$payLoad = $this->toJSON();

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if (strpos($customer_token, 'cst_') !== 0) {
		   $customer_token = "cst_".$customer_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/customers/".$customer_token."/addresses";

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

	public function createAddressAltURI( $customer_token = null, $restCall = null ){

		if( is_null($customer_token) ){
			throw new \Exception("createAddressAltURI function needs one parameter - 1: Customer Token.");
		}

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$this->location_id = "loc_".$config['loc_id'];

		$payLoad = $this->toJSON();

		if (strpos($customer_token, 'cst_') !== 0) {
		   $customer_token = "cst_".$customer_token;
		}

		$url = "/organizations/org_".$config['org_id']."/customers/".$customer_token."/addresses";

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

	public function update( $customer_token = null, $address_token = null, $restCall = null )
	{
		if( is_null($customer_token) || is_null($address_token) ){
			throw new \Exception("Update function needs two parameters - 1: Customer Token, 2: Address Token.");
		}

		$payLoad = $this->toJSON();

		if (strpos($customer_token, 'cst_') !== 0) {
		   $customer_token = "cst_".$customer_token;
		}

		if (strpos($address_token, 'add_') !== 0) {
		   $address_token = "add_".$address_token;
		}

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/customers/".$customer_token."/addresses/".$address_token;

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

	public function delete( $address_token = null, $restCall = null ){

		if( is_null($address_token) ){
			throw new \Exception("delete function needs two parameters - 1: Address Token.");
		}

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$payLoad = $this->toJSON();

		if (strpos($address_token, 'add_') !== 0) {
		   $address_token = "add_".$address_token;
		}

		$url = "/organizations/org_".$config['org_id']."/locations/loc_".$config['loc_id']."/addresses/".$address_token;

		$json = self::executeCall(
		    $url,
		    "DELETE",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		return json_decode($json, true);

	}
}