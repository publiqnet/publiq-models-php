<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class ServiceStatisticsFile implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'file_uri' => ['name' => 'fileUri', 'convertToDate' => false, 'removeIfNull' => false],
        'unit_uri' => ['name' => 'unitUri', 'convertToDate' => false, 'removeIfNull' => false],
        'count_items' => ['name' => 'countItems', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $fileUri;
    /**
    * @var string
    */ 
    private $unitUri;
    /**
    * @var array
    */ 
    private $countItems = [];
    /** 
    * @param string $fileUri
    */ 
    public function setFileUri(string $fileUri) 
    { 
       $this->fileUri = $fileUri;
    }
    /** 
    * @param string $unitUri
    */ 
    public function setUnitUri(string $unitUri) 
    { 
       $this->unitUri = $unitUri;
    }
    public function getFileUri() 
    {
        return $this->fileUri;
    }
    public function getUnitUri() 
    {
        return $this->unitUri;
    }
    public function getCountItems() 
    {
        return $this->countItems;
    }
    /**
    * @param ServiceStatisticsCount $countItemsItem
    */
    public function addCountItems(ServiceStatisticsCount $countItemsItem)
    {
        $this->countItems[] = $countItemsItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setFileUri($data->file_uri); 
        $this->setUnitUri($data->unit_uri); 
          foreach ($data->count_items as $countItemsItem) { 
              $countItemsItemObj = new ServiceStatisticsCount(); 
              $countItemsItemObj->validate($countItemsItem); 
              $this->countItems[] = $countItemsItemObj;
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
