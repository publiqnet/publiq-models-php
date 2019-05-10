<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class ServiceStatisticsCount implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'count' => ['name' => 'count', 'convertToDate' => false],
        'peer_address' => ['name' => 'peerAddress', 'convertToDate' => false],
    ];

    /**
    * @var int
    */ 
    private $count;
    /**
    * @var string
    */ 
    private $peerAddress;
    /** 
    * @param int $count
    */ 
    public function setCount(int $count) 
    { 
       $this->count = $count;
    }
    /** 
    * @param string $peerAddress
    */ 
    public function setPeerAddress(string $peerAddress) 
    { 
       $this->peerAddress = $peerAddress;
    }
    public function getCount() 
    {
        return $this->count;
    }
    public function getPeerAddress() 
    {
        return $this->peerAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setCount($data->count); 
        $this->setPeerAddress($data->peer_address); 
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
