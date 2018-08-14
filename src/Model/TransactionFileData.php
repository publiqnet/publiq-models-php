<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class TransactionFileData implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST static memberNames = [
        'actions' => 'actions',
    ];

    /**
    * @var array
    */ 
    private $actions = [];
    /**
    * @var string
    */
    private $actionsKey;
    /**
    * @param string  $actionsKey
    */
    public function setactionsKey(string  $actionsKey)
    {
        $this->actionsKey = $actionsKey;
    }
    public function getActions() 
    {
        return $this->actions;
    }
    public function validate(\stdClass $data) 
    { 
        foreach ($data->actions as $key => $value) {
            $this->setactionsKey($key);
            $this->actions = Rtt::validate($data->actions);
         }
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::$memberNames);
    }
} 
