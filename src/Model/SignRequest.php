<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class SignRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'private_key' => ['name' => 'privateKey', 'convertToDate' => false],
        'order' => ['name' => 'order', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $privateKey;
    /**
    * @var StorageOrder
    */ 
    private $order;
    /** 
    * @param string $privateKey
    */ 
    public function setPrivateKey(string $privateKey) 
    { 
       $this->privateKey = $privateKey;
    }
    /** 
    * @param StorageOrder $order
    */ 
    public function setOrder(StorageOrder $order) 
    { 
       $this->order = $order;
    }
    public function getPrivateKey() 
    {
        return $this->privateKey;
    }
    public function getOrder() 
    {
        return $this->order;
    }
    public function validate(\stdClass $data) 
    { 
        $this->order = new StorageOrder();
        $this->order->validate($data->order);
        $this->setPrivateKey($data->private_key); 
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
