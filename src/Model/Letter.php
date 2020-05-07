<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Letter implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'from' => ['name' => 'from', 'convertToDate' => false, 'removeIfNull' => false],
        'to' => ['name' => 'to', 'convertToDate' => false, 'removeIfNull' => false],
        'message' => ['name' => 'message', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $from;
    /**
    * @var string
    */ 
    private $to;
    /**
    * @var string
    */ 
    private $message;
    /** 
    * @param string $from
    */ 
    public function setFrom(string $from) 
    { 
       $this->from = $from;
    }
    /** 
    * @param string $to
    */ 
    public function setTo(string $to) 
    { 
       $this->to = $to;
    }
    /** 
    * @param string $message
    */ 
    public function setMessage(string $message) 
    { 
       $this->message = $message;
    }
    public function getFrom() 
    {
        return $this->from;
    }
    public function getTo() 
    {
        return $this->to;
    }
    public function getMessage() 
    {
        return $this->message;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setFrom($data->from); 
        $this->setTo($data->to); 
        $this->setMessage($data->message); 
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
