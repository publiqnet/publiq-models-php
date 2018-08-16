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
          $this->setMasterKey($data->masterKey); 
    } 
    public static function getMemberName(string $camelCaseName)     {

        $memberNames = [
        'master_key' => 'masterKey',
        ];
        return array_search($camelCaseName, $memberNames);    }
} 
