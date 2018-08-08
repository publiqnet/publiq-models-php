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
    /**
    * @var string
    */ 
    private $channel;
    /**
    * @var array 
    */ 
    private $file_uris = [];
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
    public function getFile_uris() 
    {
        return $this->file_uris;
    }
    /**
    * @param string $file_urisItem
    */
    public function addFile_uris(string $file_urisItem)
    {
        $this->file_uris[] = $file_urisItem;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setChannel($data->channel); 
          foreach ($data->file_uris as $file_urisItem) { 
            $this->addFile_uris($file_urisItem);
           } 
    } 
} 
