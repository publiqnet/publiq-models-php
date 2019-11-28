<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class SignedStorageOrder implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'order' => ['name' => 'order', 'convertToDate' => false],
        'authorization' => ['name' => 'authorization', 'convertToDate' => false],
    ];

    /**
    * @var StorageOrder
    */ 
    private $order;
    /**
    * @var Authority
    */ 
    private $authorization;
    /** 
    * @param StorageOrder $order
    */ 
    public function setOrder(StorageOrder $order) 
    { 
       $this->order = $order;
    }
    /** 
    * @param Authority $authorization
    */ 
    public function setAuthorization(Authority $authorization) 
    { 
       $this->authorization = $authorization;
    }
    public function getOrder() 
    {
        return $this->order;
    }
    public function getAuthorization() 
    {
        return $this->authorization;
    }
    public function validate(\stdClass $data) 
    { 
        $this->order = new StorageOrder();
        $this->order->validate($data->order);
        $this->authorization = new Authority();
        $this->authorization->validate($data->authorization);
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
