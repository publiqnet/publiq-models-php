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
 
    CONST  memberNames = [
        'public_key' => 'publicKey',
        'signature' => 'signature',
        'package' => 'package',
    ];

    /**
    * @var string
    */ 
    private $publicKey;
    /**
    * @var string
    */ 
    private $signature;
    /**
    * @var mixed 
    */ 
    private $package;
    /** 
    * @param string $publicKey
    */ 
    public function setPublicKey(string $publicKey) 
    { 
       $this->publicKey = $publicKey;
    }
    /** 
    * @param string $signature
    */ 
    public function setSignature(string $signature) 
    { 
       $this->signature = $signature;
    }
    public function getPublicKey() 
    {
        return $this->publicKey;
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
        $this->setPublicKey($data->public_key); 
        $this->setSignature($data->signature); 
          $this->package = Rtt::validate($data->package);
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
