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
        'node_address' => ['name' => 'nodeAddress', 'convertToDate' => false],
        'ip_address' => ['name' => 'ipAddress', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $nodeAddress;
    /**
    * @var IPAddress
    */ 
    private $ipAddress;
    /** 
    * @param string $nodeAddress
    */ 
    public function setNodeAddress(string $nodeAddress) 
    { 
       $this->nodeAddress = $nodeAddress;
    }
    /** 
    * @param IPAddress $ipAddress
    */ 
    public function setIpAddress(IPAddress $ipAddress) 
    { 
       $this->ipAddress = $ipAddress;
    }
    public function getNodeAddress() 
    {
        return $this->nodeAddress;
    }
    public function getIpAddress() 
    {
        return $this->ipAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->ipAddress = new IPAddress();
        $this->ipAddress->validate($data->ip_address);
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
