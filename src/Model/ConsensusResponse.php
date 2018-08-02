<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class ConsensusResponse implements ValidatorInterface, \JsonSerializable
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
    private $consensus_delta;
    /** 
    * @param int $block_number
    */ 
    public function setBlock_number(int $block_number) 
    { 
            $this->block_number = $block_number; 
    } 
    /** 
    * @param int $consensus_delta
    */ 
    public function setConsensus_delta(int $consensus_delta) 
    { 
            $this->consensus_delta = $consensus_delta; 
    } 
    public function getBlock_number() 
    {
        return $this->block_number;
    }
    public function getConsensus_delta() 
    {
        return $this->consensus_delta;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setBlock_number($data->block_number); 
          $this->setConsensus_delta($data->consensus_delta); 
    } 
} 
