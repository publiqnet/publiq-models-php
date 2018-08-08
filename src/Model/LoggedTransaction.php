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
    /**
    * @var bool
    */ 
    private $applied_reverted;
    /**
    * @var int
    */ 
    private $index;
    /**
    * @var mixed 
    */ 
    private $action;
    /** 
    * @param bool $applied_reverted
    */ 
    public function setApplied_reverted(bool $applied_reverted) 
    { 
            $this->applied_reverted = $applied_reverted; 
    } 
    /** 
    * @param int $index
    */ 
    public function setIndex(int $index) 
    { 
            $this->index = $index; 
    } 
    public function getApplied_reverted() 
    {
        return $this->applied_reverted;
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
          $this->setApplied_reverted($data->applied_reverted); 
          $this->setIndex($data->index); 
          $this->action = Rtt::validate($data->action);
    } 
} 
