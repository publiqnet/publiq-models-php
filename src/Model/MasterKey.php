<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class MasterKey implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $master_key;
    /** 
    * @param string $master_key
    */ 
    public function setMaster_key(string $master_key) 
    { 
            $this->master_key = $master_key; 
    } 
    public function getMaster_key() 
    {
        return $this->master_key;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setMaster_key($data->master_key); 
    } 
} 
