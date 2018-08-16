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
 
    CONST  memberNames = [
        'public_key' => 'publicKey',
    ];

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
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::$memberNames);
    }
} 
