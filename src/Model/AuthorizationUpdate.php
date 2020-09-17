<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\UpdateType;

class AuthorizationUpdate implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'update_type' => ['name' => 'updateType', 'convertToDate' => false, 'removeIfNull' => false],
        'owner' => ['name' => 'owner', 'convertToDate' => false, 'removeIfNull' => false],
        'actor' => ['name' => 'actor', 'convertToDate' => false, 'removeIfNull' => false],
        'action_ids' => ['name' => 'actionIds', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string 
    */ 
    private $updateType;
    /**
    * @var string
    */ 
    private $owner;
    /**
    * @var string
    */ 
    private $actor;
    /**
    * @var array
    */ 
    private $actionIds = [];
    /** 
    * @param string $updateType
    */ 
    public function setUpdateType(string $updateType) 
    { 
        UpdateType::validate($updateType);
        $this->updateType = $updateType;
    }
    /** 
    * @param string $owner
    */ 
    public function setOwner(string $owner) 
    { 
       $this->owner = $owner;
    }
    /** 
    * @param string $actor
    */ 
    public function setActor(string $actor) 
    { 
       $this->actor = $actor;
    }
    public function getUpdateType() 
    {
        return $this->updateType;
    }
    public function getOwner() 
    {
        return $this->owner;
    }
    public function getActor() 
    {
        return $this->actor;
    }
    public function getActionIds() 
    {
        return $this->actionIds;
    }
    /**
    * @param int $actionIdsItem
    */
    public function addActionIds(int $actionIdsItem)
    {
        $this->actionIds[] = $actionIdsItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setOwner($data->owner); 
        $this->setActor($data->actor); 
          foreach ($data->action_ids as $actionIdsItem) { 
            $this->addActionIds($actionIdsItem);
           } 
        $this->setUpdateType($data->update_type); 
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
