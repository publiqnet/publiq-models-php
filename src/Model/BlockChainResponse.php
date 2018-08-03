<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class BlockChainResponse implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var array
    */ 
    private $signed_blocks;
    public function getSigned_blocks() 
    {
        return $this->signed_blocks;
    }
    public function validate(\stdClass $data) 
    { 
          foreach ($data->signed_blocks as $signed_blocksItem) { 
              $signed_blocksItemObj = new SignedBlock(); 
              $signed_blocksItemObj->validate($signed_blocksItem); 
              $this->signed_blocks[] = $signed_blocksItemObj;
           } 
    } 
} 
