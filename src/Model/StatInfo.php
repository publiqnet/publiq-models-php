<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class StatInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'block_hash' => ['name' => 'blockHash', 'convertToDate' => false],
        'items' => ['name' => 'items', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $blockHash;
    /**
    * @var array
    */ 
    private $items = [];
    /** 
    * @param string $blockHash
    */ 
    public function setBlockHash(string $blockHash) 
    { 
       $this->blockHash = $blockHash;
    }
    public function getBlockHash() 
    {
        return $this->blockHash;
    }
    public function getItems() 
    {
        return $this->items;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setBlockHash($data->block_hash); 
          foreach ($data->items as $itemsItem) { 
              $itemsItemObj = new StatItem(); 
              $itemsItemObj->validate($itemsItem); 
              $this->items[] = $itemsItemObj;
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
