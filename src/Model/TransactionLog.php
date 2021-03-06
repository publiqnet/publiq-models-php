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
        'fee' => ['name' => 'fee', 'convertToDate' => false, 'removeIfNull' => false],
        'action' => ['name' => 'action', 'convertToDate' => false, 'removeIfNull' => false],
        'transaction_hash' => ['name' => 'transactionHash', 'convertToDate' => false, 'removeIfNull' => false],
        'transaction_size' => ['name' => 'transactionSize', 'convertToDate' => false, 'removeIfNull' => false],
        'time_signed' => ['name' => 'timeSigned', 'convertToDate' => true, 'removeIfNull' => false],
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
    * @var int
    */ 
    private $transactionSize;
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
    * @param int $transactionSize
    */ 
    public function setTransactionSize(int $transactionSize) 
    { 
       $this->transactionSize = $transactionSize;
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
    public function getTransactionSize() 
    {
        return $this->transactionSize;
    }
    public function getTimeSigned() 
    {
        return $this->timeSigned;
    }
    public function validate(\stdClass $data) 
    { 
        $this->fee = new Coin();
        $this->fee->validate($data->fee);
        $this->setTransactionHash($data->transaction_hash); 
        $this->setTransactionSize($data->transaction_size); 
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
