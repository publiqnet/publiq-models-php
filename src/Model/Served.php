<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class Served implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'file_uri' => ['name' => 'fileUri', 'convertToDate' => false],
        'content_unit_uri' => ['name' => 'contentUnitUri', 'convertToDate' => false],
        'peer_address' => ['name' => 'peerAddress', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $fileUri;
    /**
    * @var string
    */ 
    private $contentUnitUri;
    /**
    * @var string
    */ 
    private $peerAddress;
    /** 
    * @param string $fileUri
    */ 
    public function setFileUri(string $fileUri) 
    { 
       $this->fileUri = $fileUri;
    }
    /** 
    * @param string $contentUnitUri
    */ 
    public function setContentUnitUri(string $contentUnitUri) 
    { 
       $this->contentUnitUri = $contentUnitUri;
    }
    /** 
    * @param string $peerAddress
    */ 
    public function setPeerAddress(string $peerAddress) 
    { 
       $this->peerAddress = $peerAddress;
    }
    public function getFileUri() 
    {
        return $this->fileUri;
    }
    public function getContentUnitUri() 
    {
        return $this->contentUnitUri;
    }
    public function getPeerAddress() 
    {
        return $this->peerAddress;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setFileUri($data->file_uri); 
        $this->setContentUnitUri($data->content_unit_uri); 
        $this->setPeerAddress($data->peer_address); 
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
