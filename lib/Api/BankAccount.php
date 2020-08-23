<?php

namespace Shoukhin\Forte\Api;

use Shoukhin\Forte\Core\ForteConfigManager;
use Shoukhin\Forte\Common\ForteModel;
use Shoukhin\Forte\Common\ForteResourceModel;
use Shoukhin\Forte\Transport\ForteRestCall;

Class BankAccount extends ForteResourceModel{

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

	public function setRoutingNumber( $routing_number = null ){

		if( is_null($routing_number) ){

			throw new \Exception("set_routing_number expects one string type parameter which contains the bank rounting number.");
		}

		$this->routing_number = $routing_number;

		return $this;

	}

	public function getRoutingNumber(){

		return $this->routing_number;

	}

	public function setAccountNumber( $account_number = null ){

		if( is_null($account_number) ){

			throw new \Exception("set_account_number expects one string type parameter which contains the bank account number.");
		}

		$this->account_number = $account_number;

		return $this;

	}

	public function getAccountNumber(){
		return $this->account_number;
	}

	public function setLast4AccountNumber( $last_4_account_number = null ){

		if( is_null($last_4_account_number) ){

			throw new \Exception("set_last_4_account_number expects one string type parameter which contains the last four digits of the redactied DDA or eCheck account number.");
		}

		$this->last_4_account_number = $last_4_account_number;

		return $this;

	}

	public function getLast4AccountNumber(){
		return $this->last_4_account_number;
	}

	public function setAccountType( $account_type ){
		$this->account_type = $account_type;
		return $this;
	}

	public function getAccountType(){
		return $this->account_type;
	}

	public function setLabel( $label ){
		$this->label = $label;
		return $this;
	}

	public function getLabel(){
		return $this->label;
	}

	public function setBankAccountToken( $bank_account_token ){
		$this->bank_account_token = $bank_account_token;
		return $this;
	}

	public function getBankAccountToken(){
		return $this->bank_account_token;
	}

	public function setStatus( $status ){
		$this->status = $status;
		return $this;
	}

	public function getStatus(){
		return $this->status;
	}

	public function create( $restCall = null ){

		$payLoad = $this->toJSON();

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		$url = "/organizations/org_".$config['org_id']."/bankaccounts/";

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

	public function getBankAccount( $bank_account_token = null, $restCall = null ){

		$payLoad = $this->toJSON();

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if ( !is_null( $bank_account_token ) && strpos($bank_account_token, 'bac_') !== 0) {
		   $bank_account_token = "bac_".$bank_account_token;
		   $url = "/organizations/org_".$config['org_id']."/bankaccounts/".$bank_account_token;
		}else if( !is_null( $bank_account_token ) ){
			$url = "/organizations/org_".$config['org_id']."/bankaccounts/".$bank_account_token;
		}else{
			$url = "/organizations/org_".$config['org_id']."/bankaccounts/";
		}

		$json = self::executeCall(
		    $url,
		    "GET",
		    $payLoad,
		    $headers,
		    $this->authentication,
		    $restCall
		);

		return json_decode($json, true);

	}

	public function delete( $bank_account_token = null, $restCall = null ){

		$payLoad = $this->toJSON();

		$config  = $this->authentication->getConfig();
		$headers = array("X-Forte-Auth-Organization-Id" => "org_".$config['org_id']);

		if ( !is_null( $bank_account_token ) && strpos($bank_account_token, 'bac_') !== 0 ) {
		   $bank_account_token = "bac_".$bank_account_token;
		   $url = "/organizations/org_".$config['org_id']."/bankaccounts/".$bank_account_token;
		}else{
			$url = "/organizations/org_".$config['org_id']."/bankaccounts/".$bank_account_token;
		}

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