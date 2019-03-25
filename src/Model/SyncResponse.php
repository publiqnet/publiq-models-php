<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class SyncResponse implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'own_header' => ['name' => 'ownHeader', 'convertToDate' => false],
        'promised_header' => ['name' => 'promisedHeader', 'convertToDate' => false],
    ];

    /**
    * @var BlockHeaderExtended
    */ 
    private $ownHeader;
    /**
    * @var BlockHeaderExtended
    */ 
    private $promisedHeader;
    /** 
    * @param BlockHeaderExtended $ownHeader
    */ 
    public function setOwnHeader(BlockHeaderExtended $ownHeader) 
    { 
       $this->ownHeader = $ownHeader;
    }
    /** 
    * @param BlockHeaderExtended $promisedHeader
    */ 
    public function setPromisedHeader(BlockHeaderExtended $promisedHeader) 
    { 
       $this->promisedHeader = $promisedHeader;
    }
    public function getOwnHeader() 
    {
        return $this->ownHeader;
    }
    public function getPromisedHeader() 
    {
        return $this->promisedHeader;
    }
    public function validate(\stdClass $data) 
    { 
        $this->ownHeader = new BlockHeaderExtended();
        $this->ownHeader->validate($data->own_header);
        $this->promisedHeader = new BlockHeaderExtended();
        $this->promisedHeader->validate($data->promised_header);
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
