<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class CancelSponsorContentUnit implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'sponsor_address' => ['name' => 'sponsorAddress', 'convertToDate' => false],
        'uri' => ['name' => 'uri', 'convertToDate' => false],
        'transaction_hash' => ['name' => 'transactionHash', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $sponsorAddress;
    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var string
    */ 
    private $transactionHash;
    /** 
    * @param string $sponsorAddress
    */ 
    public function setSponsorAddress(string $sponsorAddress) 
    { 
       $this->sponsorAddress = $sponsorAddress;
    }
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    /** 
    * @param string $transactionHash
    */ 
    public function setTransactionHash(string $transactionHash) 
    { 
       $this->transactionHash = $transactionHash;
    }
    public function getSponsorAddress() 
    {
        return $this->sponsorAddress;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function getTransactionHash() 
    {
        return $this->transactionHash;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setSponsorAddress($data->sponsor_address); 
        $this->setUri($data->uri); 
        $this->setTransactionHash($data->transaction_hash); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        foreach (self::memberNames as $key => $value) {
               if ($value['name'] == $camelCaseName) {
                   $value['key'] = $key;
                   return $value;
               }
       }
       return null;
    }

} 
