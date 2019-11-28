<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class PublicAddressesInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'addresses_info' => ['name' => 'addressesInfo', 'convertToDate' => false],
    ];

    /**
    * @var array
    */ 
    private $addressesInfo = [];
    public function getAddressesInfo() 
    {
        return $this->addressesInfo;
    }
    /**
    * @param PublicAddressInfo $addressesInfoItem
    */
    public function addAddressesInfo(PublicAddressInfo $addressesInfoItem)
    {
        $this->addressesInfo[] = $addressesInfoItem;
    }
    public function validate(\stdClass $data) 
    { 
          foreach ($data->addresses_info as $addressesInfoItem) { 
              $addressesInfoItemObj = new PublicAddressInfo(); 
              $addressesInfoItemObj->validate($addressesInfoItem); 
              $this->addressesInfo[] = $addressesInfoItemObj;
           } 
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
