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
        'author' => ['name' => 'author', 'convertToDate' => false],
        'content' => ['name' => 'content', 'convertToDate' => false],
        'channel' => ['name' => 'channel', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $author;
    /**
    * @var string
    */ 
    private $content;
    /**
    * @var string
    */ 
    private $channel;
    /** 
    * @param string $author
    */ 
    public function setAuthor(string $author) 
    { 
       $this->author = $author;
    }
    /** 
    * @param string $content
    */ 
    public function setContent(string $content) 
    { 
       $this->content = $content;
    }
    /** 
    * @param string $channel
    */ 
    public function setChannel(string $channel) 
    { 
       $this->channel = $channel;
    }
    public function getAuthor() 
    {
        return $this->author;
    }
    public function getContent() 
    {
        return $this->content;
    }
    public function getChannel() 
    {
        return $this->channel;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setAuthor($data->author); 
        $this->setContent($data->content); 
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
