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
        'block_details' => ['name' => 'blockDetails', 'convertToDate' => false, 'isEnum' => ''],
        'authority' => ['name' => 'authority', 'convertToDate' => false, 'isEnum' => ''],
        'signature' => ['name' => 'signature', 'convertToDate' => false, 'isEnum' => ''],
    ];

    /**
    * @var Block
    */ 
    private $blockDetails;
    /**
    * @var string
    */ 
    private $authority;
    /**
    * @var string
    */ 
    private $signature;
    /** 
    * @param Block $blockDetails
    */ 
    public function setBlockDetails(Block $blockDetails) 
    { 
       $this->blockDetails = $blockDetails;
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
    public function getBlockDetails() 
    {
        return $this->blockDetails;
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
        $this->blockDetails = new Block();
        $this->blockDetails -> validate($data-> block_details);
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
