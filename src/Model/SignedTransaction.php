<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class SignedTransaction implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'transaction_details' => ['name' => 'transactionDetails', 'convertToDate' => false],
        'authority' => ['name' => 'authority', 'convertToDate' => false],
        'signature' => ['name' => 'signature', 'convertToDate' => false],
    ];

    /**
    * @var Transaction
    */ 
    private $transactionDetails;
    /**
    * @var string
    */ 
    private $authority;
    /**
    * @var string
    */ 
    private $signature;
    /** 
    * @param Transaction $transactionDetails
    */ 
    public function setTransactionDetails(Transaction $transactionDetails) 
    { 
       $this->transactionDetails = $transactionDetails;
    }
    /** 
    * @param string $authority
    */ 
    public function setAuthority(string $authority) 
    { 
       $this->authority = $authority;
    }
    /** 
    * @param string $signature
    */ 
    public function setSignature(string $signature) 
    { 
       $this->signature = $signature;
    }
    public function getTransactionDetails() 
    {
        return $this->transactionDetails;
    }
    public function getAuthority() 
    {
        return $this->authority;
    }
    public function getSignature() 
    {
        return $this->signature;
    }
    public function validate(\stdClass $data) 
    { 
        $this->transactionDetails = new Transaction();
        $this->transactionDetails -> validate($data-> transaction_details);
        $this->setAuthority($data->authority); 
        $this->setSignature($data->signature); 
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
