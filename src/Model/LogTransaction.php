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
    public static function getMemberName(string $camelCaseName)     {

        $memberNames = [
        'action' => 'action',
        ];
        return array_search($camelCaseName, $memberNames);    }
} 
