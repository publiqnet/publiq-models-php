<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class ContentUnit implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'uri' => ['name' => 'uri', 'convertToDate' => false],
        'content_id' => ['name' => 'contentId', 'convertToDate' => false],
        'author_address' => ['name' => 'authorAddress', 'convertToDate' => false],
        'channel_address' => ['name' => 'channelAddress', 'convertToDate' => false],
        'file_uris' => ['name' => 'fileUris', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var int
    */ 
    private $contentId;
    /**
    * @var string
    */ 
    private $authorAddress;
    /**
    * @var string
    */ 
    private $channelAddress;
    /**
    * @var array
    */ 
    private $fileUris = [];
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    /** 
    * @param int $contentId
    */ 
    public function setContentId(int $contentId) 
    { 
       $this->contentId = $contentId;
    }
    /** 
    * @param string $authorAddress
    */ 
    public function setAuthorAddress(string $authorAddress) 
    { 
       $this->authorAddress = $authorAddress;
    }
    /** 
    * @param string $channelAddress
    */ 
    public function setChannelAddress(string $channelAddress) 
    { 
       $this->channelAddress = $channelAddress;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function getContentId() 
    {
        return $this->contentId;
    }
    public function getAuthorAddress() 
    {
        return $this->authorAddress;
    }
    public function getChannelAddress() 
    {
        return $this->channelAddress;
    }
    public function getFileUris() 
    {
        return $this->fileUris;
    }
    /**
    * @param string $fileUrisItem
    */
    public function addFileUris(string $fileUrisItem)
    {
        $this->fileUris[] = $fileUrisItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUri($data->uri); 
        $this->setContentId($data->content_id); 
        $this->setAuthorAddress($data->author_address); 
        $this->setChannelAddress($data->channel_address); 
          foreach ($data->file_uris as $fileUrisItem) { 
            $this->addFileUris($fileUrisItem);
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
