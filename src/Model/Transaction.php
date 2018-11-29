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
        'creation' => ['name' => 'creation', 'convertToDate' => true, 'isEnum' => ''],
        'expiry' => ['name' => 'expiry', 'convertToDate' => true, 'isEnum' => ''],
        'fee' => ['name' => 'fee', 'convertToDate' => false, 'isEnum' => ''],
        'action' => ['name' => 'action', 'convertToDate' => false, 'isEnum' => ''],
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
    /** 
    * @param Coin $fee
    */ 
    public function setFee(Coin $fee) 
    { 
       $this->fee = $fee;
    }
    /** 
    * @param mixed $action
    */ 
    public function setAction( $action) 
    { 
       $this->action = $action;
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
        $this->setAction(Rtt::validate($data->action)); 
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
