<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class IncompleteTransactions implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'incomplete_signed_transactions' => ['name' => 'incompleteSignedTransactions', 'convertToDate' => false],
    ];

    /**
    * @var array
    */ 
    private $incompleteSignedTransactions = [];
    public function getIncompleteSignedTransactions() 
    {
        return $this->incompleteSignedTransactions;
    }
    /**
    * @param SignedTransaction $incompleteSignedTransactionsItem
    */
    public function addIncompleteSignedTransactions(SignedTransaction $incompleteSignedTransactionsItem)
    {
        $this->incompleteSignedTransactions[] = $incompleteSignedTransactionsItem;
    }
    public function validate(\stdClass $data) 
    { 
          foreach ($data->incomplete_signed_transactions as $incompleteSignedTransactionsItem) { 
              $incompleteSignedTransactionsItemObj = new SignedTransaction(); 
              $incompleteSignedTransactionsItemObj->validate($incompleteSignedTransactionsItem); 
              $this->incompleteSignedTransactions[] = $incompleteSignedTransactionsItemObj;
           } 
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
