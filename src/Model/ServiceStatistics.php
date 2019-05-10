<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class ServiceStatistics implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'block_number' => ['name' => 'blockNumber', 'convertToDate' => false],
        'server_address' => ['name' => 'serverAddress', 'convertToDate' => false],
        'file_items' => ['name' => 'fileItems', 'convertToDate' => false],
    ];

    /**
    * @var int
    */ 
    private $blockNumber;
    /**
    * @var string
    */ 
    private $serverAddress;
    /**
    * @var array
    */ 
    private $fileItems = [];
    /** 
    * @param int $blockNumber
    */ 
    public function setBlockNumber(int $blockNumber) 
    { 
       $this->blockNumber = $blockNumber;
    }
    /** 
    * @param string $serverAddress
    */ 
    public function setServerAddress(string $serverAddress) 
    { 
       $this->serverAddress = $serverAddress;
    }
    public function getBlockNumber() 
    {
        return $this->blockNumber;
    }
    public function getServerAddress() 
    {
        return $this->serverAddress;
    }
    public function getFileItems() 
    {
        return $this->fileItems;
    }
    /**
    * @param ServiceStatisticsFile $fileItemsItem
    */
    public function addFileItems(ServiceStatisticsFile $fileItemsItem)
    {
        $this->fileItems[] = $fileItemsItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setBlockNumber($data->block_number); 
        $this->setServerAddress($data->server_address); 
          foreach ($data->file_items as $fileItemsItem) { 
              $fileItemsItemObj = new ServiceStatisticsFile(); 
              $fileItemsItemObj->validate($fileItemsItem); 
              $this->fileItems[] = $fileItemsItemObj;
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
