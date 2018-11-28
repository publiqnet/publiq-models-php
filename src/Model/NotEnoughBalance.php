<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class NotEnoughBalance implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'balance' => ['name' => 'balance', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'spending' => ['name' => 'spending', 'convertToDate' => false, 'isEnum' => 'NULL'],
    ];

    /**
    * @var Coin
    */ 
    private $balance;
    /**
    * @var Coin
    */ 
    private $spending;
    /** 
    * @param Coin $balance
    */ 
    public function setBalance(Coin $balance) 
    { 
       $this->balance = $balance;
    }
    /** 
    * @param Coin $spending
    */ 
    public function setSpending(Coin $spending) 
    { 
       $this->spending = $spending;
    }
    public function getBalance() 
    {
        return $this->balance;
    }
    public function getSpending() 
    {
        return $this->spending;
    }
    public function validate(\stdClass $data) 
    { 
        $this->balance = new Coin();
        $this->balance -> validate($data-> balance);
        $this->spending = new Coin();
        $this->spending -> validate($data-> spending);
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
