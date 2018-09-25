<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class LoggedTransactionsRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'start_index' => 'startIndex',
        'max_count' => 'maxCount',
    ];

    /**
    * @var int
    */ 
    private $startIndex;
    /**
    * @var int
    */ 
    private $maxCount;
    /** 
    * @param int $startIndex
    */ 
    public function setStartIndex(int $startIndex) 
    { 
            $this->startIndex = $startIndex; 
    } 
    /** 
    * @param int $maxCount
    */ 
    public function setMaxCount(int $maxCount) 
    { 
            $this->maxCount = $maxCount; 
    } 
    public function getStartIndex() 
    {
        return $this->startIndex;
    }
    public function getMaxCount() 
    {
        return $this->maxCount;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setStartIndex($data->start_index); 
          $this->setMaxCount($data->max_count); 
    } 

    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
