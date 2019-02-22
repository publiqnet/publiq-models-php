<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;

class File implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'author_address' => ['name' => 'authorAddress', 'convertToDate' => false],
        'uri' => ['name' => 'uri', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $authorAddress;
    /**
    * @var string
    */ 
    private $uri;
    /** 
    * @param string $authorAddress
    */ 
    public function setAuthorAddress(string $authorAddress) 
    { 
       $this->authorAddress = $authorAddress;
    }
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    public function getAuthorAddress() 
    {
        return $this->authorAddress;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setAuthorAddress($data->author_address); 
        $this->setUri($data->uri); 
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
