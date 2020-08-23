<?php 

namespace Shoukhin\Forte;
use Shoukhin\Forte\Api\Address;
use Shoukhin\Forte\Api\Application;
use Shoukhin\Forte\Api\Authentication;
use Shoukhin\Forte\Api\BankAccount;
use Shoukhin\Forte\Api\Customer;
use Shoukhin\Forte\Api\Disputes;
use Shoukhin\Forte\Api\Fundings;
use Shoukhin\Forte\Api\Location;
use Shoukhin\Forte\Api\Paymethod;
use Shoukhin\Forte\Api\Scheduleitems;
use Shoukhin\Forte\Api\Schedules;
use Shoukhin\Forte\Api\Settlements;
use Shoukhin\Forte\Api\Transactions;

class Forte{

    private $authentication;
    
    function __construct()
    {
        $access_id = config('forte.access_id');
        $secret_id = config('forte.secret_id');
        $this->authentication = new Authentication( $access_id, $secret_id );

        $this->authentication->set_config(
                array(
                    "mode"   => config('forte.mode'),
                    "org_id" => config('forte.org_id'),
                    "loc_id" => config('forte.loc_id')
                )
        );
    }

    function __call($method, $args)
    {
        $arguments = array_merge([$method], $args);
        return call_user_func_array([$this, 'api'], $arguments);
    }


    public function api()
    {
        $args = func_get_args();
        $api  = '';
        if (count($args)>0) {
            $api = array_shift($args);
        }

        if (count($args)==0) {
            $args = null;
        }

        $api = strtolower($api);

        /*echo "<pre>";
        var_dump($api);
        exit();*/

        switch ($api) {
            case 'addresses':
            case 'address':
                return new Address($this->authentication);
            case 'applications':
            case 'application':
                return new Application($this->authentication);
            case 'bankaccounts':
            case 'bankaccount':
                return new BankAccount($this->authentication);
            case 'customers':
            case 'customer':
                return new Customer($this->authentication);
            case 'disputes':
            case 'dispute':
                return new Disputes($this->authentication);
            case 'fundings':
            case 'funding':
                return new Fundings($this->authentication);
            case 'locations':
            case 'location':
                return new Location($this->authentication);
            case 'paymethods':
            case 'paymethod':
                return new Paymethod($this->authentication);
            case 'scheduleitems':
            case 'scheduleitem':
                return new Scheduleitems($this->authentication);
            case 'schedules':
            case 'schedule':
                return new Schedules($this->authentication);
            case 'settlements':
            case 'settlement':
                return new Settlements($this->authentication);
            case 'transactions':
            case 'transaction':
                return new Transactions($this->authentication);
        }
    }
}