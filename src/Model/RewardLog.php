<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class RewardLog implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'to' => ['name' => 'to', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'amount' => ['name' => 'amount', 'convertToDate' => false, 'isEnum' => 'NULL'],
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
    public function getTo() 
    {
        return $this->to;
    }
    public function getAmount() 
    {
        return $this->amount;
    }
    public function validate(\stdClass $data) 
    { 
        $this->amount = new Coin();
        $this->amount -> validate($data-> amount);
        $this->setTo($data->to); 
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
