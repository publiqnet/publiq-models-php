<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class TaskRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'package' => ['name' => 'package', 'convertToDate' => false],
        'task_id' => ['name' => 'taskId', 'convertToDate' => false],
        'signature' => ['name' => 'signature', 'convertToDate' => false],
        'time_signed' => ['name' => 'timeSigned', 'convertToDate' => true],
    ];

    /**
    * @var mixed 
    */ 
    private $package;
    /**
    * @var int
    */ 
    private $taskId;
    /**
    * @var string
    */ 
    private $signature;
    /**
    * @var integer
    */ 
    private $timeSigned;
    /** 
    * @param mixed $package
    */ 
    public function setPackage( $package) 
    { 
       $this->package = $package;
    }
    /** 
    * @param int $taskId
    */ 
    public function setTaskId(int $taskId) 
    { 
       $this->taskId = $taskId;
    }
    /** 
    * @param string $signature
    */ 
    public function setSignature(string $signature) 
    { 
       $this->signature = $signature;
    }
    /** 
    * @param int $timeSigned
    */ 
    public function setTimeSigned(int $timeSigned) 
    { 
       $this->timeSigned = $timeSigned;
    }
    public function getPackage() 
    {
        return $this->package;
    }
    public function getTaskId() 
    {
        return $this->taskId;
    }
    public function getSignature() 
    {
        return $this->signature;
    }
    public function getTimeSigned() 
    {
        return $this->timeSigned;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setTaskId($data->task_id); 
        $this->setSignature($data->signature); 
        $this->setTimeSigned(strtotime($data->time_signed)); 
        $this->setPackage(Rtt::validate($data->package)); 
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
