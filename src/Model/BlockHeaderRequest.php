<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class BlockHeaderRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var int
    */ 
    private $blocks_from;
    /**
    * @var int
    */ 
    private $blocks_to;
    /** 
    * @param int $blocks_from
    */ 
    public function setBlocks_from(int $blocks_from) 
    { 
            $this->blocks_from = $blocks_from; 
    } 
    /** 
    * @param int $blocks_to
    */ 
    public function setBlocks_to(int $blocks_to) 
    { 
            $this->blocks_to = $blocks_to; 
    } 
    public function getBlocks_from() 
    {
        return $this->blocks_from;
    }
    public function getBlocks_to() 
    {
        return $this->blocks_to;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setBlocks_from($data->blocks_from); 
          $this->setBlocks_to($data->blocks_to); 
    } 
} 
