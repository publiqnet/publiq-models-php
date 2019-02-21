<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class BlockchainResponse implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'signed_blocks' => ['name' => 'signedBlocks', 'convertToDate' => false],
    ];

    /**
    * @var array
    */ 
    private $signedBlocks = [];
    public function getSignedBlocks() 
    {
        return $this->signedBlocks;
    }
    public function validate(\stdClass $data) 
    { 
          foreach ($data->signed_blocks as $signedBlocksItem) { 
              $signedBlocksItemObj = new SignedBlock(); 
              $signedBlocksItemObj->validate($signedBlocksItem); 
              $this->signedBlocks[] = $signedBlocksItemObj;
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
