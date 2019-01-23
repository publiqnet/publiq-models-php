<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class BlockHeader implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'block_number' => ['name' => 'blockNumber', 'convertToDate' => false],
        'delta' => ['name' => 'delta', 'convertToDate' => false],
        'c_sum' => ['name' => 'cSum', 'convertToDate' => false],
        'c_const' => ['name' => 'cConst', 'convertToDate' => false],
        'prev_hash' => ['name' => 'prevHash', 'convertToDate' => false],
        'time_signed' => ['name' => 'timeSigned', 'convertToDate' => true],
    ];

    /**
    * @var int
    */ 
    private $blockNumber;
    /**
    * @var int
    */ 
    private $delta;
    /**
    * @var int
    */ 
    private $cSum;
    /**
    * @var int
    */ 
    private $cConst;
    /**
    * @var string
    */ 
    private $prevHash;
    /**
    * @var integer
    */ 
    private $timeSigned;
    /** 
    * @param int $blockNumber
    */ 
    public function setBlockNumber(int $blockNumber) 
    { 
       $this->blockNumber = $blockNumber;
    }
    /** 
    * @param int $delta
    */ 
    public function setDelta(int $delta) 
    { 
       $this->delta = $delta;
    }
    /** 
    * @param int $cSum
    */ 
    public function setCSum(int $cSum) 
    { 
       $this->cSum = $cSum;
    }
    /** 
    * @param int $cConst
    */ 
    public function setCConst(int $cConst) 
    { 
       $this->cConst = $cConst;
    }
    /** 
    * @param string $prevHash
    */ 
    public function setPrevHash(string $prevHash) 
    { 
       $this->prevHash = $prevHash;
    }
    /** 
    * @param int $timeSigned
    */ 
    public function setTimeSigned(int $timeSigned) 
    { 
       $this->timeSigned = $timeSigned;
    }
    public function getBlockNumber() 
    {
        return $this->blockNumber;
    }
    public function getDelta() 
    {
        return $this->delta;
    }
    public function getCSum() 
    {
        return $this->cSum;
    }
    public function getCConst() 
    {
        return $this->cConst;
    }
    public function getPrevHash() 
    {
        return $this->prevHash;
    }
    public function getTimeSigned() 
    {
        return $this->timeSigned;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setBlockNumber($data->block_number); 
        $this->setDelta($data->delta); 
        $this->setCSum($data->c_sum); 
        $this->setCConst($data->c_const); 
        $this->setPrevHash($data->prev_hash); 
        $this->setTimeSigned(strtotime($data->time_signed)); 
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
