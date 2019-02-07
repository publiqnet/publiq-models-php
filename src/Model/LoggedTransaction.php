<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\LoggingType;

class LoggedTransaction implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'logging_type' => ['name' => 'loggingType', 'convertToDate' => false],
        'index' => ['name' => 'index', 'convertToDate' => false],
        'action' => ['name' => 'action', 'convertToDate' => false],
    ];

    /**
    * @var string 
    */ 
    private $loggingType;
    /**
    * @var int
    */ 
    private $index;
    /**
    * @var mixed 
    */ 
    private $action;
    /** 
    * @param string $loggingType
    */ 
    public function setLoggingType(string $loggingType) 
    { 
       $this->loggingType = $loggingType;
    }
    /** 
    * @param int $index
    */ 
    public function setIndex(int $index) 
    { 
       $this->index = $index;
    }
    /** 
    * @param mixed $action
    */ 
    public function setAction( $action) 
    { 
       $this->action = $action;
    }
    public function getLoggingType() 
    {
        return $this->loggingType;
    }
    public function getIndex() 
    {
        return $this->index;
    }
    public function getAction() 
    {
        return $this->action;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setIndex($data->index); 
        $this->setAction(Rtt::validate($data->action)); 
        $this->setLoggingType(LoggingType::validate($data->logging_type)); 
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
