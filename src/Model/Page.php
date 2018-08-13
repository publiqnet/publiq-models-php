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
 
    CONST memberNames = [
        'channel' => 'channel',
        'file_uris' => 'fileUris',
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
    public function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, $this->$memberNames);
    }
} 
