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
        'file_uri' => ['name' => 'fileUri', 'convertToDate' => false],
        'stat_items' => ['name' => 'statItems', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $serverAddress;
    /**
    * @var string
    */ 
    private $fileUri;
    /**
    * @var array
    */ 
    private $statItems = [];
    /** 
    * @param string $serverAddress
    */ 
    public function setServerAddress(string $serverAddress) 
    { 
       $this->serverAddress = $serverAddress;
    }
    /** 
    * @param string $fileUri
    */ 
    public function setFileUri(string $fileUri) 
    { 
       $this->fileUri = $fileUri;
    }
    public function getServerAddress() 
    {
        return $this->serverAddress;
    }
    public function getFileUri() 
    {
        return $this->fileUri;
    }
    public function getStatItems() 
    {
        return $this->statItems;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setServerAddress($data->server_address); 
        $this->setFileUri($data->file_uri); 
          foreach ($data->stat_items as $statItemsItem) { 
              $statItemsItemObj = new ServiceStatisticsItem(); 
              $statItemsItemObj->validate($statItemsItem); 
              $this->statItems[] = $statItemsItemObj;
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
