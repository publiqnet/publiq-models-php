<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class StorageFileRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'uri' => ['name' => 'uri', 'convertToDate' => false, 'removeIfNull' => false],
        'storage_order_token' => ['name' => 'storageOrderToken', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var string
    */ 
    private $storageOrderToken;
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    /** 
    * @param string $storageOrderToken
    */ 
    public function setStorageOrderToken(string $storageOrderToken) 
    { 
       $this->storageOrderToken = $storageOrderToken;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function getStorageOrderToken() 
    {
        return $this->storageOrderToken;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUri($data->uri); 
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
