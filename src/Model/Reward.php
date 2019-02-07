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
        'amount' => ['name' => 'amount', 'convertToDate' => false],
        'to' => ['name' => 'to', 'convertToDate' => false],
        'reward_type' => ['name' => 'rewardType', 'convertToDate' => false],
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
    private $rewardType;
    /** 
    * @param Coin $amount
    */ 
    public function setAmount(Coin $amount) 
    { 
       $this->amount = $amount;
    }
    /** 
    * @param string $to
    */ 
    public function setTo(string $to) 
    { 
       $this->to = $to;
    }
    /** 
    * @param string $rewardType
    */ 
    public function setRewardType(string $rewardType) 
    { 
       $this->rewardType = $rewardType;
    }
    public function getAmount() 
    {
        return $this->amount;
    }
    public function getTo() 
    {
        return $this->to;
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
        $this->setRewardType(RewardType::validate($data->reward_type)); 
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
