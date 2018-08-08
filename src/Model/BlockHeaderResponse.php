<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class BlockHeaderResponse implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var array 
    */ 
    private $block_headers = [];
    public function getBlock_headers() 
    {
        return $this->block_headers;
    }
    public function validate(\stdClass $data) 
    { 
          foreach ($data->block_headers as $block_headersItem) { 
              $block_headersItemObj = new BlockHeader(); 
              $block_headersItemObj->validate($block_headersItem); 
              $this->block_headers[] = $block_headersItemObj;
           } 
    } 
} 
