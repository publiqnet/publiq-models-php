<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class AddressInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'owner' => ['name' => 'owner', 'convertToDate' => false],
        'public_address' => ['name' => 'publicAddress', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $owner;
    /**
    * @var string
    */ 
    private $publicAddress;
    /** 
    * @param string $owner
    */ 
    public function setOwner(string $owner) 
    { 
       $this->owner = $owner;
    }
    /** 
    * @param string $publicAddress
    */ 
    public function setPublicAddress(string $publicAddress) 
    { 
       $this->publicAddress = $publicAddress;
    }
    public function getOwner() 
    {
        return $this->owner;
    }
    public function getPublicAddress() 
    {
        return $this->publicAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setOwner($data->owner); 
        $this->setPublicAddress($data->public_address); 
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
