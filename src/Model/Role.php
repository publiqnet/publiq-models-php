<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\NodeType;

class Role implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'node_address' => ['name' => 'nodeAddress', 'convertToDate' => false],
        'node_type' => ['name' => 'nodeType', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $nodeAddress;
    /**
    * @var string 
    */ 
    private $nodeType;
    /** 
    * @param string $nodeAddress
    */ 
    public function setNodeAddress(string $nodeAddress) 
    { 
       $this->nodeAddress = $nodeAddress;
    }
    /** 
    * @param string $nodeType
    */ 
    public function setNodeType(string $nodeType) 
    { 
        NodeType::validate($nodeType);
        $this->nodeType = $nodeType;
    }
    public function getNodeAddress() 
    {
        return $this->nodeAddress;
    }
    public function getNodeType() 
    {
        return $this->nodeType;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setNodeAddress($data->node_address); 
        $this->setNodeType($data->node_type); 
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
