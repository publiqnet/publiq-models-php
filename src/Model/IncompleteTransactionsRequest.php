<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class IncompleteTransactionsRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'address' => ['name' => 'address', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $address;
    /** 
    * @param string $address
    */ 
    public function setAddress(string $address) 
    { 
       $this->address = $address;
    }
    public function getAddress() 
    {
        return $this->address;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setAddress($data->address); 
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
