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
        'nodeid' => ['name' => 'nodeid', 'convertToDate' => false],
        'stamp' => ['name' => 'stamp', 'convertToDate' => true],
        'signature' => ['name' => 'signature', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $nodeid;
    /**
    * @var integer
    */ 
    private $stamp;
    /**
    * @var string
    */ 
    private $signature;
    /** 
    * @param string $nodeid
    */ 
    public function setNodeid(string $nodeid) 
    { 
       $this->nodeid = $nodeid;
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
    public function getNodeid() 
    {
        return $this->nodeid;
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
        $this->setNodeid($data->nodeid); 
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
