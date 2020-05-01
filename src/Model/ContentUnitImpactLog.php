<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class ContentUnitImpactLog implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'content_unit_uri' => ['name' => 'contentUnitUri', 'convertToDate' => false, 'removeIfNull' => false],
        'views_per_channel' => ['name' => 'viewsPerChannel', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $contentUnitUri;
    /**
    * @var array
    */ 
    private $viewsPerChannel = [];
    /** 
    * @param string $contentUnitUri
    */ 
    public function setContentUnitUri(string $contentUnitUri) 
    { 
       $this->contentUnitUri = $contentUnitUri;
    }
    public function getContentUnitUri() 
    {
        return $this->contentUnitUri;
    }
    public function getViewsPerChannel() 
    {
        return $this->viewsPerChannel;
    }
    /**
    * @param ContentUnitImpactPerChannel $viewsPerChannelItem
    */
    public function addViewsPerChannel(ContentUnitImpactPerChannel $viewsPerChannelItem)
    {
        $this->viewsPerChannel[] = $viewsPerChannelItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setContentUnitUri($data->content_unit_uri); 
          foreach ($data->views_per_channel as $viewsPerChannelItem) { 
              $viewsPerChannelItemObj = new ContentUnitImpactPerChannel(); 
              $viewsPerChannelItemObj->validate($viewsPerChannelItem); 
              $this->viewsPerChannel[] = $viewsPerChannelItemObj;
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
