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
        'content_unit_uri' => ['name' => 'contentUnitUri', 'convertToDate' => false],
        'view_count' => ['name' => 'viewCount', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $contentUnitUri;
    /**
    * @var int
    */ 
    private $viewCount;
    /** 
    * @param string $contentUnitUri
    */ 
    public function setContentUnitUri(string $contentUnitUri) 
    { 
       $this->contentUnitUri = $contentUnitUri;
    }
    /** 
    * @param int $viewCount
    */ 
    public function setViewCount(int $viewCount) 
    { 
       $this->viewCount = $viewCount;
    }
    public function getContentUnitUri() 
    {
        return $this->contentUnitUri;
    }
    public function getViewCount() 
    {
        return $this->viewCount;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setContentUnitUri($data->content_unit_uri); 
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
