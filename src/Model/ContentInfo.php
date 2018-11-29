<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class ContentInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'node_name' => ['name' => 'nodeName', 'convertToDate' => false, 'isEnum' => ''],
        'content_hash' => ['name' => 'contentHash', 'convertToDate' => false, 'isEnum' => ''],
    ];

    /**
    * @var string
    */ 
    private $nodeName;
    /**
    * @var string
    */ 
    private $contentHash;
    /** 
    * @param string $nodeName
    */ 
    public function setNodeName(string $nodeName) 
    { 
       $this->nodeName = $nodeName;
    }
    /** 
    * @param string $contentHash
    */ 
    public function setContentHash(string $contentHash) 
    { 
       $this->contentHash = $contentHash;
    }
    public function getNodeName() 
    {
        return $this->nodeName;
    }
    public function getContentHash() 
    {
        return $this->contentHash;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setNodeName($data->node_name); 
        $this->setContentHash($data->content_hash); 
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
