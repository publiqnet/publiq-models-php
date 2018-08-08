<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class BlockchainFileData implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var array 
    */ 
    private $blocks;
    /**
    * @var string
    */
    private $blocksKey;
    /**
    * @param string  $blocksKey
    */
    public function setblocksKey(string  $blocksKey)
    {
        $this->blocksKey = $blocksKey;
    }
    public function getBlocks() 
    {
        return $this->blocks;
    }
    public function validate(\stdClass $data) 
    { 
    $this->blocks =    Rtt::validate($data->blocks);
    } 
} 
