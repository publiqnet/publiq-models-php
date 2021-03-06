<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class MasterKey implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'master_key' => ['name' => 'masterKey', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $masterKey;
    /** 
    * @param string $masterKey
    */ 
    public function setMasterKey(string $masterKey) 
    { 
       $this->masterKey = $masterKey;
    }
    public function getMasterKey() 
    {
        return $this->masterKey;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setMasterKey($data->master_key); 
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
