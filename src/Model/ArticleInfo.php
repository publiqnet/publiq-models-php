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
        'author' => ['name' => 'author', 'convertToDate' => false],
        'channel' => ['name' => 'channel', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var string
    */ 
    private $author;
    /**
    * @var string
    */ 
    private $channel;
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
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
    public function getUri() 
    {
        return $this->uri;
    }
    public function getAuthor() 
    {
        return $this->author;
    }
    public function getChannel() 
    {
        return $this->channel;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUri($data->uri); 
        $this->setAuthor($data->author); 
        $this->setChannel($data->channel); 
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
