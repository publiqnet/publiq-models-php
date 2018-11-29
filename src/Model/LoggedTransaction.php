<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class LoggedTransaction implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'applied_reverted' => ['name' => 'appliedReverted', 'convertToDate' => false, 'isEnum' => ''],
        'index' => ['name' => 'index', 'convertToDate' => false, 'isEnum' => ''],
        'action' => ['name' => 'action', 'convertToDate' => false, 'isEnum' => ''],
    ];

    /**
    * @var bool
    */ 
    private $appliedReverted;
    /**
    * @var int
    */ 
    private $index;
    /**
    * @var mixed 
    */ 
    private $action;
    /** 
    * @param bool $appliedReverted
    */ 
    public function setAppliedReverted(bool $appliedReverted) 
    { 
       $this->appliedReverted = $appliedReverted;
    }
    /** 
    * @param int $index
    */ 
    public function setIndex(int $index) 
    { 
       $this->index = $index;
    }
    /** 
    * @param mixed $action
    */ 
    public function setAction( $action) 
    { 
       $this->action = $action;
    }
    public function getAppliedReverted() 
    {
        return $this->appliedReverted;
    }
    public function getIndex() 
    {
        return $this->index;
    }
    public function getAction() 
    {
        return $this->action;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setAppliedReverted($data->applied_reverted); 
        $this->setIndex($data->index); 
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
