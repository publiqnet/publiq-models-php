<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class File implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $author;
    /**
    * @var string
    */ 
    private $uri;
    /** 
    * @param string $author
    */ 
    public function setAuthor(string $author) 
    { 
            $this->author = $author; 
    } 
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
            $this->uri = $uri; 
    } 
    public function getAuthor() 
    {
        return $this->author;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setAuthor($data->author); 
          $this->setUri($data->uri); 
    } 
} 
