<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class SignedBlock implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var mixed 
    */ 
    private $block_details;
    /**
    * @var string
    */ 
    private $authority;
    /**
    * @var string
    */ 
    private $signature;
    /** 
    * @param string $authority
    */ 
    public function setAuthority(string $authority) 
    { 
            $this->authority = $authority; 
    } 
    /** 
    * @param string $signature
    */ 
    public function setSignature(string $signature) 
    { 
            $this->signature = $signature; 
    } 
    public function getBlock_details() 
    {
        return $this->block_details;
    }
    public function getAuthority() 
    {
        return $this->authority;
    }
    public function getSignature() 
    {
        return $this->signature;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setAuthority($data->authority); 
          $this->setSignature($data->signature); 
            Rtt::validate($data->block_details);
    } 
} 
