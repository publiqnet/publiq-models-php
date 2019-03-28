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
        'authorizations' => ['name' => 'authorizations', 'convertToDate' => false],
    ];

    /**
    * @var Transaction
    */ 
    private $transactionDetails;
    /**
    * @var array
    */ 
    private $authorizations = [];
    /** 
    * @param Transaction $transactionDetails
    */ 
    public function setTransactionDetails(Transaction $transactionDetails) 
    { 
       $this->transactionDetails = $transactionDetails;
    }
    public function getTransactionDetails() 
    {
        return $this->transactionDetails;
    }
    public function getAuthorizations() 
    {
        return $this->authorizations;
    }
    /**
    * @param Authority $authorizationsItem
    */
    public function addAuthorizations(Authority $authorizationsItem)
    {
        $this->authorizations[] = $authorizationsItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->transactionDetails = new Transaction();
        $this->transactionDetails->validate($data->transaction_details);
          foreach ($data->authorizations as $authorizationsItem) { 
              $authorizationsItemObj = new Authority(); 
              $authorizationsItemObj->validate($authorizationsItem); 
              $this->authorizations[] = $authorizationsItemObj;
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
