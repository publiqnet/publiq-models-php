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
    /**
    * @var BlockHeader
    */ 
    private $header;
    /**
    * @var array
    */ 
    private $rewards;
    /**
    * @var array
    */ 
    private $signed_transactions;
    public function getHeader() 
    {
        return $this->header;
    }
    public function getRewards() 
    {
        return $this->rewards;
    }
    public function getSigned_transactions() 
    {
        return $this->signed_transactions;
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
          foreach ($data->signed_transactions as $signed_transactionsItem) { 
              $signed_transactionsItemObj = new SignedTransaction(); 
              $signed_transactionsItemObj->validate($signed_transactionsItem); 
              $this->signed_transactions[] = $signed_transactionsItemObj;
           } 
    } 
} 
