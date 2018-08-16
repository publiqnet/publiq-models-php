<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class StorageFileAddress implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var string
    */ 
    private $uri;
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
            $this->uri = $uri; 
    } 
    public function getUri() 
    {
        return $this->uri;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setUri($data->uri); 
    } 
    public static function getMemberName(string $camelCaseName)     {

        $memberNames = [
        'uri' => 'uri',
        ];
        return array_search($camelCaseName, $memberNames);    }
} 
