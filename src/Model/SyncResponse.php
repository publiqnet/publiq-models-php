<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class SyncResponse implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'number' => ['name' => 'number', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'c_sum' => ['name' => 'cSum', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'sync_info' => ['name' => 'syncInfo', 'convertToDate' => false, 'isEnum' => 'NULL'],
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
    * @var mixed 
    */ 
    private $syncInfo;
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
    * @param mixed $syncInfo
    */ 
    public function setSyncInfo( $syncInfo) 
    { 
       $this->syncInfo = $syncInfo;
    }
    public function getNumber() 
    {
        return $this->number;
    }
    public function getCSum() 
    {
        return $this->cSum;
    }
    public function getSyncInfo() 
    {
        return $this->syncInfo;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setNumber($data->number); 
        $this->setCSum($data->c_sum); 
        $this->setSyncInfo(Rtt::validate($data->sync_info)); 
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
