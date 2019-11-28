<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Served implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'storage_order_token' => ['name' => 'storageOrderToken', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $storageOrderToken;
    /** 
    * @param string $storageOrderToken
    */ 
    public function setStorageOrderToken(string $storageOrderToken) 
    { 
       $this->storageOrderToken = $storageOrderToken;
    }
    public function getStorageOrderToken() 
    {
        return $this->storageOrderToken;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setStorageOrderToken($data->storage_order_token); 
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
