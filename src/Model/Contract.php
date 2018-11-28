<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Contract implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'owner' => ['name' => 'owner', 'convertToDate' => false, 'isEnum' => 'NULL'],
        'role' => ['name' => 'role', 'convertToDate' => false,'isEnum' => 'NodeType'],
    ];

    /**
    * @var string
    */ 
    private $owner;
    /**
    * @var int 
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
    * @param int $role
    */ 
    public function setRole(int $role) 
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
        $this->setgRole(NodeType.toInt($data->role)); 
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
