<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class SponsorContentUnitApplied implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'amount' => ['name' => 'amount', 'convertToDate' => false, 'removeIfNull' => false],
        'transaction_hash' => ['name' => 'transactionHash', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var Coin
    */ 
    private $amount;
    /**
    * @var string
    */ 
    private $transactionHash;
    /** 
    * @param Coin $amount
    */ 
    public function setAmount(Coin $amount) 
    { 
       $this->amount = $amount;
    }
    /** 
    * @param string $transactionHash
    */ 
    public function setTransactionHash(string $transactionHash) 
    { 
       $this->transactionHash = $transactionHash;
    }
    public function getAmount() 
    {
        return $this->amount;
    }
    public function getTransactionHash() 
    {
        return $this->transactionHash;
    }
    public function validate(\stdClass $data) 
    { 
        $this->amount = new Coin();
        $this->amount->validate($data->amount);
        $this->setTransactionHash($data->transaction_hash); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        foreach (self::memberNames as $key => $value) {
               if ($value['name'] == $camelCaseName) {
                   $value['key'] = $key;
                   return $value;
               }
       }
       return null;
    }

} 
