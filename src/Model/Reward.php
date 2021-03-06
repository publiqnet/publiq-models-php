<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\RewardType;

class Reward implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'to' => ['name' => 'to', 'convertToDate' => false, 'removeIfNull' => false],
        'amount' => ['name' => 'amount', 'convertToDate' => false, 'removeIfNull' => false],
        'reward_type' => ['name' => 'rewardType', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $to;
    /**
    * @var Coin
    */ 
    private $amount;
    /**
    * @var string 
    */ 
    private $rewardType;
    /** 
    * @param string $to
    */ 
    public function setTo(string $to) 
    { 
       $this->to = $to;
    }
    /** 
    * @param Coin $amount
    */ 
    public function setAmount(Coin $amount) 
    { 
       $this->amount = $amount;
    }
    /** 
    * @param string $rewardType
    */ 
    public function setRewardType(string $rewardType) 
    { 
        RewardType::validate($rewardType);
        $this->rewardType = $rewardType;
    }
    public function getTo() 
    {
        return $this->to;
    }
    public function getAmount() 
    {
        return $this->amount;
    }
    public function getRewardType() 
    {
        return $this->rewardType;
    }
    public function validate(\stdClass $data) 
    { 
        $this->amount = new Coin();
        $this->amount->validate($data->amount);
        $this->setTo($data->to); 
        $this->setRewardType($data->reward_type); 
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
