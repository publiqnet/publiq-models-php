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
    * @var Coin
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
        $this->fee = new Coin();
        $this->fee -> validate($data-> fee);
          $this->setCreation($data->creation); 
          $this->setExpiry($data->expiry); 
          $this->action = Rtt::validate($data->action);
    } 
    public static function getMemberName(string $camelCaseName)     {

        $memberNames = [
        'creation' => 'creation',
        'expiry' => 'expiry',
        'fee' => 'fee',
        'action' => 'action',
        ];
        return array_search($camelCaseName, $memberNames);    }
} 
