<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class MasterKeyRequest implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST memberNames = [
    ];

    public function validate(\stdClass $data) 
    { 
    } 
    public function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, $this->$memberNames);
    }
} 
