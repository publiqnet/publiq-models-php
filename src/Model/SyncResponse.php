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
    /**
    * @var int
    */ 
    private $block_number;
    /**
    * @var int
    */ 
    private $consensus_sum;
    /** 
    * @param int $block_number
    */ 
    public function setBlock_number(int $block_number) 
    { 
            $this->block_number = $block_number; 
    } 
    /** 
    * @param int $consensus_sum
    */ 
    public function setConsensus_sum(int $consensus_sum) 
    { 
            $this->consensus_sum = $consensus_sum; 
    } 
    public function getBlock_number() 
    {
        return $this->block_number;
    }
    public function getConsensus_sum() 
    {
        return $this->consensus_sum;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setBlock_number($data->block_number); 
          $this->setConsensus_sum($data->consensus_sum); 
    } 
} 
