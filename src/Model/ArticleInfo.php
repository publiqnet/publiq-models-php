<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class ArticleInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'uri' => ['name' => 'uri', 'convertToDate' => false],
        'author_address' => ['name' => 'authorAddress', 'convertToDate' => false],
        'channel_address' => ['name' => 'channelAddress', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var string
    */ 
    private $authorAddress;
    /**
    * @var string
    */ 
    private $channelAddress;
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
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
    public function getAuthorAddress() 
    {
        return $this->authorAddress;
    }
    public function getChannelAddress() 
    {
        return $this->channelAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUri($data->uri); 
        $this->setAuthorAddress($data->author_address); 
        $this->setChannelAddress($data->channel_address); 
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
