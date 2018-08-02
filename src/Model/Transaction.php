<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Transaction implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var integer
    */ 
    private $creation;
    /**
    * @var integer
    */ 
    private $expiry;
    /**
    * @var int
    */ 
    private $fee;
    /**
    * @var mixed 
    */ 
    private $action;
    /** 
    * @param int $creation
    */ 
    public function setCreation(int $creation) 
    { 
            $this->creation = strtotime($creation); 
    } 
    /** 
    * @param int $expiry
    */ 
    public function setExpiry(int $expiry) 
    { 
            $this->expiry = strtotime($expiry); 
    } 
    /** 
    * @param int $fee
    */ 
    public function setFee(int $fee) 
    { 
            $this->fee = $fee; 
    } 
    public function getCreation() 
    {
        return $this->creation;
    }
    public function getExpiry() 
    {
        return $this->expiry;
    }
    public function getFee() 
    {
        return $this->fee;
    }
    public function getAction() 
    {
        return $this->action;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setCreation($data->creation); 
          $this->setExpiry($data->expiry); 
          $this->setFee($data->fee); 
            Rtt::validate($data->action);
    } 
} 
