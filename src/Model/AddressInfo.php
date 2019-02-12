<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class AddressInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'node_id' => ['name' => 'nodeId', 'convertToDate' => false],
        'ip_address' => ['name' => 'ipAddress', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $nodeId;
    /**
    * @var IPAddress
    */ 
    private $ipAddress;
    /** 
    * @param string $nodeId
    */ 
    public function setNodeId(string $nodeId) 
    { 
       $this->nodeId = $nodeId;
    }
    /** 
    * @param IPAddress $ipAddress
    */ 
    public function setIpAddress(IPAddress $ipAddress) 
    { 
       $this->ipAddress = $ipAddress;
    }
    public function getNodeId() 
    {
        return $this->nodeId;
    }
    public function getIpAddress() 
    {
        return $this->ipAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->ipAddress = new IPAddress();
        $this->ipAddress->validate($data->ip_address);
        $this->setNodeId($data->node_id); 
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
