<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Block implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'header' => ['name' => 'header', 'convertToDate' => false, 'removeIfNull' => false],
        'rewards' => ['name' => 'rewards', 'convertToDate' => false, 'removeIfNull' => false],
        'signed_transactions' => ['name' => 'signedTransactions', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var BlockHeader
    */ 
    private $header;
    /**
    * @var array
    */ 
    private $rewards = [];
    /**
    * @var array
    */ 
    private $signedTransactions = [];
    /** 
    * @param BlockHeader $header
    */ 
    public function setHeader(BlockHeader $header) 
    { 
       $this->header = $header;
    }
    public function getHeader() 
    {
        return $this->header;
    }
    public function getRewards() 
    {
        return $this->rewards;
    }
    public function getSignedTransactions() 
    {
        return $this->signedTransactions;
    }
    /**
    * @param Reward $rewardsItem
    */
    public function addRewards(Reward $rewardsItem)
    {
        $this->rewards[] = $rewardsItem;
    }
    /**
    * @param SignedTransaction $signedTransactionsItem
    */
    public function addSignedTransactions(SignedTransaction $signedTransactionsItem)
    {
        $this->signedTransactions[] = $signedTransactionsItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->header = new BlockHeader();
        $this->header->validate($data->header);
          foreach ($data->rewards as $rewardsItem) { 
              $rewardsItemObj = new Reward(); 
              $rewardsItemObj->validate($rewardsItem); 
              $this->rewards[] = $rewardsItemObj;
           } 
          foreach ($data->signed_transactions as $signedTransactionsItem) { 
              $signedTransactionsItemObj = new SignedTransaction(); 
              $signedTransactionsItemObj->validate($signedTransactionsItem); 
              $this->signedTransactions[] = $signedTransactionsItemObj;
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
