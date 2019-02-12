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
        'uri' => ['name' => 'uri', 'convertToDate' => false],
        'storage' => ['name' => 'storage', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var string
    */ 
    private $storage;
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    /** 
    * @param string $storage
    */ 
    public function setStorage(string $storage) 
    { 
       $this->storage = $storage;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function getStorage() 
    {
        return $this->storage;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUri($data->uri); 
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
