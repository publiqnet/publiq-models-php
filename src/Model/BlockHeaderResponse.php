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
 
    CONST  memberNames = [
        'block_headers' => ['name' => 'blockHeaders', 'convertToDate' => false],
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
    public static function getMemberName(string $camelCaseName)
    {
        foreach (self::memberNames as $key => $value) {
               if ($value['name'] == $camelCaseName) {
                   $value['key'] = $key;
                   return $value;
               }
       }
       return null;
    }

} 
