<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Authority implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'address' => ['name' => 'address', 'convertToDate' => false, 'removeIfNull' => false],
        'signature' => ['name' => 'signature', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $address;
    /**
    * @var string
    */ 
    private $signature;
    /** 
    * @param string $address
    */ 
    public function setAddress(string $address) 
    { 
       $this->address = $address;
    }
    /** 
    * @param string $signature
    */ 
    public function setSignature(string $signature) 
    { 
       $this->signature = $signature;
    }
    public function getAddress() 
    {
        return $this->address;
    }
    public function getSignature() 
    {
        return $this->signature;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setAddress($data->address); 
        $this->setSignature($data->signature); 
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
