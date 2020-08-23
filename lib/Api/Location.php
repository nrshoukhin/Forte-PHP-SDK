<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class Location extends ForteResourceModel{

	private $authentication;

	function __construct($authentication)
	{
	    $this->authentication = $authentication;
	}

	public function setLocationId( $location_id = null ){
		if( is_null($location_id) ){
			throw new \Exception( "setLocationId expects one string type parameter which contains the identification number of the associated location." );
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

	public function setStatus( $status = null ){

		if( is_null($status) ){
			throw new \Exception( "setStatus expects one string type parameter which contains the status of this location." );
		}

		$this->status = $status;

		return $this;

	}

	public function getStatus(){
		return $this->status;
	}

	public function setCreatedDate( $created_date = null ){

		if( is_null($created_date) ){
			throw new \Exception( "setCreatedDate expects one string type parameter which contains the date that Forte created the location." );
		}

		$this->created_date = $created_date;

		return $this;

	}

	public function getCreatedDate(){
		return $this->created_date;
	}

	public function setDBAName( $dba_name = null ){

		if( is_null($dba_name) ){
			throw new \Exception( "setCreatedDate expects one string type parameter which contains the merchant's Doing Business As (DBA) name." );
		}

		$this->dba_name = $dba_name;

		return $this;

	}

	public function getDBAName(){
		return $this->dba_name;
	}

	public function setStreetAddress1( $street_address1 = null ){

		if( is_null($street_address1) ){
			throw new \Exception( "setStreetAddress1 expects one string type parameter which contains the first line of the location's street address." );
		}

		$this->street_address1 = $street_address1;

		return $this;

	}

	public function getStreetAddress1(){
		return $this->street_address1;
	}

	public function setStreetAddress2( $street_address2 = null ){

		if( is_null($street_address2) ){
			throw new \Exception( "setStreetAddress2 expects one string type parameter which contains the second line of the location's street address." );
		}

		$this->street_address2 = $street_address2;

		return $this;

	}

	public function getStreetAddress2(){
		return $this->street_address2;
	}

	public function setLocality( $locality = null ){

		if( is_null($locality) ){
			throw new \Exception( "setLocality expects one string type parameter which contains the city/town/village/locality of the location." );
		}

		$this->locality = $locality;

		return $this;

	}

	public function getLocality(){
		return $this->locality;
	}

	public function setRegion( $region = null ){

		if( is_null($region) ){
			throw new \Exception( "setRegion expects one string type parameter which contains the state or province of the location." );
		}

		$this->region = $region;

		return $this;

	}

	public function getRegion(){
		return $this->region;
	}

	public function setPostalCode( $postal_code = null ){

		if( is_null($postal_code) ){
			throw new \Exception( "setPostalCode expects one string type parameter which contains the zip or postal code of the location." );
		}
		$this->postal_code = $postal_code;
		return $this;

	}

	public function getPostalCode(){
		return $this->postal_code;
	}

	public function setCountry( $country = null ){

		if( is_null($country) ){
			throw new \Exception( "setCountry expects one string type parameter which contains the Alpha-3, ISO-standard country code of the location." );
		}
		$this->country = $country;
		return $this;

	}

	public function getCountry(){
		return $this->country;
	}

	public function setBusinessPhone( $business_phone = null ){

		if( is_null($business_phone) ){
			throw new \Exception( "setBusinessPhone expects one string type parameter which contains the business phone number of the location." );
		}
		$this->business_phone = $business_phone;
		return $this;

	}

	public function getBusinessPhone(){
		return $this->business_phone;
	}

	public function setCurrency( $currency = null ){

		if( is_null($currency) ){
			throw new \Exception( "setCurrency expects one string type parameter which contains the Alpha-3, ISO-standard currency code of the currency the location uses." );
		}
		$this->currency = $currency;
		return $this;

	}

	public function getCurrency(){
		return $this->currency;
	}

	public function setTimeZone( $timezone = null ){

		if( is_null($timezone) ){
			throw new \Exception( "setTimeZone expects one string type parameter which contains the timezone of the location." );
		}
		$this->timezone = $timezone;
		return $this;

	}

	public function getTimeZone(){
		return $this->timezone;
	}

	public function setBusinessType( $business_type = null ){

		if( is_null($business_type) ){
			throw new \Exception( "setBusinessType expects one string type parameter which contains the location's type of business." );
		}
		$this->business_type = $business_type;
		return $this;

	}

	public function getBusinessType(){
		return $this->business_type;
	}

	public function setOrganizationID( $organization_id = null ){

		if( is_null($organization_id) ){
			throw new \Exception( "setOrganizationID expects one string type parameter which contains the identification number of the associated organization." );
		}else if ( strpos($organization_id, 'org_') !== 0 ) {
		   	$this->organization_id = "org_".$organization_id;
		}else{
			$this->organization_id = $organization_id;
		}
		return $this;

	}

	public function getOrganizationID(){
		return $this->organization_id;
	}

	public function setOrganizationName( $organization_name = null ){
		if( is_null($organization_name) ){
			throw new \Exception( "setOrganizationName expects one string type parameter which contains the name of the associated organization." );
		}
		$this->organization_name = $organization_name;
		return $this;
	}

	public function getOrganizationName(){
		return $this->organization_name;
	}

	public function setParentOrganizationID( $parent_organization_id = null ){
		if( is_null($parent_organization_id) ){
			throw new \Exception( "setParentOrganizationID expects one string type parameter which contains the identification number of the associated parent organization." );
		}
		$this->parent_organization_id = $parent_organization_id;
		return $this;
	}

	public function getParentOrganizationID(){
		return $this->parent_organization_id;
	}

	public function setContactFullName( $full_name = null ){
		if( is_null($full_name) ){
			throw new \Exception("setContactFullName expects a string which contains the first and last name of this location's contact.");
		}else{
			$this->contacts = array("full_name" => $full_name);
		}
		return $this;
	}

	public function getContactFullName(){
		return $this->contacts["full_name"];
	}

	public function setContactPhone( $phone = null ){
		if( is_null($phone) ){
			throw new \Exception("setContactPhone expects a string which contains the phone number of this location's contact.");
		}else{
			$this->contacts = array("phone" => $phone);
		}
		return $this;
	}

	public function getContactPhone(){
		return $this->contacts["phone"];
	}

	public function setContactEmail( $email = null ){
		if( is_null($email) ){
			throw new \Exception("setContactEmail expects a string which contains the business email address of this location's contact.");
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  	throw new \Exception("setContactEmail expects a valid email address.");
		}else{
			$this->contacts = array("email" => $email);
		}
		return $this;
	}

	public function getContactEmail(){
		return $this->contacts["email"];
	}

	public function setContactType( $type = null ){
		if( is_null($type) ){
			throw new \Exception("setContactType expects a string which contains the type of contact associated with this location.");
		}else{
			$this->contacts = array("type" => $type);
		}
		return $this;
	}

	public function getContactType(){
		return $this->contacts["type"];
	}

	public function setEcheckServiceFeePercentage( $service_fee_percentage = null ){
		if( is_null($service_fee_percentage) ){
			throw new \Exception("setEcheckServiceFeePercentage expects a string which contains the service fee (i.e., convenience fee) percentage amount for ACH transactions.");
		}else{
			$this->services = array("echeck" => array("service_fee_percentage" => $service_fee_percentage));
		}
		return $this;
	}

	public function getEcheckServiceFeePercentage(){
		return $this->services["echeck"]["service_fee_percentage"];
	}

	public function setEcheckServiceFeeMinAmount( $service_fee_min_amount = null ){
		if( is_null($service_fee_min_amount) ){
			throw new \Exception("setEcheckServiceFeeMinAmount expects a string which contains the minimum service fee (i.e., convenience fee) amount for ACH transactions.");
		}else{
			$this->services = array("echeck" => array("service_fee_min_amount" => $service_fee_min_amount));
		}
		return $this;
	}

	public function getEcheckServiceFeeMinAmount(){
		return $this->services["echeck"]["service_fee_min_amount"];
	}

	public function setEcheckServiceFeeAmount( $service_fee_amount = null ){
		if( is_null($service_fee_amount) ){
			throw new \Exception("setEcheckServiceFeeAmount expects a string which contains the flat service fee (i.e., convenience fee) amount for ACH transactions.");
		}else{
			$this->services = array("echeck" => array("service_fee_amount" => $service_fee_amount));
		}
		return $this;
	}

	public function getEcheckServiceFeeAmount(){
		return $this->services["echeck"]["service_fee_amount"];
	}

	public function setEcheckServiceFeeRange( $service_fee_range = null ){
		if( is_null($service_fee_range) ){
			throw new \Exception("setEcheckServiceFeeRange expects a string which contains the range of service fee (i.e., convenience fee) amounts for ACH transactions.");
		}else{
			$this->services = array("echeck" => array("service_fee_range" => $service_fee_range));
		}
		return $this;
	}

	public function getEcheckServiceFeeRange(){
		return $this->services["echeck"]["service_fee_range"];
	}

	public function setEcheckServiceFeeTiered( $service_fee_tiered = null ){
		if( is_null($service_fee_tiered) ){
			throw new \Exception("setEcheckServiceFeeTiered expects a string which contains the tiered service fee (i.e., convenience fee) amounts for ACH transactions.");
		}else{
			$this->services = array("echeck" => array("service_fee_tiered" => $service_fee_tiered));
		}
		return $this;
	}

	public function getEcheckServiceFeeTiered(){
		return $this->services["echeck"]["service_fee_tiered"];
	}

	public function setEcheckServiceFeeAdditionalAmount( $service_fee_additional_amount = null ){
		if( is_null($service_fee_additional_amount) ){
			throw new \Exception("setEcheckServiceFeeTiered expects a string which contains the additional service fee (i.e., convenience fee) amounts for ACH transactions.");
		}else{
			$this->services = array("echeck" => array("service_fee_additional_amount" => $service_fee_additional_amount));
		}
		return $this;
	}

	public function getEcheckServiceFeeAdditionalAmount(){
		return $this->services["echeck"]["service_fee_additional_amount"];
	}

	public function setEcheckHoldDaysSales( $hold_days_sales = null ){
		if( is_null($hold_days_sales) ){
			throw new \Exception("setEcheckHoldDaysSales expects a string which contains the number of days ACH funds from sale transactions are held before the receiving bank reconciles and settles the transaction.");
		}else{
			$this->services = array("echeck" => array("hold_days_sales" => $hold_days_sales));
		}
		return $this;
	}

	public function getEcheckHoldDaysSales(){
		return $this->services["echeck"]["hold_days_sales"];
	}

	public function setEcheckHoldDaysRefunds( $hold_days_refunds = null ){
		if( is_null($hold_days_refunds) ){
			throw new \Exception("setEcheckHoldDaysRefunds expects a string which contains the number of days ACH funds from refund/credit transactions are held before before the receiving bank reconciles and settles the transaction.");
		}else{
			$this->services = array("echeck" => array("hold_days_refunds" => $hold_days_refunds));
		}
		return $this;
	}

	public function getEcheckHoldDaysRefunds(){
		return $this->services["echeck"]["hold_days_refunds"];
	}

	public function setEcheckHoldDaysResubmits( $hold_days_resubmits = null ){
		if( is_null($hold_days_resubmits) ){
			throw new \Exception("setEcheckHoldDaysResubmits expects a string which contains the number of days ACH funds are held before the transaction is resubmitted to/from your customer's account.");
		}else{
			$this->services = array("echeck" => array("hold_days_resubmits" => $hold_days_resubmits));
		}
		return $this;
	}

	public function getEcheckHoldDaysResubmits(){
		return $this->services["echeck"]["hold_days_resubmits"];
	}

	public function setEcheckCutOffTime( $cut_off_time = null ){
		if( is_null($cut_off_time) ){
			throw new \Exception("setEcheckHoldDaysResubmits expects a string which contains the settlement cut-off times configured for this location based on the ACH processor.");
		}else{
			$this->services = array("echeck" => array("cut_off_time" => $cut_off_time));
		}
		return $this;
	}

	public function getEcheckCutOffTime(){
		return $this->services["echeck"]["cut_off_time"];
	}

	public function setEcheckEntryClassCode( $entry_class_code = null ){
		if( is_null($entry_class_code) ){
			throw new \Exception("setEcheckEntryClassCode expects a string which contains the list of standard entry class codes configured for this location.");
		}else{
			$this->services = array("echeck" => array("entry_class_code" => $entry_class_code));
		}
		return $this;
	}

	public function getEcheckEntryClassCode(){
		return $this->services["echeck"]["entry_class_code"];
	}

	public function setEcheckNachaID( $nacha_id = null ){
		if( is_null($nacha_id) ){
			throw new \Exception("setEcheckNachaID expects a string which contains the NACHA Co ID or Company ID used to process ACH transactions for this location.");
		}else{
			$this->services = array("echeck" => array("nacha_id" => $nacha_id));
		}
		return $this;
	}

	public function getEcheckNachaID(){
		return $this->services["echeck"]["nacha_id"];
	}

	public function setCardCutOffTime( $cut_off_time = null ){
		if( is_null($cut_off_time) ){
			throw new \Exception("setCardCutOffTime expects a string which contains the settlement cut-off times configured for this location based on the credit card processor.");
		}else{
			$this->services = array("card" => array("cut_off_time" => $cut_off_time));
		}
		return $this;
	}

	public function getCardCutOffTime(){
		return $this->services["card"]["cut_off_time"];
	}

	public function setCardMarketType( $market_type = null ){
		if( is_null($market_type) ){
			throw new \Exception("setCardMarketType expects a string which contains the method by which the business captures the majority of its transactions.");
		}else{
			$this->services = array("card" => array("market_type" => $market_type));
		}
		return $this;
	}

	public function getCardMarketType(){
		return $this->services["card"]["market_type"];
	}

	public function setCardServiceFeePercentage( $service_fee_percentage = null ){
		if( is_null($service_fee_percentage) ){
			throw new \Exception("setCardServiceFeePercentage expects a string which contains the service fee (i.e., convenience fee) percentage amount for credit card transactions.");
		}else{
			$this->services = array("card" => array("service_fee_percentage" => $service_fee_percentage));
		}
		return $this;
	}

	public function getCardServiceFeePercentage(){
		return $this->services["card"]["service_fee_percentage"];
	}

	public function setCardServiceFeeMinAmount( $service_fee_min_amount = null ){
		if( is_null($service_fee_min_amount) ){
			throw new \Exception("setCardServiceFeeMinAmount expects a string which contains the minimum service fee (i.e., convenience fee) amount for credit card transactions.");
		}else{
			$this->services = array("card" => array("service_fee_min_amount" => $service_fee_min_amount));
		}
		return $this;
	}

	public function getCardServiceFeeMinAmount(){
		return $this->services["card"]["service_fee_min_amount"];
	}

	public function setCardServiceFeeAmount( $service_fee_amount = null ){
		if( is_null($service_fee_amount) ){
			throw new \Exception("setCardServiceFeeAmount expects a string which contains the flat service fee (i.e., convenience fee) amount for Credit Card transactions.");
		}else{
			$this->services = array("card" => array("service_fee_amount" => $service_fee_amount));
		}
		return $this;
	}

	public function getCardServiceFeeAmount(){
		return $this->services["card"]["service_fee_amount"];
	}

	public function setCardServiceFeeRange( $service_fee_range = null ){
		if( is_null($service_fee_range) ){
			throw new \Exception("setCardServiceFeeRange expects a string which contains the range of service fee (i.e., convenience fee) amounts for Credit Card transactions.");
		}else{
			$this->services = array("card" => array("service_fee_range" => $service_fee_range));
		}
		return $this;
	}

	public function getCardServiceFeeRange(){
		return $this->services["card"]["service_fee_range"];
	}

	public function setCardServiceFeeTiered( $service_fee_tiered = null ){
		if( is_null($service_fee_tiered) ){
			throw new \Exception("setCardServiceFeeTiered expects a string which contains the tiered service fee (i.e., convenience fee) amounts for Credit Card transactions.");
		}else{
			$this->services = array("card" => array("service_fee_tiered" => $service_fee_tiered));
		}
		return $this;
	}

	public function getCardServiceFeeTiered(){
		return $this->services["card"]["service_fee_tiered"];
	}

	public function setCardServiceFeeAdditionalAmount( $service_fee_additional_amount = null ){
		if( is_null($service_fee_additional_amount) ){
			throw new \Exception("setCardServiceFeeAdditionalAmount expects a string which contains the additional service fee (i.e., convenience fee) amounts for Credit Card transactions.");
		}else{
			$this->services = array("card" => array("service_fee_additional_amount" => $service_fee_additional_amount));
		}
		return $this;
	}

	public function getCardServiceFeeAdditionalAmount(){
		return $this->services["card"]["service_fee_additional_amount"];
	}

	public function setCardServiceFeeVisaTaxAmount( $service_fee_visa_tax_amount = null ){
		if( is_null($service_fee_visa_tax_amount) ){
			throw new \Exception("setCardServiceFeeVisaTaxAmount expects a string which contains the flat service fee (i.e., convenience fee) amount used for VISA Debit cards.");
		}else{
			$this->services = array("card" => array("service_fee_visa_tax_amount" => $service_fee_visa_tax_amount));
		}
		return $this;
	}

	public function getCardServiceFeeVisaTaxAmount(){
		return $this->services["card"]["service_fee_visa_tax_amount"];
	}

	public function setCardType( $card_types = null ){
		if( is_null($card_types) ){
			throw new \Exception("setCardServiceFeeVisaTaxAmount expects a string which contains the credit card types accepted by this merchant.");
		}else{
			$this->services = array("card" => array("card_types" => $card_types));
		}
		return $this;
	}

	public function getCardType(){
		return $this->services["card"]["card_types"];
	}

	public function setCardAccountUpdater( $account_updater = null ){
		if( is_null($account_updater) ){
			throw new \Exception("setCardAccountUpdater expects a string which contains a flag indicating whether or not the Account Updater subscription is enabled for this location.");
		}else{
			$this->services = array("card" => array("account_updater" => $account_updater));
		}
		return $this;
	}

	public function getCardAccountUpdater(){
		return $this->services["card"]["account_updater"];
	}

	public function setCardGateway( $gateway = null ){
		if( is_null($gateway) ){
			throw new \Exception("setCardGateway expects a string which indicates whether or not the location is processing credit card transactions using a gateway in which transactions are processed through a different Service Provider.");
		}else{
			$this->services = array("card" => array("gateway" => $gateway));
		}
		return $this;
	}

	public function getCardGateway(){
		return $this->services["card"]["gateway"];
	}

	public function setCardPlatform( $platform = null ){
		if( is_null($platform) ){
			throw new \Exception("setCardPlatform expects a string which contains the credit card transaction processor.");
		}else{
			$this->services = array("card" => array("platform" => $platform));
		}
		return $this;
	}

	public function getCardPlatform(){
		return $this->services["card"]["platform"];
	}

	public function setCardBIN( $bin = null ){
		if( is_null($bin) ){
			throw new \Exception("setCardBIN expects a string which contains the merchant's Bank Identification Number (BIN) for credit card processing.");
		}else{
			$this->services = array("card" => array("bin" => $bin));
		}
		return $this;
	}

	public function getCardBIN(){
		return $this->services["card"]["bin"];
	}

	public function setCardTID( $tid = null ){
		if( is_null($tid) ){
			throw new \Exception("setCardTID expects a string which contains the merchant's Terminal Identification (TID) number for credit card processing.");
		}else{
			$this->services = array("card" => array("tid" => $tid));
		}
		return $this;
	}

	public function getCardTID(){
		return $this->services["card"]["tid"];
	}

	public function setCardDailyDebit( $daily_debit = null ){
		if( is_null($daily_debit) ){
			throw new \Exception("setCardDailyDebit expects one parameter which contains daily debit amount.");
		}else{
			$this->services = array("card" => array("daily_debit" => $daily_debit));
		}
		return $this;
	}

	public function getCardDailyDebit(){
		return $this->services["card"]["daily_debit"];
	}

	public function setCardDailyCredit( $daily_credit = null ){
		if( is_null($daily_credit) ){
			throw new \Exception("setCardDailyCredit expects one parameter which contains daily credit amount.");
		}else{
			$this->services = array("card" => array("daily_credit" => $daily_credit));
		}
		return $this;
	}

	public function getCardDailyCredit(){
		return $this->services["card"]["daily_credit"];
	}

	public function setCardMonthlyDebit( $monthly_debit = null ){
		if( is_null($monthly_debit) ){
			throw new \Exception("setCardMonthlyDebit expects one parameter which contains monthly debit amount.");
		}else{
			$this->services = array("card" => array("monthly_debit" => $monthly_debit));
		}
		return $this;
	}

	public function getCardMonthlyDebit(){
		return $this->services["card"]["monthly_debit"];
	}

	public function setCardMonthlyCredit( $monthly_credit = null ){
		if( is_null($monthly_credit) ){
			throw new \Exception("setCardMonthlyCredit expects one parameter which contains monthly credit amount.");
		}else{
			$this->services = array("card" => array("monthly_credit" => $monthly_credit));
		}
		return $this;
	}

	public function getCardMonthlyCredit(){
		return $this->services["card"]["monthly_credit"];
	}

	public function setCardPerTransactionDebit( $per_trans_debit = null ){
		if( is_null($per_trans_debit) ){
			throw new \Exception("setCardPerTransactionDebit expects one parameter which contains per transaction debit amount.");
		}else{
			$this->services = array("card" => array("per_trans_debit" => $per_trans_debit));
		}
		return $this;
	}

	public function getCardPerTransactionDebit(){
		return $this->services["card"]["per_trans_debit"];
	}

	public function setCardPerTransactionCredit( $per_trans_credit = null ){
		if( is_null($per_trans_credit) ){
			throw new \Exception("setCardPerTransactionCredit expects one parameter which contains per transaction credit amount.");
		}else{
			$this->services = array("card" => array("per_trans_credit" => $per_trans_credit));
		}
		return $this;
	}

	public function getCardPerTransactionCredit(){
		return $this->services["card"]["per_trans_credit"];
	}

	public function setEcheckDailyDebit( $daily_debit = null ){
		if( is_null($daily_debit) ){
			throw new \Exception("setEcheckDailyDebit expects one parameter which contains daily debit amount.");
		}else{
			$this->services = array("echeck" => array("daily_debit" => $daily_debit));
		}
		return $this;
	}

	public function getEcheckDailyDebit(){
		return $this->services["echeck"]["daily_debit"];
	}

	public function setEcheckDailyCredit( $daily_credit = null ){
		if( is_null($daily_credit) ){
			throw new \Exception("setEcheckDailyCredit expects one parameter which contains daily credit amount.");
		}else{
			$this->services = array("echeck" => array("daily_credit" => $daily_credit));
		}
		return $this;
	}

	public function getEcheckDailyCredit(){
		return $this->services["echeck"]["daily_credit"];
	}

	public function setEcheckMonthlyDebit( $monthly_debit = null ){
		if( is_null($monthly_debit) ){
			throw new \Exception("setEcheckMonthlyDebit expects one parameter which contains monthly debit amount.");
		}else{
			$this->services = array("echeck" => array("monthly_debit" => $monthly_debit));
		}
		return $this;
	}

	public function getEcheckMonthlyDebit(){
		return $this->services["echeck"]["monthly_debit"];
	}

	public function setecheckMonthlyCredit( $monthly_credit = null ){
		if( is_null($monthly_credit) ){
			throw new \Exception("setEcheckMonthlyCredit expects one parameter which contains monthly credit amount.");
		}else{
			$this->services = array("echeck" => array("monthly_credit" => $monthly_credit));
		}
		return $this;
	}

	public function getEcheckMonthlyCredit(){
		return $this->services["echeck"]["monthly_credit"];
	}

	public function setEcheckPerTransactionDebit( $per_trans_debit = null ){
		if( is_null($per_trans_debit) ){
			throw new \Exception("setEcheckPerTransactionDebit expects one parameter which contains per transaction debit amount.");
		}else{
			$this->services = array("echeck" => array("per_trans_debit" => $per_trans_debit));
		}
		return $this;
	}

	public function getEcheckPerTransactionDebit(){
		return $this->services["echeck"]["per_trans_debit"];
	}

	public function setEcheckPerTransactionCredit( $per_trans_credit = null ){
		if( is_null($per_trans_credit) ){
			throw new \Exception("setEcheckPerTransactionCredit expects one parameter which contains per transaction credit amount.");
		}else{
			$this->services = array("echeck" => array("per_trans_credit" => $per_trans_credit));
		}
		return $this;
	}

	public function getEcheckPerTransactionCredit(){
		return $this->services["echeck"]["per_trans_credit"];
	}

	public function setBankAccountCreditToken( $bankaccount_credits_token = null ){
		if( is_null($bankaccount_credits_token) ){
			throw new \Exception("setBankAccountCreditToken expects a string which contains the token of the bank account that handles the merchant's credit transactions (e.g., refunds, payroll, chargebacks, reversals, etc.)");
		}else{
			if ( strpos($bankaccount_credits_token, 'bac_') !== 0 ) {
				$bankaccount_credits_token = "bac_".$bankaccount_credits_token;
			}
			$this->bankaccount_credits_token = $bankaccount_credits_token;
		}
		return $this;
	}

	public function getBankAccountCreditToken(){
		return $this->bankaccount_credits_token;
	}

	public function setBankAccountDebitToken( $bankaccount_debits_token = null ){
		if( is_null($bankaccount_debits_token) ){
			throw new \Exception("setBankAccountDebitToken expects a string which contains the token of the bank account that handles the merchant's debit transactions (e.g., sales, chargeback wins, etc.)");
		}else{
			if ( strpos($bankaccount_debits_token, 'bac_') !== 0 ) {
				$bankaccount_debits_token = "bac_".$bankaccount_debits_token;
			}
			$this->bankaccount_debits_token = $bankaccount_debits_token;
		}
		return $this;
	}

	public function getBankAccountDebitToken(){
		return $this->bankaccount_debits_token;
	}

	public function setBankAccountBillingToken( $bankaccount_billing_token = null ){
		if( is_null($bankaccount_billing_token) ){
			throw new \Exception("setBankAccountBillingToken expects a string which contains the token of the bank account that pays the merchant's billing obligations to Forte or the Reseller.");
		}else{
			if ( strpos($bankaccount_billing_token, 'bac_') !== 0 ) {
				$bankaccount_billing_token = "bac_".$bankaccount_billing_token;
			}
			$this->bankaccount_billing_token = $bankaccount_billing_token;
		}
		return $this;
	}

	public function getBankAccountBillingToken(){
		return $this->bankaccount_billing_token;
	}

	public function setBankAccountCcfeeToken( $bankaccount_ccfee_token = null ){
		if( is_null($bankaccount_ccfee_token) ){
			throw new \Exception("setBankAccountCcfeeToken expects a string which contains the token of the bank account that collects the convenience fee debits for each of the merchant's credit card sale transactions.");
		}else{
			if ( strpos($bankaccount_ccfee_token, 'bac_') !== 0 ) {
				$bankaccount_ccfee_token = "bac_".$bankaccount_ccfee_token;
			}
			$this->bankaccount_ccfee_token = $bankaccount_ccfee_token;
		}
		return $this;
	}

	public function getBankAccountCcfeeToken(){
		return $this->bankaccount_ccfee_token;
	}

	public function setBankAccountEcfeeToken( $bankaccount_ecfee_token = null ){
		if( is_null($bankaccount_ecfee_token) ){
			throw new \Exception("setBankAccountEcfeeToken expects a string which contains the token of the bank account that collects the convenience fee debits for each of the merchant's echeck sale transactions.");
		}else{
			if ( strpos($bankaccount_ecfee_token, 'bac_') !== 0 ) {
				$bankaccount_ecfee_token = "bac_".$bankaccount_ecfee_token;
			}
			$this->bankaccount_ecfee_token = $bankaccount_ecfee_token;
		}
		return $this;
	}

	public function getBankAccountEcfeeToken(){
		return $this->bankaccount_ecfee_token;
	}

	public function getLocations( $org_id = null, $restCall = null ){
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}

		$url = "/organizations/".$org_id."/locations";

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

	public function getLocationById( $loc_id = null, $org_id = null, $restCall = null ){
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}

		if( is_null( $loc_id ) ){
			$loc_id = "loc_".$config['loc_id'];
		}else if ( strpos($loc_id, 'loc_') !== 0 ) {
			$loc_id = "loc_".$loc_id;
		}

		$url = "/organizations/".$org_id."/locations/".$loc_id;

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

	public function assignBankAccount( $loc_id = null, $restCall = null ){
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$org_id = "org_".$config['org_id'];

		if( is_null( $loc_id ) ){
			$loc_id = "loc_".$config['loc_id'];
		}else if ( strpos($loc_id, 'loc_') !== 0 ) {
			$loc_id = "loc_".$loc_id;
		}

		$url = "/organizations/".$org_id."/locations/".$loc_id;

		$json = self::executeCall(
		    $url,
		    "PUT",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		return json_decode($json);
	}

	public function changeProcessingLimits( $org_id = null, $loc_id = null, $restCall = null ){
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}

		if( is_null( $loc_id ) ){
			$loc_id = "loc_".$config['loc_id'];
		}else if ( strpos($loc_id, 'loc_') !== 0 ) {
			$loc_id = "loc_".$loc_id;
		}

		$url = "/organizations/".$org_id."/locations/".$loc_id;

		$json = self::executeCall(
		    $url,
		    "PUT",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		return json_decode($json);
	}

	public function updateLocationAddress( $org_id = null, $loc_id = null, $restCall = null ){
		$payLoad = $this->toJSON();
		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if( is_null( $org_id ) ){
			$org_id = "org_".$config['org_id'];
		}else if ( strpos($org_id, 'org_') !== 0 ) {
			$org_id = "org_".$org_id;
		}

		if( is_null( $loc_id ) ){
			$loc_id = "loc_".$config['loc_id'];
		}else if ( strpos($loc_id, 'loc_') !== 0 ) {
			$loc_id = "loc_".$loc_id;
		}

		$url = "/organizations/".$org_id."/locations/".$loc_id;

		$json = self::executeCall(
		    $url,
		    "PUT",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		return json_decode($json);
	}

}