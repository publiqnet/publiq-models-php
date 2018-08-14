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
 
    CONST static memberNames = [
        'block_number' => 'blockNumber',
        'consensus_const' => 'consensusConst',
        'consensus_delta' => 'consensusDelta',
        'consensus_sum' => 'consensusSum',
        'previous_hash' => 'previousHash',
        'sign_time' => 'signTime',
    ];

    /**
    * @var int
    */ 
    private $blockNumber;
    /**
    * @var int
    */ 
    private $consensusConst;
    /**
    * @var int
    */ 
    private $consensusDelta;
    /**
    * @var int
    */ 
    private $consensusSum;
    /**
    * @var string
    */ 
    private $previousHash;
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
    * @param int $consensusConst
    */ 
    public function setConsensusConst(int $consensusConst) 
    { 
            $this->consensusConst = $consensusConst; 
    } 
    /** 
    * @param int $consensusDelta
    */ 
    public function setConsensusDelta(int $consensusDelta) 
    { 
            $this->consensusDelta = $consensusDelta; 
    } 
    /** 
    * @param int $consensusSum
    */ 
    public function setConsensusSum(int $consensusSum) 
    { 
            $this->consensusSum = $consensusSum; 
    } 
    /** 
    * @param string $previousHash
    */ 
    public function setPreviousHash(string $previousHash) 
    { 
            $this->previousHash = $previousHash; 
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
    public function getConsensusConst() 
    {
        return $this->consensusConst;
    }
    public function getConsensusDelta() 
    {
        return $this->consensusDelta;
    }
    public function getConsensusSum() 
    {
        return $this->consensusSum;
    }
    public function getPreviousHash() 
    {
        return $this->previousHash;
    }
    public function getSignTime() 
    {
        return $this->signTime;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setBlockNumber($data->blockNumber); 
          $this->setConsensusConst($data->consensusConst); 
          $this->setConsensusDelta($data->consensusDelta); 
          $this->setConsensusSum($data->consensusSum); 
          $this->setPreviousHash($data->previousHash); 
          $this->setSignTime($data->signTime); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::$memberNames);
    }
} 
