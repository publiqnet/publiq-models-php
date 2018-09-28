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
 
    CONST  memberNames = [
        'private_key' => ['name' => 'privateKey', 'convertToDate' => false],
        'package' => ['name' => 'package', 'convertToDate' => false],
    ];

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
        $this->setPrivateKey($data->private_key); 
        $this->package = Rtt::validate($data->package);
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
