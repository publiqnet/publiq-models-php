<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class SignedBlock implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'block_details' => ['name' => 'blockDetails', 'convertToDate' => false, 'removeIfNull' => false],
        'authorization' => ['name' => 'authorization', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var Block
    */ 
    private $blockDetails;
    /**
    * @var Authority
    */ 
    private $authorization;
    /** 
    * @param Block $blockDetails
    */ 
    public function setBlockDetails(Block $blockDetails) 
    { 
       $this->blockDetails = $blockDetails;
    }
    /** 
    * @param Authority $authorization
    */ 
    public function setAuthorization(Authority $authorization) 
    { 
       $this->authorization = $authorization;
    }
    public function getBlockDetails() 
    {
        return $this->blockDetails;
    }
    public function getAuthorization() 
    {
        return $this->authorization;
    }
    public function validate(\stdClass $data) 
    { 
        $this->blockDetails = new Block();
        $this->blockDetails->validate($data->block_details);
        $this->authorization = new Authority();
        $this->authorization->validate($data->authorization);
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
