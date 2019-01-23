<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Coin implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'whole' => ['name' => 'whole', 'convertToDate' => false],
        'fraction' => ['name' => 'fraction', 'convertToDate' => false],
    ];

    /**
    * @var int
    */ 
    private $whole;
    /**
    * @var int
    */ 
    private $fraction;
    /** 
    * @param int $whole
    */ 
    public function setWhole(int $whole) 
    { 
       $this->whole = $whole;
    }
    /** 
    * @param int $fraction
    */ 
    public function setFraction(int $fraction) 
    { 
       $this->fraction = $fraction;
    }
    public function getWhole() 
    {
        return $this->whole;
    }
    public function getFraction() 
    {
        return $this->fraction;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setWhole($data->whole); 
        $this->setFraction($data->fraction); 
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
