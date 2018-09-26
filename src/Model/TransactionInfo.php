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
        'fee' => 'fee',
        'action' => 'action',
        'creation_time' => 'creationTime',
        'transaction_hash' => 'transactionHash',
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
    * @var integer
    */ 
    private $creationTime;
    /**
    * @var string
    */ 
    private $transactionHash;
    /** 
    * @param int $creationTime
    */ 
    public function setCreationTime(int $creationTime) 
    { 
            $this->creationTime = strtotime($creationTime); 
    } 
    /** 
    * @param string $transactionHash
    */ 
    public function setTransactionHash(string $transactionHash) 
    { 
            $this->transactionHash = $transactionHash; 
    } 
    public function getFee() 
    {
        return $this->fee;
    }
    public function getAction() 
    {
        return $this->action;
    }
    public function getCreationTime() 
    {
        return $this->creationTime;
    }
    public function getTransactionHash() 
    {
        return $this->transactionHash;
    }
    public function validate(\stdClass $data) 
    { 
        $this->fee = new Coin();
        $this->fee -> validate($data-> fee);
          $this->setCreationTime($data->creation_time); 
          $this->setTransactionHash($data->transaction_hash); 
          $this->action = Rtt::validate($data->action);
    } 

    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
