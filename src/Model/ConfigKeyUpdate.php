<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\UpdateType;

class ConfigKeyUpdate implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'private_key' => ['name' => 'privateKey', 'convertToDate' => false, 'removeIfNull' => false],
        'update_type' => ['name' => 'updateType', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $privateKey;
    /**
    * @var string 
    */ 
    private $updateType;
    /** 
    * @param string $privateKey
    */ 
    public function setPrivateKey(string $privateKey) 
    { 
       $this->privateKey = $privateKey;
    }
    /** 
    * @param string $updateType
    */ 
    public function setUpdateType(string $updateType) 
    { 
        UpdateType::validate($updateType);
        $this->updateType = $updateType;
    }
    public function getPrivateKey() 
    {
        return $this->privateKey;
    }
    public function getUpdateType() 
    {
        return $this->updateType;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setPrivateKey($data->private_key); 
        $this->setUpdateType($data->update_type); 
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
