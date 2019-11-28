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
        'file_uri' => ['name' => 'fileUri', 'convertToDate' => false],
        'storage_address' => ['name' => 'storageAddress', 'convertToDate' => false],
    ];

    /**
    * @var string 
    */ 
    private $status;
    /**
    * @var string
    */ 
    private $fileUri;
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
    * @param string $fileUri
    */ 
    public function setFileUri(string $fileUri) 
    { 
       $this->fileUri = $fileUri;
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
    public function getFileUri() 
    {
        return $this->fileUri;
    }
    public function getStorageAddress() 
    {
        return $this->storageAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setFileUri($data->file_uri); 
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
