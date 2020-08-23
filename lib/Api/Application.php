<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Application extends ForteResourceModel{

	private $authentication;

	function __construct($authentication)
	{
	    $this->authentication = $authentication;
	}

	public function setFeeId( $fee_id ){
		$this->fee_id = $fee_id;
		return $this;
	}

	public function getFeeId(){
		return $this->fee_id;
	}

	public function setSourceIp( $source_ip ){
		$this->source_ip = $source_ip;
		return $this;
	}

	public function getSourceIp(){
		return $this->source_ip;
	}

	public function setAnnualVolume( $annual_volume ){
		$this->annual_volume = $annual_volume;
		return $this;
	}

	public function getAnnualVolume(){
		return $this->annual_volume;
	}

	public function setAverageTransactionAmount( $average_transaction_amount ){
		$this->average_transaction_amount = $average_transaction_amount;
		return $this;
	}

	public function getAverageTransactionAmount(){
		return $this->average_transaction_amount;
	}

	public function setMarketType( $market_type ){
		$this->market_type = $market_type;
		return $this;
	}

	public function getMarketType(){
		return $this->market_type;
	}

	public function setTermsAndConditionVersion( $t_and_c_version ){
		$this->t_and_c_version = $t_and_c_version;
		return $this;
	}

	public function getTermsAndConditionVersion(){
		return $this->t_and_c_version;
	}

	public function setTermsAndConditionTimestamp( $t_and_c_time_stamp ){
		$this->t_and_c_time_stamp = $t_and_c_time_stamp;
		return $this;
	}

	public function getTermsAndConditionTimestamp(){
		return $this->t_and_c_time_stamp;
	}

	public function setRiskSessionId( $risk_session_id ){
		$this->risk_session_id = $risk_session_id;
		return $this;
	}

	public function getRiskSessionId(){
		return $this->risk_session_id;
	}

	public function setMaximumTransactionAmount( $maximum_transaction_amount ){
		$this->maximum_transaction_amount = $maximum_transaction_amount;
		return $this;
	}

	public function getMaximumTransactionAmount(){
		return $this->maximum_transaction_amount;
	}

	public function setAveragePayableAmount( $average_payable_amount ){
		$this->average_payable_amount = $average_payable_amount;
		return $this;
	}

	public function getAveragePayableAmount(){
		return $this->average_payable_amount;
	}

	public function setMaximumPayableAmount( $maximum_payable_amount ){
		$this->maximum_payable_amount = $maximum_payable_amount;
		return $this;
	}

	public function getMaximumPayableAmount(){
		return $this->maximum_payable_amount;
	}

	public function setMonthlyPayableVolume( $monthly_payable_volume ){
		$this->monthly_payable_volume = $monthly_payable_volume;
		return $this;
	}

	public function getMonthlyPayableVolume(){
		return $this->monthly_payable_volume;
	}

	public function setRecievedDate( $received_date ){
		$this->received_date = $received_date;
		return $this;
	}

	public function getRecievedDate(){
		return $this->received_date;
	}

	public function setUpdatedDate( $updated_date ){
		$this->updated_date = $updated_date;
		return $this;
	}

	public function getUpdatedDate(){
		return $this->updated_date;
	}

	public function setSalesRep( $sales_rep ){
		$this->sales_rep = $sales_rep;
		return $this;
	}

	public function getSalesRep(){
		return $this->sales_rep;
	}

	public function setLocationId( $location_id ){
		$this->location_id = $location_id;
		return $this;
	}

	public function getLocationId(){
		return $this->location_id;
	}

	public function setStatus( $status ){
		$this->status = $status;
		return $this;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setDeclineReason( $decline_reason ){
		$this->decline_reason = $decline_reason;
		return $this;
	}

	public function getDeclineReason(){
		return $this->decline_reason;
	}

	public function setLegalName( $legal_name ){
		$this->applicant_organization = array("legal_name" => $legal_name);
		return $this;
	}

	public function getLegalName(){
		return $this->applicant_organization['legal_name'];
	}

	public function setTaxIdNumber( $tax_id_number ){
		$this->applicant_organization = array("tax_id_number" => $tax_id_number);
		return $this;
	}

	public function getTaxIdNumber(){
		return $this->applicant_organization['tax_id_number'];
	}

	public function setLegalStructure( $legal_structure ){
		$this->applicant_organization = array("legal_structure" => $legal_structure);
		return $this;
	}

	public function getLegalStructure(){
		return $this->applicant_organization['legal_structure'];
	}

	public function setDbaName( $dba_name ){
		$this->applicant_organization = array("dba_name" => $dba_name);
		return $this;
	}

	public function getDbaName(){
		return $this->applicant_organization['dba_name'];
	}

	public function setOrganizationId( $organization_id ){
		$this->applicant_organization = array("organization_id" => $organization_id);
		return $this;
	}

	public function getOrganizationId(){
		return $this->applicant_organization['organization_id'];
	}

	public function setStreetAddress1( $street_address1 ){
		$this->applicant_organization = array("street_address1" => $street_address1);
		return $this;
	}

	public function getStreetAddress1(){
		return $this->applicant_organization['street_address1'];
	}

	public function setLocality( $locality ){
		$this->applicant_organization = array("locality" => $locality);
		return $this;
	}

	public function getLocality(){
		return $this->applicant_organization['locality'];
	}

	public function setRegion( $region ){
		$this->applicant_organization = array("region" => $region);
		return $this;
	}

	public function getRegion(){
		return $this->applicant_organization['region'];
	}

	public function setPostalCode( $postal_code ){
		$this->applicant_organization = array("postal_code" => $postal_code);
		return $this;
	}

	public function getPostalCode(){
		return $this->applicant_organization['postal_code'];
	}

	public function setCustomerServicePhone( $customer_service_phone ){
		$this->applicant_organization = array("customer_service_phone" => $customer_service_phone);
		return $this;
	}

	public function getCustomerServicePhone(){
		return $this->applicant_organization['customer_service_phone'];
	}

	public function setWebsite( $website ){
		$this->applicant_organization = array("website" => $website);
		return $this;
	}

	public function getWebsite(){
		return $this->applicant_organization['website'];
	}

	public function setBusinessType( $business_type ){
		$this->applicant_organization = array("business_type" => $business_type);
		return $this;
	}

	public function getBusinessType(){
		return $this->applicant_organization['business_type'];
	}

	public function setBankAcountType( $bank_account_type ){
		$this->applicant_organization = array("bank_account_type" => $bank_account_type);
		return $this;
	}

	public function getBankAcountType(){
		return $this->applicant_organization['bank_account_type'];
	}

	public function setBankRoutingNumber( $bank_routing_number ){
		$this->applicant_organization = array("bank_routing_number" => $bank_routing_number);
		return $this;
	}

	public function getBankRoutingNumber(){
		return $this->applicant_organization['bank_routing_number'];
	}

	public function setBankAccountNumber( $bank_account_number ){
		$this->applicant_organization = array("bank_account_number" => $bank_account_number);
		return $this;
	}

	public function getBankAccountNumber(){
		return $this->applicant_organization['bank_account_number'];
	}

	public function setOwnerPercentage( $percentage ){
		$this->owner = array("percentage" => $percentage);
		return $this;
	}

	public function getOwnerPercentage(){
		return $this->owner['percentage'];
	}

	public function setOwnerTitle( $title ){
		$this->owner = array("title" => $title);
		return $this;
	}

	public function getOwnerTitle(){
		return $this->owner['title'];
	}

	public function setOwnerFirstName( $first_name ){
		$this->owner = array("first_name" => $first_name);
		return $this;
	}

	public function getOwnerFirstName(){
		return $this->owner['first_name'];
	}

	public function setOwnerLastName( $last_name ){
		$this->owner = array("last_name" => $last_name);
		return $this;
	}

	public function getOwnerLastName(){
		return $this->owner['last_name'];
	}

	public function setOwnerStreetAddress1( $street_address1 ){
		$this->owner = array("street_address1" => $street_address1);
		return $this;
	}

	public function getOwnerStreetAddress1(){
		return $this->owner['street_address1'];
	}

	public function setOwnerLocality( $locality ){
		$this->owner = array("locality" => $locality);
		return $this;
	}

	public function getOwnerLocality(){
		return $this->owner['locality'];
	}

	public function setOwnerRegion( $region ){
		$this->owner = array("region" => $region);
		return $this;
	}

	public function getOwnerRegion(){
		return $this->owner['region'];
	}

	public function setOwnerPostalCode( $postal_code ){
		$this->owner = array("postal_code" => $postal_code);
		return $this;
	}

	public function getOwnerPostalCode(){
		return $this->owner['postal_code'];
	}

	public function setOwnerCountry( $country ){
		$this->owner = array("country" => $country);
		return $this;
	}

	public function getOwnerCountry(){
		return $this->owner['country'];
	}

	public function setOwnerCitizenship( $citizenship ){
		$this->owner = array("citizenship" => $citizenship);
		return $this;
	}

	public function getOwnerCitizenship(){
		return $this->owner['citizenship'];
	}

	public function setOwnerEmailAddress( $email_address ){
		$this->owner = array("email_address" => $email_address);
		return $this;
	}

	public function getOwnerEmailAddress(){
		return $this->owner['email_address'];
	}

	public function setOwnerMobilePhone( $mobile_phone ){
		$this->owner = array("mobile_phone" => $mobile_phone);
		return $this;
	}

	public function getOwnerMobilePhone(){
		return $this->owner['mobile_phone'];
	}

	public function setOwnerLast4ssn( $last4_ssn ){
		$this->owner = array("last4_ssn" => $last4_ssn);
		return $this;
	}

	public function getOwnerLast4ssn(){
		return $this->owner['last4_ssn'];
	}

	public function setOwnerDateOfBirth( $date_of_birth ){
		$this->owner = array("date_of_birth" => $date_of_birth);
		return $this;
	}

	public function getOwnerDateOfBirth(){
		return $this->owner['date_of_birth'];
	}

	public function setOwner2Percentage( $percentage ){
		$this->owner_2 = array("percentage" => $percentage);
		return $this;
	}

	public function getOwner2Percentage(){
		return $this->owner_2['percentage'];
	}

	public function setOwner2FirstName( $first_name ){
		$this->owner_2 = array("first_name" => $first_name);
		return $this;
	}

	public function getOwner2FirstName(){
		return $this->owner_2['first_name'];
	}

	public function setOwner2LastName( $last_name ){
		$this->owner_2 = array("last_name" => $last_name);
		return $this;
	}

	public function getOwner2LastName(){
		return $this->owner_2['last_name'];
	}

	public function setOwner2StreetAddress1( $street_address1 ){
		$this->owner_2 = array("street_address1" => $street_address1);
		return $this;
	}

	public function getOwner2StreetAddress1(){
		return $this->owner_2['street_address1'];
	}

	public function setOwner2Locality( $locality ){
		$this->owner_2 = array("locality" => $locality);
		return $this;
	}

	public function getOwner2Locality(){
		return $this->owner_2['locality'];
	}

	public function setOwner2Region( $region ){
		$this->owner_2 = array("region" => $region);
		return $this;
	}

	public function getOwner2Region(){
		return $this->owner_2['region'];
	}

	public function setOwner2PostalCode( $postal_code ){
		$this->owner_2 = array("postal_code" => $postal_code);
		return $this;
	}

	public function getOwner2PostalCode(){
		return $this->owner_2['postal_code'];
	}

	public function setOwner2Country( $country ){
		$this->owner_2 = array("country" => $country);
		return $this;
	}

	public function getOwner2Country(){
		return $this->owner_2['country'];
	}

	public function setOwner2Citizenship( $citizenship ){
		$this->owner_2 = array("citizenship" => $citizenship);
		return $this;
	}

	public function getOwner2Citizenship(){
		return $this->owner_2['citizenship'];
	}

	public function setOwner2EmailAddress( $email_address ){
		$this->owner_2 = array("email_address" => $email_address);
		return $this;
	}

	public function getOwner2EmailAddress(){
		return $this->owner_2['email_address'];
	}

	public function setOwner2MobilePhone( $mobile_phone ){
		$this->owner_2 = array("mobile_phone" => $mobile_phone);
		return $this;
	}

	public function getOwner2MobilePhone(){
		return $this->owner_2['mobile_phone'];
	}

	public function setOwner2Last4ssn( $last4_ssn ){
		$this->owner_2 = array("last4_ssn" => $last4_ssn);
		return $this;
	}

	public function getOwner2Last4ssn(){
		return $this->owner_2['last4_ssn'];
	}

	public function setOwner2DateOfBirth( $date_of_birth ){
		$this->owner_2 = array("date_of_birth" => $date_of_birth);
		return $this;
	}

	public function getOwner2DateOfBirth(){
		return $this->owner_2['date_of_birth'];
	}

	public function setOwner3Percentage( $percentage ){
		$this->owner_3 = array("percentage" => $percentage);
		return $this;
	}

	public function getOwner3Percentage(){
		return $this->owner_3['percentage'];
	}

	public function setOwner3FirstName( $first_name ){
		$this->owner_3 = array("first_name" => $first_name);
		return $this;
	}

	public function getOwner3FirstName(){
		return $this->owner_3['first_name'];
	}

	public function setOwner3LastName( $last_name ){
		$this->owner_3 = array("last_name" => $last_name);
		return $this;
	}

	public function getOwner3LastName(){
		return $this->owner_3['last_name'];
	}

	public function setOwner3StreetAddress1( $street_address1 ){
		$this->owner_3 = array("street_address1" => $street_address1);
		return $this;
	}

	public function getOwner3StreetAddress1(){
		return $this->owner_3['street_address1'];
	}

	public function setOwner3Locality( $locality ){
		$this->owner_3 = array("locality" => $locality);
		return $this;
	}

	public function getOwner3Locality(){
		return $this->owner_3['locality'];
	}

	public function setOwner3Region( $region ){
		$this->owner_3 = array("region" => $region);
		return $this;
	}

	public function getOwner3Region(){
		return $this->owner_3['region'];
	}

	public function setOwner3PostalCode( $postal_code ){
		$this->owner_3 = array("postal_code" => $postal_code);
		return $this;
	}

	public function getOwner3PostalCode(){
		return $this->owner_3['postal_code'];
	}

	public function setOwner3Country( $country ){
		$this->owner_3 = array("country" => $country);
		return $this;
	}

	public function getOwner3Country(){
		return $this->owner_3['country'];
	}

	public function setOwner3Citizenship( $citizenship ){
		$this->owner_3 = array("citizenship" => $citizenship);
		return $this;
	}

	public function getOwner3Citizenship(){
		return $this->owner_3['citizenship'];
	}

	public function setOwner3EmailAddress( $email_address ){
		$this->owner_3 = array("email_address" => $email_address);
		return $this;
	}

	public function getOwner3EmailAddress(){
		return $this->owner_3['email_address'];
	}

	public function setOwner3MobilePhone( $mobile_phone ){
		$this->owner_3 = array("mobile_phone" => $mobile_phone);
		return $this;
	}

	public function getOwner3MobilePhone(){
		return $this->owner_3['mobile_phone'];
	}

	public function setOwner3Last4ssn( $last4_ssn ){
		$this->owner_3 = array("last4_ssn" => $last4_ssn);
		return $this;
	}

	public function getOwner3Last4ssn(){
		return $this->owner_3['last4_ssn'];
	}

	public function setOwner3DateOfBirth( $date_of_birth ){
		$this->owner_3 = array("date_of_birth" => $date_of_birth);
		return $this;
	}

	public function getOwner3DateOfBirth(){
		return $this->owner_3['date_of_birth'];
	}

	public function setOwner4Percentage( $percentage ){
		$this->owner_4 = array("percentage" => $percentage);
		return $this;
	}

	public function getOwner4Percentage(){
		return $this->owner_4['percentage'];
	}

	public function setOwner4FirstName( $first_name ){
		$this->owner_4 = array("first_name" => $first_name);
		return $this;
	}

	public function getOwner4FirstName(){
		return $this->owner_4['first_name'];
	}

	public function setOwner4LastName( $last_name ){
		$this->owner_4 = array("last_name" => $last_name);
		return $this;
	}

	public function getOwner4LastName(){
		return $this->owner_4['last_name'];
	}

	public function setOwner4StreetAddress1( $street_address1 ){
		$this->owner_4 = array("street_address1" => $street_address1);
		return $this;
	}

	public function getOwner4StreetAddress1(){
		return $this->owner_4['street_address1'];
	}

	public function setOwner4Locality( $locality ){
		$this->owner_4 = array("locality" => $locality);
		return $this;
	}

	public function getOwner4Locality(){
		return $this->owner_4['locality'];
	}

	public function setOwner4Region( $region ){
		$this->owner_4 = array("region" => $region);
		return $this;
	}

	public function getOwner4Region(){
		return $this->owner_4['region'];
	}

	public function setOwner4PostalCode( $postal_code ){
		$this->owner_4 = array("postal_code" => $postal_code);
		return $this;
	}

	public function getOwner4PostalCode(){
		return $this->owner_4['postal_code'];
	}

	public function setOwner4Country( $country ){
		$this->owner_4 = array("country" => $country);
		return $this;
	}

	public function getOwner4Country(){
		return $this->owner_4['country'];
	}

	public function setOwner4Citizenship( $citizenship ){
		$this->owner_4 = array("citizenship" => $citizenship);
		return $this;
	}

	public function getOwner4Citizenship(){
		return $this->owner_4['citizenship'];
	}

	public function setOwner4EmailAddress( $email_address ){
		$this->owner_4 = array("email_address" => $email_address);
		return $this;
	}

	public function getOwner4EmailAddress(){
		return $this->owner_4['email_address'];
	}

	public function setOwner4MobilePhone( $mobile_phone ){
		$this->owner_4 = array("mobile_phone" => $mobile_phone);
		return $this;
	}

	public function getOwner4MobilePhone(){
		return $this->owner_4['mobile_phone'];
	}

	public function setOwner4Last4ssn( $last4_ssn ){
		$this->owner_4 = array("last4_ssn" => $last4_ssn);
		return $this;
	}

	public function getOwner4Last4ssn(){
		return $this->owner_4['last4_ssn'];
	}

	public function setOwner4DateOfBirth( $date_of_birth ){
		$this->owner_4 = array("date_of_birth" => $date_of_birth);
		return $this;
	}

	public function getOwner4DateOfBirth(){
		return $this->owner_4['date_of_birth'];
	}

	public function setProvider( $provider ){
		$this->gateway = array("provider" => $provider);
		return $this;
	}

	public function getProvider(){
		return $this->gateway['provider'];
	}

	public function setBankIdNumber( $bank_id_number ){
		$this->gateway = array("bank_id_number" => $bank_id_number);
		return $this;
	}

	public function getBankIdNumber(){
		return $this->gateway['bank_id_number'];
	}

	public function setMerchantId( $merchant_id ){
		$this->gateway = array("merchant_id" => $merchant_id);
		return $this;
	}

	public function getMerchantId(){
		return $this->gateway['merchant_id'];
	}

	public function setTerminalId( $terminal_id ){
		$this->gateway = array("terminal_id" => $terminal_id);
		return $this;
	}

	public function getTerminalId(){
		return $this->gateway['terminal_id'];
	}

	public function setAgent( $agent ){
		$this->gateway = array("agent" => $agent);
		return $this;
	}

	public function getAgent(){
		return $this->gateway['agent'];
	}

	public function setChain( $chain ){
		$this->gateway = array("chain" => $chain);
		return $this;
	}

	public function getChain(){
		return $this->gateway['chain'];
	}

	public function setStore( $store ){
		$this->gateway = array("store" => $store);
		return $this;
	}

	public function getStore(){
		return $this->gateway['store'];
	}

	public function setTerminal( $terminal ){
		$this->gateway = array("terminal" => $terminal);
		return $this;
	}

	public function getTerminal(){
		return $this->gateway['terminal'];
	}

	/**
	 * Identifier of a customer's address token.
	 *
	 * @return string
	 */
	public function getApplicationId(){
	    return $this->application_id;
	}

	public function create( $restCall = null ){
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);
		$url = "/organizations/org_".$config['org_id']."/applications";
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

	public function getApplicationById( $application_id = null, $restCall = null ){
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if (strpos($application_id, 'app_') !== 0) {
		   $application_id = "app_".$application_id;
		}

		$url  = "/organizations/org_".$config['org_id']."/applications/".$application_id;
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

	public function getApplicationByDate( $start_date = null, $end_date = null, $restCall = null ){

		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/applications/?filter=start_received_date+eq+%27".$start_date."%27+AND+end_received_date+eq+%27".$end_date."%27";

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