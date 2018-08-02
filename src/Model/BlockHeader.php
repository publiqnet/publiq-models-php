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
    /**
    * @var int
    */ 
    private $block_number;
    /**
    * @var int
    */ 
    private $consensus_const;
    /**
    * @var int
    */ 
    private $consensus_delta;
    /**
    * @var int
    */ 
    private $consensus_sum;
    /**
    * @var string
    */ 
    private $previous_hash;
    /**
    * @var integer
    */ 
    private $sign_time;
    /** 
    * @param int $block_number
    */ 
    public function setBlock_number(int $block_number) 
    { 
            $this->block_number = $block_number; 
    } 
    /** 
    * @param int $consensus_const
    */ 
    public function setConsensus_const(int $consensus_const) 
    { 
            $this->consensus_const = $consensus_const; 
    } 
    /** 
    * @param int $consensus_delta
    */ 
    public function setConsensus_delta(int $consensus_delta) 
    { 
            $this->consensus_delta = $consensus_delta; 
    } 
    /** 
    * @param int $consensus_sum
    */ 
    public function setConsensus_sum(int $consensus_sum) 
    { 
            $this->consensus_sum = $consensus_sum; 
    } 
    /** 
    * @param string $previous_hash
    */ 
    public function setPrevious_hash(string $previous_hash) 
    { 
            $this->previous_hash = $previous_hash; 
    } 
    /** 
    * @param int $sign_time
    */ 
    public function setSign_time(int $sign_time) 
    { 
            $this->sign_time = strtotime($sign_time); 
    } 
    public function getBlock_number() 
    {
        return $this->block_number;
    }
    public function getConsensus_const() 
    {
        return $this->consensus_const;
    }
    public function getConsensus_delta() 
    {
        return $this->consensus_delta;
    }
    public function getConsensus_sum() 
    {
        return $this->consensus_sum;
    }
    public function getPrevious_hash() 
    {
        return $this->previous_hash;
    }
    public function getSign_time() 
    {
        return $this->sign_time;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setBlock_number($data->block_number); 
          $this->setConsensus_const($data->consensus_const); 
          $this->setConsensus_delta($data->consensus_delta); 
          $this->setConsensus_sum($data->consensus_sum); 
          $this->setPrevious_hash($data->previous_hash); 
          $this->setSign_time($data->sign_time); 
    } 
} 
