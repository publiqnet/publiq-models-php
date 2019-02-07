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
        'hash' => ['name' => 'hash', 'convertToDate' => false],
        'items' => ['name' => 'items', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $hash;
    /**
    * @var array
    */ 
    private $items = [];
    /** 
    * @param string $hash
    */ 
    public function setHash(string $hash) 
    { 
       $this->hash = $hash;
    }
    public function getHash() 
    {
        return $this->hash;
    }
    public function getItems() 
    {
        return $this->items;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setHash($data->hash); 
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
