<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class InvalidPrivateKey implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $privateKey;
    /** 
    * @param string $privateKey
    */ 
    public function setPrivateKey(string $privateKey) 
    { 
            $this->privateKey = $privateKey; 
    } 
    public function getPrivateKey() 
    {
        return $this->privateKey;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setPrivateKey($data->privateKey); 
    } 
    public static function getMemberName(string $camelCaseName)     {

        $memberNames = [
        'private_key' => 'privateKey',
        ];
        return array_search($camelCaseName, $memberNames);    }
} 
