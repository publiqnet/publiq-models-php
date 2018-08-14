<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class LogTransaction implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST static memberNames = [
        'action' => 'action',
    ];

    /**
    * @var mixed 
    */ 
    private $action;
    public function getAction() 
    {
        return $this->action;
    }
    public function validate(\stdClass $data) 
    { 
          $this->action = Rtt::validate($data->action);
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::$memberNames);
    }
} 
