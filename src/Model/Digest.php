<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Digest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $base58_hash;
    /**
    * @var mixed 
    */ 
    private $package;
    /** 
    * @param string $base58_hash
    */ 
    public function setBase58_hash(string $base58_hash) 
    { 
            $this->base58_hash = $base58_hash; 
    } 
    public function getBase58_hash() 
    {
        return $this->base58_hash;
    }
    public function getPackage() 
    {
        return $this->package;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setBase58_hash($data->base58_hash); 
          $this->package = Rtt::validate($data->package);
    } 
} 
