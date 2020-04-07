<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Inbox implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'items' => ['name' => 'items', 'convertToDate' => false],
    ];

    /**
    * @var array
    */ 
    private $items = [];
    public function getItems() 
    {
        return $this->items;
    }
    /**
    * @param Letter $itemsItem
    */
    public function addItems(Letter $itemsItem)
    {
        $this->items[] = $itemsItem;
    }
    public function validate(\stdClass $data) 
    { 
          foreach ($data->items as $itemsItem) { 
              $itemsItemObj = new Letter(); 
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
