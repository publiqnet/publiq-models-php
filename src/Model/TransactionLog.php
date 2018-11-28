<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class TransactionLog implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'fee' => ['name' => 'fee', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'action' => ['name' => 'action', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'transaction_hash' => ['name' => 'transactionHash', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'time_signed' => ['name' => 'timeSigned', 'convertToDate' => true, 'isEnum' => 'NULL'],
    ];

    /**
    * @var Coin
    */ 
    private $fee;
    /**
    * @var mixed 
    */ 
    private $action;
    /**
    * @var string
    */ 
    private $transactionHash;
    /**
    * @var integer
    */ 
    private $timeSigned;
    /** 
    * @param Coin $fee
    */ 
    public function setFee(Coin $fee) 
    { 
       $this->fee = $fee;
    }
    /** 
    * @param mixed $action
    */ 
    public function setAction( $action) 
    { 
       $this->action = $action;
    }
    /** 
    * @param string $transactionHash
    */ 
    public function setTransactionHash(string $transactionHash) 
    { 
       $this->transactionHash = $transactionHash;
    }
    /** 
    * @param int $timeSigned
    */ 
    public function setTimeSigned(int $timeSigned) 
    { 
       $this->timeSigned = $timeSigned;
    }
    public function getFee() 
    {
        return $this->fee;
    }
    public function getAction() 
    {
        return $this->action;
    }
    public function getTransactionHash() 
    {
        return $this->transactionHash;
    }
    public function getTimeSigned() 
    {
        return $this->timeSigned;
    }
    public function validate(\stdClass $data) 
    { 
        $this->fee = new Coin();
        $this->fee -> validate($data-> fee);
        $this->setTransactionHash($data->transaction_hash); 
        $this->setTimeSigned(strtotime($data->time_signed)); 
        $this->setAction(Rtt::validate($data->action)); 
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
