<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class RewardInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'amount' => 'amount',
        'to' => 'to',
        'block_hash' => 'blockHash',
    ];

    /**
    * @var Coin
    */ 
    private $amount;
    /**
    * @var string
    */ 
    private $to;
    /**
    * @var string
    */ 
    private $blockHash;
    /** 
    * @param string $to
    */ 
    public function setTo(string $to) 
    { 
       $this->to = $to;
    }
    /** 
    * @param string $blockHash
    */ 
    public function setBlockHash(string $blockHash) 
    { 
       $this->blockHash = $blockHash;
    }
    public function getAmount() 
    {
        return $this->amount;
    }
    public function getTo() 
    {
        return $this->to;
    }
    public function getBlockHash() 
    {
        return $this->blockHash;
    }
    public function validate(\stdClass $data) 
    { 
        $this->amount = new Coin();
        $this->amount -> validate($data-> amount);
        $this->setTo($data->to); 
        $this->setBlockHash($data->block_hash); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
