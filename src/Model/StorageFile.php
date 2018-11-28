<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class StorageFile implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'mime_type' => ['name' => 'mimeType', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'data' => ['name' => 'data', 'convertToDate' => false, 'isEnum' => 'NULL'],
    ];

    /**
    * @var string
    */ 
    private $mimeType;
    /**
    * @var string
    */ 
    private $data;
    /** 
    * @param string $mimeType
    */ 
    public function setMimeType(string $mimeType) 
    { 
       $this->mimeType = $mimeType;
    }
    /** 
    * @param string $data
    */ 
    public function setData(string $data) 
    { 
       $this->data = $data;
    }
    public function getMimeType() 
    {
        return $this->mimeType;
    }
    public function getData() 
    {
        return $this->data;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setMimeType($data->mime_type); 
        $this->setData($data->data); 
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
