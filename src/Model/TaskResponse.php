<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class TaskResponse implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'package' => ['name' => 'package', 'convertToDate' => false],
        'task_id' => ['name' => 'taskId', 'convertToDate' => false],
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
    public function getPackage() 
    {
        return $this->package;
    }
    public function getTaskId() 
    {
        return $this->taskId;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setTaskId($data->task_id); 
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
