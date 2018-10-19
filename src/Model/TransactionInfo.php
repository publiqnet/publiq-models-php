<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class TransactionInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'fee' => '['name' => 'fee', 'convertToDate' => false],
        'action' => '['name' => 'action', 'convertToDate' => false],
        'transaction_hash' => '['name' => 'transactionHash', 'convertToDate' => false],
        'time_signed' => '['name' => 'timeSigned', 'convertToDate' => true],
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
          $this->action = Rtt::validate($data->action);
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
