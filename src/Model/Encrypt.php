<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Encrypt implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'plain_b64_msg' => ['name' => 'plainB64Msg', 'convertToDate' => false, 'removeIfNull' => false],
        'public_key' => ['name' => 'publicKey', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $plainB64Msg;
    /**
    * @var string
    */ 
    private $publicKey;
    /** 
    * @param string $plainB64Msg
    */ 
    public function setPlainB64Msg(string $plainB64Msg) 
    { 
       $this->plainB64Msg = $plainB64Msg;
    }
    /** 
    * @param string $publicKey
    */ 
    public function setPublicKey(string $publicKey) 
    { 
       $this->publicKey = $publicKey;
    }
    public function getPlainB64Msg() 
    {
        return $this->plainB64Msg;
    }
    public function getPublicKey() 
    {
        return $this->publicKey;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setPlainB64Msg($data->plain_b64_msg); 
        $this->setPublicKey($data->public_key); 
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
