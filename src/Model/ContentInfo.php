<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class ContentInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'content' => ['name' => 'content', 'convertToDate' => false],
        'storage' => ['name' => 'storage', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $content;
    /**
    * @var string
    */ 
    private $storage;
    /** 
    * @param string $content
    */ 
    public function setContent(string $content) 
    { 
       $this->content = $content;
    }
    /** 
    * @param string $storage
    */ 
    public function setStorage(string $storage) 
    { 
       $this->storage = $storage;
    }
    public function getContent() 
    {
        return $this->content;
    }
    public function getStorage() 
    {
        return $this->storage;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setContent($data->content); 
        $this->setStorage($data->storage); 
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
