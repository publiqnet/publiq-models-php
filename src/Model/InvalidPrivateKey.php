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
 
    CONST memberNames = [
        'private_key' => 'privateKey',
    ];

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
    public function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, $this->$memberNames);
    }
} 
