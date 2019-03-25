<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\UpdateType;

class StorageUpdate implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'status' => ['name' => 'status', 'convertToDate' => false],
        'uri' => ['name' => 'uri', 'convertToDate' => false],
        'storage_address' => ['name' => 'storageAddress', 'convertToDate' => false],
    ];

    /**
    * @var string 
    */ 
    private $status;
    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var string
    */ 
    private $storageAddress;
    /** 
    * @param string $status
    */ 
    public function setStatus(string $status) 
    { 
        UpdateType::validate($status);
        $this->status = $status;
    }
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    /** 
    * @param string $storageAddress
    */ 
    public function setStorageAddress(string $storageAddress) 
    { 
       $this->storageAddress = $storageAddress;
    }
    public function getStatus() 
    {
        return $this->status;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function getStorageAddress() 
    {
        return $this->storageAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUri($data->uri); 
        $this->setStorageAddress($data->storage_address); 
        $this->setStatus($data->status); 
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
