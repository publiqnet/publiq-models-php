<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Reward implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'amount' => '['name' => 'amount', 'convertToDate' => false],
        'to' => '['name' => 'to', 'convertToDate' => false],
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
    * @param string $to
    */ 
    public function setTo(string $to) 
    { 
       $this->to = $to;
    }
    public function getAmount() 
    {
        return $this->amount;
    }
    public function getTo() 
    {
        return $this->to;
    }
    public function validate(\stdClass $data) 
    { 
        $this->amount = new Coin();
        $this->amount -> validate($data-> amount);
        $this->setTo($data->to); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
