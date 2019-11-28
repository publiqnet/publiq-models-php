<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class BlockLog implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'authority' => ['name' => 'authority', 'convertToDate' => false],
        'block_hash' => ['name' => 'blockHash', 'convertToDate' => false],
        'block_number' => ['name' => 'blockNumber', 'convertToDate' => false],
        'block_size' => ['name' => 'blockSize', 'convertToDate' => false],
        'time_signed' => ['name' => 'timeSigned', 'convertToDate' => true],
        'rewards' => ['name' => 'rewards', 'convertToDate' => false],
        'transactions' => ['name' => 'transactions', 'convertToDate' => false],
        'unit_uri_impacts' => ['name' => 'unitUriImpacts', 'convertToDate' => false],
        'applied_sponsor_items' => ['name' => 'appliedSponsorItems', 'convertToDate' => false],
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
    * @var int
    */ 
    private $blockNumber;
    /**
    * @var int
    */ 
    private $blockSize;
    /**
    * @var integer
    */ 
    private $timeSigned;
    /**
    * @var array
    */ 
    private $rewards = [];
    /**
    * @var array
    */ 
    private $transactions = [];
    /**
    * @var array
    */ 
    private $unitUriImpacts = [];
    /**
    * @var array
    */ 
    private $appliedSponsorItems = [];
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
    * @param int $blockNumber
    */ 
    public function setBlockNumber(int $blockNumber) 
    { 
       $this->blockNumber = $blockNumber;
    }
    /** 
    * @param int $blockSize
    */ 
    public function setBlockSize(int $blockSize) 
    { 
       $this->blockSize = $blockSize;
    }
    /** 
    * @param int $timeSigned
    */ 
    public function setTimeSigned(int $timeSigned) 
    { 
       $this->timeSigned = $timeSigned;
    }
    public function getAuthority() 
    {
        return $this->authority;
    }
    public function getBlockHash() 
    {
        return $this->blockHash;
    }
    public function getBlockNumber() 
    {
        return $this->blockNumber;
    }
    public function getBlockSize() 
    {
        return $this->blockSize;
    }
    public function getTimeSigned() 
    {
        return $this->timeSigned;
    }
    public function getRewards() 
    {
        return $this->rewards;
    }
    public function getTransactions() 
    {
        return $this->transactions;
    }
    public function getUnitUriImpacts() 
    {
        return $this->unitUriImpacts;
    }
    public function getAppliedSponsorItems() 
    {
        return $this->appliedSponsorItems;
    }
    /**
    * @param RewardLog $rewardsItem
    */
    public function addRewards(RewardLog $rewardsItem)
    {
        $this->rewards[] = $rewardsItem;
    }
    /**
    * @param TransactionLog $transactionsItem
    */
    public function addTransactions(TransactionLog $transactionsItem)
    {
        $this->transactions[] = $transactionsItem;
    }
    /**
    * @param ContentUnitImpactLog $unitUriImpactsItem
    */
    public function addUnitUriImpacts(ContentUnitImpactLog $unitUriImpactsItem)
    {
        $this->unitUriImpacts[] = $unitUriImpactsItem;
    }
    /**
    * @param SponsorContentUnitApplied $appliedSponsorItemsItem
    */
    public function addAppliedSponsorItems(SponsorContentUnitApplied $appliedSponsorItemsItem)
    {
        $this->appliedSponsorItems[] = $appliedSponsorItemsItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setAuthority($data->authority); 
        $this->setBlockHash($data->block_hash); 
        $this->setBlockNumber($data->block_number); 
        $this->setBlockSize($data->block_size); 
        $this->setTimeSigned(strtotime($data->time_signed)); 
          foreach ($data->rewards as $rewardsItem) { 
              $rewardsItemObj = new RewardLog(); 
              $rewardsItemObj->validate($rewardsItem); 
              $this->rewards[] = $rewardsItemObj;
           } 
          foreach ($data->transactions as $transactionsItem) { 
              $transactionsItemObj = new TransactionLog(); 
              $transactionsItemObj->validate($transactionsItem); 
              $this->transactions[] = $transactionsItemObj;
           } 
          foreach ($data->unit_uri_impacts as $unitUriImpactsItem) { 
              $unitUriImpactsItemObj = new ContentUnitImpactLog(); 
              $unitUriImpactsItemObj->validate($unitUriImpactsItem); 
              $this->unitUriImpacts[] = $unitUriImpactsItemObj;
           } 
          foreach ($data->applied_sponsor_items as $appliedSponsorItemsItem) { 
              $appliedSponsorItemsItemObj = new SponsorContentUnitApplied(); 
              $appliedSponsorItemsItemObj->validate($appliedSponsorItemsItem); 
              $this->appliedSponsorItems[] = $appliedSponsorItemsItemObj;
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
