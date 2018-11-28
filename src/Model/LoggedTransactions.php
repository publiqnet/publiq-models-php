<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class LoggedTransactions implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'actions' => ['name' => 'actions', 'convertToDate' => false, 'isEnum' => 'NULL'],
    ];

    /**
    * @var array
    */ 
    private $actions = [];
    public function getActions() 
    {
        return $this->actions;
    }
    public function validate(\stdClass $data) 
    { 
          foreach ($data->actions as $actionsItem) { 
              $actionsItemObj = new LoggedTransaction(); 
              $actionsItemObj->validate($actionsItem); 
              $this->actions[] = $actionsItemObj;
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
