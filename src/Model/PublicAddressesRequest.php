<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\PublicAddressType;

class PublicAddressesRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'address_type' => ['name' => 'addressType', 'convertToDate' => false],
    ];

    /**
    * @var string 
    */ 
    private $addressType;
    /** 
    * @param string $addressType
    */ 
    public function setAddressType(string $addressType) 
    { 
        PublicAddressType::validate($addressType);
        $this->addressType = $addressType;
    }
    public function getAddressType() 
    {
        return $this->addressType;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setAddressType($data->address_type); 
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
