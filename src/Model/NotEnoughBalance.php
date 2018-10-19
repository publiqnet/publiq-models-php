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
        'balance' => '['name' => 'balance', 'convertToDate' => false],
        'spending' => '['name' => 'spending', 'convertToDate' => false],
    ];

    /**
    * @var Coin
    */ 
    private $balance;
    /**
    * @var Coin
    */ 
    private $spending;
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
        return array_search($camelCaseName, self::memberNames);
    }

} 
