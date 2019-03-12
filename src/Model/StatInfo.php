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
        'reporter_address' => ['name' => 'reporterAddress', 'convertToDate' => false],
        'hash' => ['name' => 'hash', 'convertToDate' => false],
        'items' => ['name' => 'items', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $reporterAddress;
    /**
    * @var string
    */ 
    private $hash;
    /**
    * @var array
    */ 
    private $items = [];
    /** 
    * @param string $reporterAddress
    */ 
    public function setReporterAddress(string $reporterAddress) 
    { 
       $this->reporterAddress = $reporterAddress;
    }
    /** 
    * @param string $hash
    */ 
    public function setHash(string $hash) 
    { 
       $this->hash = $hash;
    }
    public function getReporterAddress() 
    {
        return $this->reporterAddress;
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
        $this->setReporterAddress($data->reporter_address); 
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
