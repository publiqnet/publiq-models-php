<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class KeyPair implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'master_key' => ['name' => 'masterKey', 'convertToDate' => false, 'isEnum' => ''],
        'index' => ['name' => 'index', 'convertToDate' => false, 'isEnum' => ''],
        'public_key' => ['name' => 'publicKey', 'convertToDate' => false, 'isEnum' => ''],
        'private_key' => ['name' => 'privateKey', 'convertToDate' => false, 'isEnum' => ''],
    ];

    /**
    * @var string
    */ 
    private $masterKey;
    /**
    * @var int
    */ 
    private $index;
    /**
    * @var string
    */ 
    private $publicKey;
    /**
    * @var string
    */ 
    private $privateKey;
    /** 
    * @param string $masterKey
    */ 
    public function setMasterKey(string $masterKey) 
    { 
       $this->masterKey = $masterKey;
    }
    /** 
    * @param int $index
    */ 
    public function setIndex(int $index) 
    { 
       $this->index = $index;
    }
    /** 
    * @param string $publicKey
    */ 
    public function setPublicKey(string $publicKey) 
    { 
       $this->publicKey = $publicKey;
    }
    /** 
    * @param string $privateKey
    */ 
    public function setPrivateKey(string $privateKey) 
    { 
       $this->privateKey = $privateKey;
    }
    public function getMasterKey() 
    {
        return $this->masterKey;
    }
    public function getIndex() 
    {
        return $this->index;
    }
    public function getPublicKey() 
    {
        return $this->publicKey;
    }
    public function getPrivateKey() 
    {
        return $this->privateKey;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setMasterKey($data->master_key); 
        $this->setIndex($data->index); 
        $this->setPublicKey($data->public_key); 
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
