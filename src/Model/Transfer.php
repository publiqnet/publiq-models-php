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
    /**
    * @var string
    */ 
    private $from;
    /**
    * @var string
    */ 
    private $to;
    /**
    * @var int
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
    /** 
    * @param int $amount
    */ 
    public function setAmount(int $amount) 
    { 
            $this->amount = $amount; 
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
          $this->setFrom($data->from); 
          $this->setTo($data->to); 
          $this->setAmount($data->amount); 
    } 
} 
