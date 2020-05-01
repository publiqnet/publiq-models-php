<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class ContentUnitImpactPerChannel implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'channel_address' => ['name' => 'channelAddress', 'convertToDate' => false, 'removeIfNull' => false],
        'view_count' => ['name' => 'viewCount', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $channelAddress;
    /**
    * @var int
    */ 
    private $viewCount;
    /** 
    * @param string $channelAddress
    */ 
    public function setChannelAddress(string $channelAddress) 
    { 
       $this->channelAddress = $channelAddress;
    }
    /** 
    * @param int $viewCount
    */ 
    public function setViewCount(int $viewCount) 
    { 
       $this->viewCount = $viewCount;
    }
    public function getChannelAddress() 
    {
        return $this->channelAddress;
    }
    public function getViewCount() 
    {
        return $this->viewCount;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setChannelAddress($data->channel_address); 
        $this->setViewCount($data->view_count); 
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
