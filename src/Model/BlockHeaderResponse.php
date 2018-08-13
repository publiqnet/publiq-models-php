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
 
    CONST memberNames = [
        'block_headers' => 'blockHeaders',
    ];

    /**
    * @var array
    */ 
    private $blockHeaders = [];
    public function getBlockHeaders() 
    {
        return $this->blockHeaders;
    }
    public function validate(\stdClass $data) 
    { 
          foreach ($data->blockHeaders as $blockHeadersItem) { 
              $blockHeadersItemObj = new BlockHeader(); 
              $blockHeadersItemObj->validate($blockHeadersItem); 
              $this->blockHeaders[] = $blockHeadersItemObj;
           } 
    } 
    public function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, $this->$memberNames);
    }
} 
