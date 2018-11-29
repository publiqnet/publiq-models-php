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
        'private_key' => ['name' => 'privateKey', 'convertToDate' => false, 'isEnum' => ''],
        'package' => ['name' => 'package', 'convertToDate' => false, 'isEnum' => ''],
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
    /** 
    * @param mixed $package
    */ 
    public function setPackage( $package) 
    { 
       $this->package = $package;
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
        $this->setPackage(Rtt::validate($data->package)); 
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
