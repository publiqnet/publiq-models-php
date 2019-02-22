<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class GetStorageFile implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'uri' => ['name' => 'uri', 'convertToDate' => false],
        'node_address' => ['name' => 'nodeAddress', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var string
    */ 
    private $nodeAddress;
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    /** 
    * @param string $nodeAddress
    */ 
    public function setNodeAddress(string $nodeAddress) 
    { 
       $this->nodeAddress = $nodeAddress;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function getNodeAddress() 
    {
        return $this->nodeAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUri($data->uri); 
        $this->setNodeAddress($data->node_address); 
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
