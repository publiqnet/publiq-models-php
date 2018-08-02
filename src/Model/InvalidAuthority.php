<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class InvalidAuthority implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $authority_provided;
    /**
    * @var string
    */ 
    private $authority_required;
    /** 
    * @param string $authority_provided
    */ 
    public function setAuthority_provided(string $authority_provided) 
    { 
            $this->authority_provided = $authority_provided; 
    } 
    /** 
    * @param string $authority_required
    */ 
    public function setAuthority_required(string $authority_required) 
    { 
            $this->authority_required = $authority_required; 
    } 
    public function getAuthority_provided() 
    {
        return $this->authority_provided;
    }
    public function getAuthority_required() 
    {
        return $this->authority_required;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setAuthority_provided($data->authority_provided); 
          $this->setAuthority_required($data->authority_required); 
    } 
} 
