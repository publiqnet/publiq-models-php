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
 
    CONST static memberNames = [
        'start_index' => 'startIndex',
    ];

    /**
    * @var int
    */ 
    private $startIndex;
    /** 
    * @param int $startIndex
    */ 
    public function setStartIndex(int $startIndex) 
    { 
            $this->startIndex = $startIndex; 
    } 
    public function getStartIndex() 
    {
        return $this->startIndex;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setStartIndex($data->startIndex); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::$memberNames);
    }
} 
