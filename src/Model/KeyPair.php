<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class KeyPair implements ValidatorInterface, \JsonSerializable
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
    * @var string
    */ 
    private $public_key;
    /**
    * @var string
    */ 
    private $private_key;
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
    /** 
    * @param string $public_key
    */ 
    public function setPublic_key(string $public_key) 
    { 
            $this->public_key = $public_key; 
    } 
    /** 
    * @param string $private_key
    */ 
    public function setPrivate_key(string $private_key) 
    { 
            $this->private_key = $private_key; 
    } 
    public function getMaster_key() 
    {
        return $this->master_key;
    }
    public function getIndex() 
    {
        return $this->index;
    }
    public function getPublic_key() 
    {
        return $this->public_key;
    }
    public function getPrivate_key() 
    {
        return $this->private_key;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setMaster_key($data->master_key); 
          $this->setIndex($data->index); 
          $this->setPublic_key($data->public_key); 
          $this->setPrivate_key($data->private_key); 
    } 
} 
