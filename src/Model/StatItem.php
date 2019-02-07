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
        'node' => ['name' => 'node', 'convertToDate' => false],
        'passed' => ['name' => 'passed', 'convertToDate' => false],
        'failed' => ['name' => 'failed', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $node;
    /**
    * @var int
    */ 
    private $passed;
    /**
    * @var int
    */ 
    private $failed;
    /** 
    * @param string $node
    */ 
    public function setNode(string $node) 
    { 
       $this->node = $node;
    }
    /** 
    * @param int $passed
    */ 
    public function setPassed(int $passed) 
    { 
       $this->passed = $passed;
    }
    /** 
    * @param int $failed
    */ 
    public function setFailed(int $failed) 
    { 
       $this->failed = $failed;
    }
    public function getNode() 
    {
        return $this->node;
    }
    public function getPassed() 
    {
        return $this->passed;
    }
    public function getFailed() 
    {
        return $this->failed;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setNode($data->node); 
        $this->setPassed($data->passed); 
        $this->setFailed($data->failed); 
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
