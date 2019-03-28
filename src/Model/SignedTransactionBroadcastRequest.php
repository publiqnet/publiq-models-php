<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class SignedTransactionBroadcastRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'signed_transaction' => ['name' => 'signedTransaction', 'convertToDate' => false],
        'private_key' => ['name' => 'privateKey', 'convertToDate' => false],
    ];

    /**
    * @var SignedTransaction
    */ 
    private $signedTransaction;
    /**
    * @var string
    */ 
    private $privateKey;
    /** 
    * @param SignedTransaction $signedTransaction
    */ 
    public function setSignedTransaction(SignedTransaction $signedTransaction) 
    { 
       $this->signedTransaction = $signedTransaction;
    }
    /** 
    * @param string $privateKey
    */ 
    public function setPrivateKey(string $privateKey) 
    { 
       $this->privateKey = $privateKey;
    }
    public function getSignedTransaction() 
    {
        return $this->signedTransaction;
    }
    public function getPrivateKey() 
    {
        return $this->privateKey;
    }
    public function validate(\stdClass $data) 
    { 
        $this->signedTransaction = new SignedTransaction();
        $this->signedTransaction->validate($data->signed_transaction);
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
