<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class BlockChainRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'blocks_from' => 'blocksFrom',
        'blocks_to' => 'blocksTo',
    ];

    /**
    * @var int
    */ 
    private $blocksFrom;
    /**
    * @var int
    */ 
    private $blocksTo;
    /** 
    * @param int $blocksFrom
    */ 
    public function setBlocksFrom(int $blocksFrom) 
    { 
            $this->blocksFrom = $blocksFrom; 
    } 
    /** 
    * @param int $blocksTo
    */ 
    public function setBlocksTo(int $blocksTo) 
    { 
            $this->blocksTo = $blocksTo; 
    } 
    public function getBlocksFrom() 
    {
        return $this->blocksFrom;
    }
    public function getBlocksTo() 
    {
        return $this->blocksTo;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setBlocksFrom($data->blocks_from); 
          $this->setBlocksTo($data->blocks_to); 
    } 

    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
