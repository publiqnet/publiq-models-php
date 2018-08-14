<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
class BlockchainFileData implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST static memberNames = [
        'blocks' => 'blocks',
    ];

    /**
    * @var array
    */ 
    private $blocks = [];
    /**
    * @var string
    */
    private $blocksKey;
    /**
    * @param string  $blocksKey
    */
    public function setblocksKey(string  $blocksKey)
    {
        $this->blocksKey = $blocksKey;
    }
    public function getBlocks() 
    {
        return $this->blocks;
    }
    public function validate(\stdClass $data) 
    { 
        foreach ($data->blocks as $key => $value) {
            $this->setblocksKey($key);
            $this->blocks = Rtt::validate($data->blocks);
         }
    } 
    public static function getMemberName(string $camelCaseName)
    {
        return array_search($camelCaseName, self::$memberNames);
    }
} 
