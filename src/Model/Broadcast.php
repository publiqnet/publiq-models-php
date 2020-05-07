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
 
    CONST  memberNames = [
        'echoes' => ['name' => 'echoes', 'convertToDate' => false, 'removeIfNull' => false],
        'package' => ['name' => 'package', 'convertToDate' => false, 'removeIfNull' => false],
    ];

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
    /** 
    * @param mixed $package
    */ 
    public function setPackage( $package) 
    { 
       $this->package = $package;
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
        $this->setPackage(Rtt::validate($data->package)); 
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
