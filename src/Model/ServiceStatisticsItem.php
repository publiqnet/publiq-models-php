<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class ServiceStatisticsItem implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'peer_address' => ['name' => 'peerAddress', 'convertToDate' => false],
        'count' => ['name' => 'count', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $peerAddress;
    /**
    * @var int
    */ 
    private $count;
    /** 
    * @param string $peerAddress
    */ 
    public function setPeerAddress(string $peerAddress) 
    { 
       $this->peerAddress = $peerAddress;
    }
    /** 
    * @param int $count
    */ 
    public function setCount(int $count) 
    { 
       $this->count = $count;
    }
    public function getPeerAddress() 
    {
        return $this->peerAddress;
    }
    public function getCount() 
    {
        return $this->count;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setPeerAddress($data->peer_address); 
        $this->setCount($data->count); 
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
