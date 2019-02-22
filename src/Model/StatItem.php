<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class StatItem implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'node_address' => ['name' => 'nodeAddress', 'convertToDate' => false],
        'passed' => ['name' => 'passed', 'convertToDate' => false],
        'failed' => ['name' => 'failed', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $nodeAddress;
    /**
    * @var int
    */ 
    private $passed;
    /**
    * @var int
    */ 
    private $failed;
    /** 
    * @param string $nodeAddress
    */ 
    public function setNodeAddress(string $nodeAddress) 
    { 
       $this->nodeAddress = $nodeAddress;
    }
    /** 
    * @param int $passed
    */ 
    public function setPassed(int $passed) 
    { 
       $this->passed = $passed;
    }
    /** 
    * @param int $failed
    */ 
    public function setFailed(int $failed) 
    { 
       $this->failed = $failed;
    }
    public function getNodeAddress() 
    {
        return $this->nodeAddress;
    }
    public function getPassed() 
    {
        return $this->passed;
    }
    public function getFailed() 
    {
        return $this->failed;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setNodeAddress($data->node_address); 
        $this->setPassed($data->passed); 
        $this->setFailed($data->failed); 
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
