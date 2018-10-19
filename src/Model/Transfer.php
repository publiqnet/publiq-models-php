<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Transfer implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'from' => '['name' => 'from', 'convertToDate' => false],
        'to' => '['name' => 'to', 'convertToDate' => false],
        'amount' => '['name' => 'amount', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $from;
    /**
    * @var string
    */ 
    private $to;
    /**
    * @var Coin
    */ 
    private $amount;
    /** 
    * @param string $from
    */ 
    public function setFrom(string $from) 
    { 
       $this->from = $from;
    }
    /** 
    * @param string $to
    */ 
    public function setTo(string $to) 
    { 
       $this->to = $to;
    }
    public function getFrom() 
    {
        return $this->from;
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
        $this->setFrom($data->from); 
        $this->setTo($data->to); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
