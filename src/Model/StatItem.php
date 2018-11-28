<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class StatItem implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'node_name' => ['name' => 'nodeName', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'content_hash' => ['name' => 'contentHash', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'pass_count' => ['name' => 'passCount', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'fail_count' => ['name' => 'failCount', 'convertToDate' => false, 'isEnum' => 'NULL'],
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
    * @var int
    */ 
    private $passCount;
    /**
    * @var int
    */ 
    private $failCount;
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
    /** 
    * @param int $passCount
    */ 
    public function setPassCount(int $passCount) 
    { 
       $this->passCount = $passCount;
    }
    /** 
    * @param int $failCount
    */ 
    public function setFailCount(int $failCount) 
    { 
       $this->failCount = $failCount;
    }
    public function getNodeName() 
    {
        return $this->nodeName;
    }
    public function getContentHash() 
    {
        return $this->contentHash;
    }
    public function getPassCount() 
    {
        return $this->passCount;
    }
    public function getFailCount() 
    {
        return $this->failCount;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setNodeName($data->node_name); 
        $this->setContentHash($data->content_hash); 
        $this->setPassCount($data->pass_count); 
        $this->setFailCount($data->fail_count); 
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
