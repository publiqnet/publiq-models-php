<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class TransactionDone implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'tx_hash' => ['name' => 'txHash', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $txHash;
    /** 
    * @param string $txHash
    */ 
    public function setTxHash(string $txHash) 
    { 
       $this->txHash = $txHash;
    }
    public function getTxHash() 
    {
        return $this->txHash;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setTxHash($data->tx_hash); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        foreach (self::memberNames as $key => $value) {
               if ($value['name'] == $camelCaseName) {
                   $value['key'] = $key;
                   return $value;
               }
       }
    }

} 
