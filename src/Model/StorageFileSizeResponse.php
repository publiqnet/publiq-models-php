<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class StorageFileSizeResponse implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'uri' => ['name' => 'uri', 'convertToDate' => false],
        'size' => ['name' => 'size', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var int
    */ 
    private $size;
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    /** 
    * @param int $size
    */ 
    public function setSize(int $size) 
    { 
       $this->size = $size;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function getSize() 
    {
        return $this->size;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUri($data->uri); 
        $this->setSize($data->size); 
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
