<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class InvalidPublicKey implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'public_key' => ['name' => 'publicKey', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $publicKey;
    /** 
    * @param string $publicKey
    */ 
    public function setPublicKey(string $publicKey) 
    { 
       $this->publicKey = $publicKey;
    }
    public function getPublicKey() 
    {
        return $this->publicKey;
    }
    public function validate(\stdClass $data) 
    { 
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
