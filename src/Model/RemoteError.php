<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class RemoteError implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'message' => 'message',
    ];

    /**
    * @var string
    */ 
    private $message;
    /** 
    * @param string $message
    */ 
    public function setMessage(string $message) 
    { 
            $this->message = $message; 
    } 
    public function getMessage() 
    {
        return $this->message;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setMessage($data->message); 
    } 

    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::$memberNames);
    }

} 
