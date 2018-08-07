<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Broadcast implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    /**
    * @var int
    */ 
    private $echoes;
    /**
    * @var mixed 
    */ 
    private $package;
    /** 
    * @param int $echoes
    */ 
    public function setEchoes(int $echoes) 
    { 
            $this->echoes = $echoes; 
    } 
    public function getEchoes() 
    {
        return $this->echoes;
    }
    public function getPackage() 
    {
        return $this->package;
    }
    public function validate(\stdClass $data) 
    { 
          $this->setEchoes($data->echoes); 
          $this->package = Rtt::validate($data->package);
    } 
} 
