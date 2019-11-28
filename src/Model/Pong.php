<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Pong implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'node_address' => ['name' => 'nodeAddress', 'convertToDate' => false],
        'stamp' => ['name' => 'stamp', 'convertToDate' => true],
        'signature' => ['name' => 'signature', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $nodeAddress;
    /**
    * @var integer
    */ 
    private $stamp;
    /**
    * @var string
    */ 
    private $signature;
    /** 
    * @param string $nodeAddress
    */ 
    public function setNodeAddress(string $nodeAddress) 
    { 
       $this->nodeAddress = $nodeAddress;
    }
    /** 
    * @param int $stamp
    */ 
    public function setStamp(int $stamp) 
    { 
       $this->stamp = $stamp;
    }
    /** 
    * @param string $signature
    */ 
    public function setSignature(string $signature) 
    { 
       $this->signature = $signature;
    }
    public function getNodeAddress() 
    {
        return $this->nodeAddress;
    }
    public function getStamp() 
    {
        return $this->stamp;
    }
    public function getSignature() 
    {
        return $this->signature;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setNodeAddress($data->node_address); 
        $this->setStamp(strtotime($data->stamp)); 
        $this->setSignature($data->signature); 
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
