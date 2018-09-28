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
 
    CONST  memberNames = [
        'creation' => ['name' => 'creation', 'convertToDate' => true],
        'expiry' => ['name' => 'expiry', 'convertToDate' => true],
        'fee' => ['name' => 'fee', 'convertToDate' => false],
        'action' => ['name' => 'action', 'convertToDate' => false],
    ];

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
       $this->creation = $creation;
    }
    /** 
    * @param int $expiry
    */ 
    public function setExpiry(int $expiry) 
    { 
       $this->expiry = $expiry;
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
        $this->setCreation(strtotime($data->creation)); 
        $this->setExpiry(strtotime($data->expiry)); 
        $this->action = Rtt::validate($data->action);
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
