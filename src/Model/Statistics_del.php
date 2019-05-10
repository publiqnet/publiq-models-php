<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Statistics_del implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'data' => ['name' => 'data', 'convertToDate' => false],
    ];

    /**
    * @var ServiceStatistics
    */ 
    private $data;
    /** 
    * @param ServiceStatistics $data
    */ 
    public function setData(ServiceStatistics $data) 
    { 
       $this->data = $data;
    }
    public function getData() 
    {
        return $this->data;
    }
    public function validate(\stdClass $data) 
    { 
        $this->data = new ServiceStatistics();
        $this->data->validate($data->data);
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
