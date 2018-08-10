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
    private $transactionDetails;
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
    public function getTransactionDetails() 
    {
        return $this->transactionDetails;
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
        $this->transactionDetails = new Transaction();
        $this->transactionDetails -> validate($data-> transactionDetails);
          $this->setAuthority($data->authority); 
          $this->setSignature($data->signature); 
    } 
} 
