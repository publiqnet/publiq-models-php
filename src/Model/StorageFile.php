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
          $this->setMimeType($data->mimeType); 
          $this->setData($data->data); 
    } 
    public static function getMemberName(string $camelCaseName)     {

        $memberNames = [
        'mime_type' => 'mimeType',
        'data' => 'data',
        ];
        return array_search($camelCaseName, $memberNames);    }
} 
