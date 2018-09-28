<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class BlockInfo implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'authority' => ['name' => 'authority', 'convertToDate' => false],
        'block_hash' => ['name' => 'blockHash', 'convertToDate' => false],
        'sign_time' => ['name' => 'signTime', 'convertToDate' => true],
        'rewards' => ['name' => 'rewards', 'convertToDate' => false],
        'transactions' => ['name' => 'transactions', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $authority;
    /**
    * @var string
    */ 
    private $blockHash;
    /**
    * @var integer
    */ 
    private $signTime;
    /**
    * @var array
    */ 
    private $rewards = [];
    /**
    * @var array
    */ 
    private $transactions = [];
    /** 
    * @param string $authority
    */ 
    public function setAuthority(string $authority) 
    { 
       $this->authority = $authority;
    }
    /** 
    * @param string $blockHash
    */ 
    public function setBlockHash(string $blockHash) 
    { 
       $this->blockHash = $blockHash;
    }
    /** 
    * @param int $signTime
    */ 
    public function setSignTime(int $signTime) 
    { 
       $this->signTime = $signTime;
    }
    public function getAuthority() 
    {
        return $this->authority;
    }
    public function getBlockHash() 
    {
        return $this->blockHash;
    }
    public function getSignTime() 
    {
        return $this->signTime;
    }
    public function getRewards() 
    {
        return $this->rewards;
    }
    public function getTransactions() 
    {
        return $this->transactions;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setAuthority($data->authority); 
        $this->setBlockHash($data->block_hash); 
        $this->setSignTime(strtotime($data->sign_time)); 
          foreach ($data->rewards as $rewardsItem) { 
              $rewardsItemObj = new RewardInfo(); 
              $rewardsItemObj->validate($rewardsItem); 
              $this->rewards[] = $rewardsItemObj;
           } 
          foreach ($data->transactions as $transactionsItem) { 
              $transactionsItemObj = new TransactionInfo(); 
              $transactionsItemObj->validate($transactionsItem); 
              $this->transactions[] = $transactionsItemObj;
           } 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::memberNames);
    }

} 
