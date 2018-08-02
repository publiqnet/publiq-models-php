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
    private $mime_type;
    /**
    * @var string
    */ 
    private $data;
    /** 
    * @param string $mime_type
    */ 
    public function setMime_type(string $mime_type) 
    { 
            $this->mime_type = $mime_type; 
    } 
    /** 
    * @param string $data
    */ 
    public function setData(string $data) 
    { 
            $this->data = $data; 
    } 
    public function getMime_type() 
    {
        return $this->mime_type;
    }
    public function getData() 
    {
        return $this->data;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setMime_type($data->mime_type); 
          $this->setData($data->data); 
    } 
} 
