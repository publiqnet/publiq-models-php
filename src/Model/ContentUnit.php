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
        'uri' => ['name' => 'uri', 'convertToDate' => false, 'removeIfNull' => false],
        'content_id' => ['name' => 'contentId', 'convertToDate' => false, 'removeIfNull' => false],
        'author_addresses' => ['name' => 'authorAddresses', 'convertToDate' => false, 'removeIfNull' => false],
        'channel_address' => ['name' => 'channelAddress', 'convertToDate' => false, 'removeIfNull' => false],
        'file_uris' => ['name' => 'fileUris', 'convertToDate' => false, 'removeIfNull' => false],
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
    * @var array
    */ 
    private $authorAddresses = [];
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
    public function getAuthorAddresses() 
    {
        return $this->authorAddresses;
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
    * @param string $authorAddressesItem
    */
    public function addAuthorAddresses(string $authorAddressesItem)
    {
        $this->authorAddresses[] = $authorAddressesItem;
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
        $this->setChannelAddress($data->channel_address); 
          foreach ($data->author_addresses as $authorAddressesItem) { 
            $this->addAuthorAddresses($authorAddressesItem);
           } 
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
