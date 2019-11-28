<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class TransactionBroadcastRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'transaction_details' => ['name' => 'transactionDetails', 'convertToDate' => false],
        'private_key' => ['name' => 'privateKey', 'convertToDate' => false],
    ];

    /**
    * @var Transaction
    */ 
    private $transactionDetails;
    /**
    * @var string
    */ 
    private $privateKey;
    /** 
    * @param Transaction $transactionDetails
    */ 
    public function setTransactionDetails(Transaction $transactionDetails) 
    { 
       $this->transactionDetails = $transactionDetails;
    }
    /** 
    * @param string $privateKey
    */ 
    public function setPrivateKey(string $privateKey) 
    { 
       $this->privateKey = $privateKey;
    }
    public function getTransactionDetails() 
    {
        return $this->transactionDetails;
    }
    public function getPrivateKey() 
    {
        return $this->privateKey;
    }
    public function validate(\stdClass $data) 
    { 
        $this->transactionDetails = new Transaction();
        $this->transactionDetails->validate($data->transaction_details);
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
