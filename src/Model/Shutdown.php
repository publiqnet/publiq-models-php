<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class Shutdown implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
    public function validate(\stdClass $data) 
    { 
    } 
    public static function getMemberName(string $camelCaseName)     {

        $memberNames = [
        ];
        return array_search($camelCaseName, $memberNames);    }
} 
