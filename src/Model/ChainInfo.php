<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class ChainInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var int
    */ 
    private $length;
    /** 
    * @param int $length
    */ 
    public function setLength(int $length) 
    { 
            $this->length = $length; 
    } 
    public function getLength() 
    {
        return $this->length;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setLength($data->length); 
    } 
} 
