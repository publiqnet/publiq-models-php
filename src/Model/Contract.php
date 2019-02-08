<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\NodeType;

class Contract implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'owner' => ['name' => 'owner', 'convertToDate' => false],
        'role' => ['name' => 'role', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $owner;
    /**
    * @var string 
    */ 
    private $role;
    /** 
    * @param string $owner
    */ 
    public function setOwner(string $owner) 
    { 
       $this->owner = $owner;
    }
    /** 
    * @param string $role
    */ 
    public function setRole(string $role) 
    { 
       $this->role = $role;
    }
    public function getOwner() 
    {
        return $this->owner;
    }
    public function getRole() 
    {
        return $this->role;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setOwner($data->owner); 
        $this->setRole(NodeType::validate($data->role)); 
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