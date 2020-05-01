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
        'node_address' => ['name' => 'nodeAddress', 'convertToDate' => false, 'removeIfNull' => false],
        'ip_address' => ['name' => 'ipAddress', 'convertToDate' => false, 'removeIfNull' => false],
        'ssl_ip_address' => ['name' => 'sslIpAddress', 'convertToDate' => false, 'removeIfNull' => false],
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
    * @var IPAddress
    */ 
    private $sslIpAddress;
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
    /** 
    * @param IPAddress $sslIpAddress
    */ 
    public function setSslIpAddress(IPAddress $sslIpAddress) 
    { 
       $this->sslIpAddress = $sslIpAddress;
    }
    public function getNodeAddress() 
    {
        return $this->nodeAddress;
    }
    public function getIpAddress() 
    {
        return $this->ipAddress;
    }
    public function getSslIpAddress() 
    {
        return $this->sslIpAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->ipAddress = new IPAddress();
        $this->ipAddress->validate($data->ip_address);
        $this->sslIpAddress = new IPAddress();
        $this->sslIpAddress->validate($data->ssl_ip_address);
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
