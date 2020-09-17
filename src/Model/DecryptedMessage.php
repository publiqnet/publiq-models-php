<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class DecryptedMessage implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'plain_b64_msg' => ['name' => 'plainB64Msg', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $plainB64Msg;
    /** 
    * @param string $plainB64Msg
    */ 
    public function setPlainB64Msg(string $plainB64Msg) 
    { 
       $this->plainB64Msg = $plainB64Msg;
    }
    public function getPlainB64Msg() 
    {
        return $this->plainB64Msg;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setPlainB64Msg($data->plain_b64_msg); 
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
