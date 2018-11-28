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
        'message' => ['name' => 'message', 'convertToDate' => false, 'isEnum' => 'NULL'],
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
        foreach (self::memberNames as $key => $value) {
               if ($value['name'] == $camelCaseName) {
                   $value['key'] = $key;
                   return $value;
               }
       }
       return null;
    }

} 
