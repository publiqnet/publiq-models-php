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
        'fee' => ['name' => 'fee', 'convertToDate' => false],
        'action' => ['name' => 'action', 'convertToDate' => false],
        'transaction_hash' => ['name' => 'transactionHash', 'convertToDate' => false],
        'sign_time' => ['name' => 'signTime', 'convertToDate' => true],
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
    private $signTime;
    /** 
    * @param string $transactionHash
    */ 
    public function setTransactionHash(string $transactionHash) 
    { 
       $this->transactionHash = $transactionHash;
    }
    /** 
    * @param int $signTime
    */ 
    public function setSignTime(int $signTime) 
    { 
       $this->signTime = $signTime;
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
    public function getSignTime() 
    {
        return $this->signTime;
    }
    public function validate(\stdClass $data) 
    { 
        $this->fee = new Coin();
        $this->fee -> validate($data-> fee);
        $this->setTransactionHash($data->transaction_hash); 
        $this->setSignTime(strtotime($data->sign_time)); 
        $this->action = Rtt::validate($data->action);
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
