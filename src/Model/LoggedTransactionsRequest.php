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
    /**
    * @var int
    */ 
    private $start_index;
    /** 
    * @param int $start_index
    */ 
    public function setStart_index(int $start_index) 
    { 
            $this->start_index = $start_index; 
    } 
    public function getStart_index() 
    {
        return $this->start_index;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setStart_index($data->start_index); 
    } 
} 
