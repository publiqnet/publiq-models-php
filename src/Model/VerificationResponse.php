<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class VerificationResponse implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'storage_order' => ['name' => 'storageOrder', 'convertToDate' => false],
        'address' => ['name' => 'address', 'convertToDate' => false],
    ];

    /**
    * @var StorageOrder
    */ 
    private $storageOrder;
    /**
    * @var string
    */ 
    private $address;
    /** 
    * @param StorageOrder $storageOrder
    */ 
    public function setStorageOrder(StorageOrder $storageOrder) 
    { 
       $this->storageOrder = $storageOrder;
    }
    /** 
    * @param string $address
    */ 
    public function setAddress(string $address) 
    { 
       $this->address = $address;
    }
    public function getStorageOrder() 
    {
        return $this->storageOrder;
    }
    public function getAddress() 
    {
        return $this->address;
    }
    public function validate(\stdClass $data) 
    { 
        $this->storageOrder = new StorageOrder();
        $this->storageOrder->validate($data->storage_order);
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
