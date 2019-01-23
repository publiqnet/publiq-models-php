<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Digest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'base58_hash' => ['name' => 'base58Hash', 'convertToDate' => false],
        'package' => ['name' => 'package', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $base58Hash;
    /**
    * @var mixed 
    */ 
    private $package;
    /** 
    * @param string $base58Hash
    */ 
    public function setBase58Hash(string $base58Hash) 
    { 
       $this->base58Hash = $base58Hash;
    }
    /** 
    * @param mixed $package
    */ 
    public function setPackage( $package) 
    { 
       $this->package = $package;
    }
    public function getBase58Hash() 
    {
        return $this->base58Hash;
    }
    public function getPackage() 
    {
        return $this->package;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setBase58Hash($data->base58_hash); 
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
