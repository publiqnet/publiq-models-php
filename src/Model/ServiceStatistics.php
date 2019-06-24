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
        'server_address' => ['name' => 'serverAddress', 'convertToDate' => false],
        'start_time_point' => ['name' => 'startTimePoint', 'convertToDate' => true],
        'end_time_point' => ['name' => 'endTimePoint', 'convertToDate' => true],
        'file_items' => ['name' => 'fileItems', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $serverAddress;
    /**
    * @var integer
    */ 
    private $startTimePoint;
    /**
    * @var integer
    */ 
    private $endTimePoint;
    /**
    * @var array
    */ 
    private $fileItems = [];
    /** 
    * @param string $serverAddress
    */ 
    public function setServerAddress(string $serverAddress) 
    { 
       $this->serverAddress = $serverAddress;
    }
    /** 
    * @param int $startTimePoint
    */ 
    public function setStartTimePoint(int $startTimePoint) 
    { 
       $this->startTimePoint = $startTimePoint;
    }
    /** 
    * @param int $endTimePoint
    */ 
    public function setEndTimePoint(int $endTimePoint) 
    { 
       $this->endTimePoint = $endTimePoint;
    }
    public function getServerAddress() 
    {
        return $this->serverAddress;
    }
    public function getStartTimePoint() 
    {
        return $this->startTimePoint;
    }
    public function getEndTimePoint() 
    {
        return $this->endTimePoint;
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
        $this->setServerAddress($data->server_address); 
        $this->setStartTimePoint(strtotime($data->start_time_point)); 
        $this->setEndTimePoint(strtotime($data->end_time_point)); 
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
