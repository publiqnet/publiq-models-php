<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class PublicAddressInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'ip_destination' => ['name' => 'ipDestination', 'convertToDate' => false],
        'node_address' => ['name' => 'nodeAddress', 'convertToDate' => false],
        'seconds_since_checked' => ['name' => 'secondsSinceChecked', 'convertToDate' => false],
    ];

    /**
    * @var IPDestination
    */ 
    private $ipDestination;
    /**
    * @var string
    */ 
    private $nodeAddress;
    /**
    * @var int
    */ 
    private $secondsSinceChecked;
    /** 
    * @param IPDestination $ipDestination
    */ 
    public function setIpDestination(IPDestination $ipDestination) 
    { 
       $this->ipDestination = $ipDestination;
    }
    /** 
    * @param string $nodeAddress
    */ 
    public function setNodeAddress(string $nodeAddress) 
    { 
       $this->nodeAddress = $nodeAddress;
    }
    /** 
    * @param int $secondsSinceChecked
    */ 
    public function setSecondsSinceChecked(int $secondsSinceChecked) 
    { 
       $this->secondsSinceChecked = $secondsSinceChecked;
    }
    public function getIpDestination() 
    {
        return $this->ipDestination;
    }
    public function getNodeAddress() 
    {
        return $this->nodeAddress;
    }
    public function getSecondsSinceChecked() 
    {
        return $this->secondsSinceChecked;
    }
    public function validate(\stdClass $data) 
    { 
        $this->ipDestination = new IPDestination();
        $this->ipDestination->validate($data->ip_destination);
        $this->setNodeAddress($data->node_address); 
        $this->setSecondsSinceChecked($data->seconds_since_checked); 
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
