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
        'block_number' => 'blockNumber',
        'delta' => 'delta',
        'c_sum' => 'cSum',
        'c_const' => 'cConst',
        'prev_hash' => 'prevHash',
        'sign_time' => 'signTime',
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
    private $signTime;
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
    * @param int $signTime
    */ 
    public function setSignTime(int $signTime) 
    { 
            $this->signTime = strtotime($signTime); 
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
    public function getSignTime() 
    {
        return $this->signTime;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setBlockNumber($data->blockNumber); 
          $this->setDelta($data->delta); 
          $this->setCSum($data->cSum); 
          $this->setCConst($data->cConst); 
          $this->setPrevHash($data->prevHash); 
          $this->setSignTime($data->signTime); 
    } 

    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
