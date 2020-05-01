<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class InvalidSignature implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'details' => ['name' => 'details', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var Signature
    */ 
    private $details;
    /** 
    * @param Signature $details
    */ 
    public function setDetails(Signature $details) 
    { 
       $this->details = $details;
    }
    public function getDetails() 
    {
        return $this->details;
    }
    public function validate(\stdClass $data) 
    { 
        $this->details = new Signature();
        $this->details->validate($data->details);
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
