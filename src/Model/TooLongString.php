<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class TooLongString implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'used_string' => ['name' => 'usedString', 'convertToDate' => false],
        'max_length' => ['name' => 'maxLength', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $usedString;
    /**
    * @var int
    */ 
    private $maxLength;
    /** 
    * @param string $usedString
    */ 
    public function setUsedString(string $usedString) 
    { 
       $this->usedString = $usedString;
    }
    /** 
    * @param int $maxLength
    */ 
    public function setMaxLength(int $maxLength) 
    { 
       $this->maxLength = $maxLength;
    }
    public function getUsedString() 
    {
        return $this->usedString;
    }
    public function getMaxLength() 
    {
        return $this->maxLength;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUsedString($data->used_string); 
        $this->setMaxLength($data->max_length); 
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
