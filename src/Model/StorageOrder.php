<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class StorageOrder implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'storage_address' => ['name' => 'storageAddress', 'convertToDate' => false],
        'file_uri' => ['name' => 'fileUri', 'convertToDate' => false],
        'content_unit_uri' => ['name' => 'contentUnitUri', 'convertToDate' => false],
        'session_id' => ['name' => 'sessionId', 'convertToDate' => false],
        'seconds' => ['name' => 'seconds', 'convertToDate' => false],
        'time_point' => ['name' => 'timePoint', 'convertToDate' => true],
    ];

    /**
    * @var string
    */ 
    private $storageAddress;
    /**
    * @var string
    */ 
    private $fileUri;
    /**
    * @var string
    */ 
    private $contentUnitUri;
    /**
    * @var string
    */ 
    private $sessionId;
    /**
    * @var int
    */ 
    private $seconds;
    /**
    * @var integer
    */ 
    private $timePoint;
    /** 
    * @param string $storageAddress
    */ 
    public function setStorageAddress(string $storageAddress) 
    { 
       $this->storageAddress = $storageAddress;
    }
    /** 
    * @param string $fileUri
    */ 
    public function setFileUri(string $fileUri) 
    { 
       $this->fileUri = $fileUri;
    }
    /** 
    * @param string $contentUnitUri
    */ 
    public function setContentUnitUri(string $contentUnitUri) 
    { 
       $this->contentUnitUri = $contentUnitUri;
    }
    /** 
    * @param string $sessionId
    */ 
    public function setSessionId(string $sessionId) 
    { 
       $this->sessionId = $sessionId;
    }
    /** 
    * @param int $seconds
    */ 
    public function setSeconds(int $seconds) 
    { 
       $this->seconds = $seconds;
    }
    /** 
    * @param int $timePoint
    */ 
    public function setTimePoint(int $timePoint) 
    { 
       $this->timePoint = $timePoint;
    }
    public function getStorageAddress() 
    {
        return $this->storageAddress;
    }
    public function getFileUri() 
    {
        return $this->fileUri;
    }
    public function getContentUnitUri() 
    {
        return $this->contentUnitUri;
    }
    public function getSessionId() 
    {
        return $this->sessionId;
    }
    public function getSeconds() 
    {
        return $this->seconds;
    }
    public function getTimePoint() 
    {
        return $this->timePoint;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setStorageAddress($data->storage_address); 
        $this->setFileUri($data->file_uri); 
        $this->setContentUnitUri($data->content_unit_uri); 
        $this->setSessionId($data->session_id); 
        $this->setSeconds($data->seconds); 
        $this->setTimePoint(strtotime($data->time_point)); 
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
