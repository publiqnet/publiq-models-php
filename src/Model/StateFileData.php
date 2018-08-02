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
    /**
    * @var array 
    */ 
    private $accounts;
    /**
    * @var string
    */
    private $accountsKey;
    /**
    * @param string  $accountsKey
    */
    public function setaccountsKey(string $accountsKey)
    {
        $this->accountsKey = $accountsKey;
    }
    /**
    * @var int
    */
    private $accountsValue;
    /**
    * @param int $accountsValue
    */
    public function setaccountsValue(int $value)
    {
        $this->accountsValue = $value;
    }
    public function getAccounts() 
    {
        return $this->accounts;
    }
    public function validate(\stdClass $data) 
    { 
        foreach ($data->hash as $key => $value) {
            $this->setaccountsKey($key);
            $this->setaccountsValue($value);
        }
    } 
} 
