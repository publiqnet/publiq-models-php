<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class InvalidPublicKey implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $public_key;
    /** 
    * @param string $public_key
    */ 
    public function setPublic_key(string $public_key) 
    { 
            $this->public_key = $public_key; 
    } 
    public function getPublic_key() 
    {
        return $this->public_key;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setPublic_key($data->public_key); 
    } 
} 
