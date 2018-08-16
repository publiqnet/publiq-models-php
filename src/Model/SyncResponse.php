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
        'block_number' => 'blockNumber',
        'consensus_sum' => 'consensusSum',
    ];

    /**
    * @var int
    */ 
    private $blockNumber;
    /**
    * @var int
    */ 
    private $consensusSum;
    /** 
    * @param int $blockNumber
    */ 
    public function setBlockNumber(int $blockNumber) 
    { 
            $this->blockNumber = $blockNumber; 
    } 
    /** 
    * @param int $consensusSum
    */ 
    public function setConsensusSum(int $consensusSum) 
    { 
            $this->consensusSum = $consensusSum; 
    } 
    public function getBlockNumber() 
    {
        return $this->blockNumber;
    }
    public function getConsensusSum() 
    {
        return $this->consensusSum;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setBlockNumber($data->blockNumber); 
          $this->setConsensusSum($data->consensusSum); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::$memberNames);
    }
} 
