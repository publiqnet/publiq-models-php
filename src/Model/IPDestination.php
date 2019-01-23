<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class IPDestination implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'port' => ['name' => 'port', 'convertToDate' => false, 'isEnum' => ''],
        'address' => ['name' => 'address', 'convertToDate' => false, 'isEnum' => ''],
    ];

    /**
    * @var int
    */ 
    private $port;
    /**
    * @var string
    */ 
    private $address;
    /** 
    * @param int $port
    */ 
    public function setPort(int $port) 
    { 
       $this->port = $port;
    }
    /** 
    * @param string $address
    */ 
    public function setAddress(string $address) 
    { 
       $this->address = $address;
    }
    public function getPort() 
    {
        return $this->port;
    }
    public function getAddress() 
    {
        return $this->address;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setPort($data->port); 
        $this->setAddress($data->address); 
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
