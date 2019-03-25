<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class IncompleteTransactionItem implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'signed_transaction' => ['name' => 'signedTransaction', 'convertToDate' => false],
    ];

    /**
    * @var SignedTransaction
    */ 
    private $signedTransaction;
    /** 
    * @param SignedTransaction $signedTransaction
    */ 
    public function setSignedTransaction(SignedTransaction $signedTransaction) 
    { 
       $this->signedTransaction = $signedTransaction;
    }
    public function getSignedTransaction() 
    {
        return $this->signedTransaction;
    }
    public function validate(\stdClass $data) 
    { 
        $this->signedTransaction = new SignedTransaction();
        $this->signedTransaction->validate($data->signed_transaction);
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
