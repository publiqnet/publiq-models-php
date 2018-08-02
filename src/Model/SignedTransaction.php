<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class SignedTransaction implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var Transaction
    */ 
    private $transaction_details;
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
    public function getTransaction_details() 
    {
        return $this->transaction_details;
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
        $this->transaction_details = new Transaction();
        $this->transaction_details -> validate($data-> transaction_details);
          $this->setAuthority($data->authority); 
          $this->setSignature($data->signature); 
    } 
} 
