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
        'header' => ['name' => 'header', 'convertToDate' => false],
        'rewards' => ['name' => 'rewards', 'convertToDate' => false],
        'signed_transactions' => ['name' => 'signedTransactions', 'convertToDate' => false],
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
    public function validate(\stdClass $data) 
    { 
        $this->header = new BlockHeader();
        $this->header -> validate($data-> header);
          foreach ($data->rewards as $rewardsItem) { 
              $rewardsItemObj = new Reward(); 
              $rewardsItemObj->validate($rewardsItem); 
              $this->rewards[] = $rewardsItemObj;
           } 
          foreach ($data->signedTransactions as $signedTransactionsItem) { 
              $signedTransactionsItemObj = new SignedTransaction(); 
              $signedTransactionsItemObj->validate($signedTransactionsItem); 
              $this->signedTransactions[] = $signedTransactionsItemObj;
           } 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
