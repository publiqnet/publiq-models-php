<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Content implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'channel_address' => ['name' => 'channelAddress', 'convertToDate' => false],
        'content_id' => ['name' => 'contentId', 'convertToDate' => false],
        'content_unit_uris' => ['name' => 'contentUnitUris', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $channelAddress;
    /**
    * @var int
    */ 
    private $contentId;
    /**
    * @var array
    */ 
    private $contentUnitUris = [];
    /** 
    * @param string $channelAddress
    */ 
    public function setChannelAddress(string $channelAddress) 
    { 
       $this->channelAddress = $channelAddress;
    }
    /** 
    * @param int $contentId
    */ 
    public function setContentId(int $contentId) 
    { 
       $this->contentId = $contentId;
    }
    public function getChannelAddress() 
    {
        return $this->channelAddress;
    }
    public function getContentId() 
    {
        return $this->contentId;
    }
    public function getContentUnitUris() 
    {
        return $this->contentUnitUris;
    }
    /**
    * @param string $contentUnitUrisItem
    */
    public function addContentUnitUris(string $contentUnitUrisItem)
    {
        $this->contentUnitUris[] = $contentUnitUrisItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setChannelAddress($data->channel_address); 
        $this->setContentId($data->content_id); 
          foreach ($data->content_unit_uris as $contentUnitUrisItem) { 
            $this->addContentUnitUris($contentUnitUrisItem);
           } 
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
