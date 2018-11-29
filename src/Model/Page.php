<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Page implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'channel' => ['name' => 'channel', 'convertToDate' => false, 'isEnum' => ''],
        'file_uris' => ['name' => 'fileUris', 'convertToDate' => false, 'isEnum' => ''],
    ];

    /**
    * @var string
    */ 
    private $channel;
    /**
    * @var array
    */ 
    private $fileUris = [];
    /** 
    * @param string $channel
    */ 
    public function setChannel(string $channel) 
    { 
       $this->channel = $channel;
    }
    public function getChannel() 
    {
        return $this->channel;
    }
    public function getFileUris() 
    {
        return $this->fileUris;
    }
    /**
    * @param string $fileUrisItem
    */
    public function addFileUris(string $fileUrisItem)
    {
        $this->fileUris[] = $fileUrisItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setChannel($data->channel); 
          foreach ($data->fileUris as $fileUrisItem) { 
            $this->addFileUris($fileUrisItem);
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
