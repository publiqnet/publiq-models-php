<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Signature implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $public_key;
    /**
    * @var string
    */ 
    private $signature;
    /**
    * @var mixed 
    */ 
    private $package;
    /** 
    * @param string $public_key
    */ 
    public function setPublic_key(string $public_key) 
    { 
            $this->public_key = $public_key; 
    } 
    /** 
    * @param string $signature
    */ 
    public function setSignature(string $signature) 
    { 
            $this->signature = $signature; 
    } 
    public function getPublic_key() 
    {
        return $this->public_key;
    }
    public function getSignature() 
    {
        return $this->signature;
    }
    public function getPackage() 
    {
        return $this->package;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setPublic_key($data->public_key); 
          $this->setSignature($data->signature); 
            Rtt::validate($data->package);
    } 
} 
