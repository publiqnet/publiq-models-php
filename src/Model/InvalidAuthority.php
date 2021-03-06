<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class InvalidAuthority implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'authority_provided' => ['name' => 'authorityProvided', 'convertToDate' => false, 'removeIfNull' => false],
        'authority_required' => ['name' => 'authorityRequired', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $authorityProvided;
    /**
    * @var string
    */ 
    private $authorityRequired;
    /** 
    * @param string $authorityProvided
    */ 
    public function setAuthorityProvided(string $authorityProvided) 
    { 
       $this->authorityProvided = $authorityProvided;
    }
    /** 
    * @param string $authorityRequired
    */ 
    public function setAuthorityRequired(string $authorityRequired) 
    { 
       $this->authorityRequired = $authorityRequired;
    }
    public function getAuthorityProvided() 
    {
        return $this->authorityProvided;
    }
    public function getAuthorityRequired() 
    {
        return $this->authorityRequired;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setAuthorityProvided($data->authority_provided); 
        $this->setAuthorityRequired($data->authority_required); 
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
