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
    /**
    * @var int
    */ 
    private $amount;
    /**
    * @var string
    */ 
    private $to;
    /** 
    * @param int $amount
    */ 
    public function setAmount(int $amount) 
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
          $this->setAmount($data->amount); 
          $this->setTo($data->to); 
    } 
} 
