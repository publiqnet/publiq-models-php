<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class SyncInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'number' => ['name' => 'number', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'c_sum' => ['name' => 'cSum', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'authority' => ['name' => 'authority', 'convertToDate' => false, 'isEnum' => 'NULL'],
    ];

    /**
    * @var int
    */ 
    private $number;
    /**
    * @var int
    */ 
    private $cSum;
    /**
    * @var string
    */ 
    private $authority;
    /** 
    * @param int $number
    */ 
    public function setNumber(int $number) 
    { 
       $this->number = $number;
    }
    /** 
    * @param int $cSum
    */ 
    public function setCSum(int $cSum) 
    { 
       $this->cSum = $cSum;
    }
    /** 
    * @param string $authority
    */ 
    public function setAuthority(string $authority) 
    { 
       $this->authority = $authority;
    }
    public function getNumber() 
    {
        return $this->number;
    }
    public function getCSum() 
    {
        return $this->cSum;
    }
    public function getAuthority() 
    {
        return $this->authority;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setNumber($data->number); 
        $this->setCSum($data->c_sum); 
        $this->setAuthority($data->authority); 
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
