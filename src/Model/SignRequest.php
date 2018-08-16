<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class SignRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $privateKey;
    /**
    * @var mixed 
    */ 
    private $package;
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
    public function getPackage() 
    {
        return $this->package;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setPrivateKey($data->privateKey); 
          $this->package = Rtt::validate($data->package);
    } 
    public static function getMemberName(string $camelCaseName)     {

        $memberNames = [
        'private_key' => 'privateKey',
        'package' => 'package',
        ];
        return array_search($camelCaseName, $memberNames);    }
} 
