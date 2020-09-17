<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Decrypt implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'cipher_b64_msg' => ['name' => 'cipherB64Msg', 'convertToDate' => false, 'removeIfNull' => false],
        'private_key' => ['name' => 'privateKey', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $cipherB64Msg;
    /**
    * @var string
    */ 
    private $privateKey;
    /** 
    * @param string $cipherB64Msg
    */ 
    public function setCipherB64Msg(string $cipherB64Msg) 
    { 
       $this->cipherB64Msg = $cipherB64Msg;
    }
    /** 
    * @param string $privateKey
    */ 
    public function setPrivateKey(string $privateKey) 
    { 
       $this->privateKey = $privateKey;
    }
    public function getCipherB64Msg() 
    {
        return $this->cipherB64Msg;
    }
    public function getPrivateKey() 
    {
        return $this->privateKey;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setCipherB64Msg($data->cipher_b64_msg); 
        $this->setPrivateKey($data->private_key); 
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
