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
        'number' => ['name' => 'number', 'convertToDate' => false],
        'c_sum' => ['name' => 'cSum', 'convertToDate' => false],
        'sync_info' => ['name' => 'syncInfo', 'convertToDate' => false],
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
    * @var SyncInfo
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
    * @param SyncInfo $syncInfo
    */ 
    public function setSyncInfo(SyncInfo $syncInfo) 
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
        $this->syncInfo = new SyncInfo();
        $this->syncInfo->validate($data->sync_info);
        $this->setNumber($data->number); 
        $this->setCSum($data->c_sum); 
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
