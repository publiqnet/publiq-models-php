<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class SignRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $private_key;
    /**
    * @var mixed 
    */ 
    private $package;
    /** 
    * @param string $private_key
    */ 
    public function setPrivate_key(string $private_key) 
    { 
            $this->private_key = $private_key; 
    } 
    public function getPrivate_key() 
    {
        return $this->private_key;
    }
    public function getPackage() 
    {
        return $this->package;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setPrivate_key($data->private_key); 
          $this->package = Rtt::validate($data->package);
    } 
} 
