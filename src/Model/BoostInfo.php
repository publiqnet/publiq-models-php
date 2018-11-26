<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class BoostInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'author' => ['name' => 'author', 'convertToDate' => false],
        'channel' => ['name' => 'channel', 'convertToDate' => false],
        'content_hash' => ['name' => 'contentHash', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $author;
    /**
    * @var string
    */ 
    private $channel;
    /**
    * @var string
    */ 
    private $contentHash;
    /** 
    * @param string $author
    */ 
    public function setAuthor(string $author) 
    { 
       $this->author = $author;
    }
    /** 
    * @param string $channel
    */ 
    public function setChannel(string $channel) 
    { 
       $this->channel = $channel;
    }
    /** 
    * @param string $contentHash
    */ 
    public function setContentHash(string $contentHash) 
    { 
       $this->contentHash = $contentHash;
    }
    public function getAuthor() 
    {
        return $this->author;
    }
    public function getChannel() 
    {
        return $this->channel;
    }
    public function getContentHash() 
    {
        return $this->contentHash;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setAuthor($data->author); 
        $this->setChannel($data->channel); 
        $this->setContentHash($data->content_hash); 
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
