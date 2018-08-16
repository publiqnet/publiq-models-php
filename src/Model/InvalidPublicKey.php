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
    private $publicKey;
    /** 
    * @param string $publicKey
    */ 
    public function setPublicKey(string $publicKey) 
    { 
            $this->publicKey = $publicKey; 
    } 
    public function getPublicKey() 
    {
        return $this->publicKey;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setPublicKey($data->publicKey); 
    } 
    public static function getMemberName(string $camelCaseName)     {

        $memberNames = [
        'public_key' => 'publicKey',
        ];
        return array_search($camelCaseName, $memberNames);    }
} 
