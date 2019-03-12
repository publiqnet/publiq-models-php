<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\InfoType;

class ContentInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'status' => ['name' => 'status', 'convertToDate' => false],
        'content_id' => ['name' => 'contentId', 'convertToDate' => false],
        'channel_address' => ['name' => 'channelAddress', 'convertToDate' => false],
        'storage_address' => ['name' => 'storageAddress', 'convertToDate' => false],
    ];

    /**
    * @var string 
    */ 
    private $status;
    /**
    * @var int
    */ 
    private $contentId;
    /**
    * @var string
    */ 
    private $channelAddress;
    /**
    * @var string
    */ 
    private $storageAddress;
    /** 
    * @param string $status
    */ 
    public function setStatus(string $status) 
    { 
        InfoType::validate($status);
        $this->status = $status;
    }
    /** 
    * @param int $contentId
    */ 
    public function setContentId(int $contentId) 
    { 
       $this->contentId = $contentId;
    }
    /** 
    * @param string $channelAddress
    */ 
    public function setChannelAddress(string $channelAddress) 
    { 
       $this->channelAddress = $channelAddress;
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
    public function getContentId() 
    {
        return $this->contentId;
    }
    public function getChannelAddress() 
    {
        return $this->channelAddress;
    }
    public function getStorageAddress() 
    {
        return $this->storageAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setContentId($data->content_id); 
        $this->setChannelAddress($data->channel_address); 
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
