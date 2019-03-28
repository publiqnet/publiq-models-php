<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class KeyPairRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'master_key' => ['name' => 'masterKey', 'convertToDate' => false],
        'index' => ['name' => 'index', 'convertToDate' => false],
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
    public function getMasterKey() 
    {
        return $this->masterKey;
    }
    public function getIndex() 
    {
        return $this->index;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setMasterKey($data->master_key); 
        $this->setIndex($data->index); 
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
