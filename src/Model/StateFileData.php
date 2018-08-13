<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class StateFileData implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST memberNames = [
        'accounts' => 'accounts',
    ];

    /**
    * @var array
    */ 
    private $accounts = [];
    /**
    * @var string
    */
    private $accountsKey;
    /**
    * @param string  $accountsKey
    */
    public function setaccountsKey(string  $accountsKey)
    {
        $this->accountsKey = $accountsKey;
    }
    public function getAccounts() 
    {
        return $this->accounts;
    }
    public function validate(\stdClass $data) 
    { 
        foreach ($data->accounts as $key => $value) {
            $this->setaccountsKey($key);
            $hashItemObj = new Coin();
            $hashItemObj->validate($value);
            $this->accounts[] = $accountsItemObj         }
    } 
    public function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, $this->$memberNames);
    }
} 
