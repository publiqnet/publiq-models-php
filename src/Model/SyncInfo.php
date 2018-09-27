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
        'number' => '['name' => 'number', 'convertToDate' => false],
        'c_sum' => '['name' => 'cSum', 'convertToDate' => false],
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
    public function getNumber() 
    {
        return $this->number;
    }
    public function getCSum() 
    {
        return $this->cSum;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setNumber($data->number); 
        $this->setCSum($data->c_sum); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
