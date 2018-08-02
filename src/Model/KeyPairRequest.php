<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class KeyPairRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $master_key;
    /**
    * @var int
    */ 
    private $index;
    /** 
    * @param string $master_key
    */ 
    public function setMaster_key(string $master_key) 
    { 
            $this->master_key = $master_key; 
    } 
    /** 
    * @param int $index
    */ 
    public function setIndex(int $index) 
    { 
            $this->index = $index; 
    } 
    public function getMaster_key() 
    {
        return $this->master_key;
    }
    public function getIndex() 
    {
        return $this->index;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setMaster_key($data->master_key); 
          $this->setIndex($data->index); 
    } 
} 
