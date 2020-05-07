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
        'uri' => ['name' => 'uri', 'convertToDate' => false, 'removeIfNull' => false],
        'author_addresses' => ['name' => 'authorAddresses', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var array
    */ 
    private $authorAddresses = [];
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function getAuthorAddresses() 
    {
        return $this->authorAddresses;
    }
    /**
    * @param string $authorAddressesItem
    */
    public function addAuthorAddresses(string $authorAddressesItem)
    {
        $this->authorAddresses[] = $authorAddressesItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUri($data->uri); 
          foreach ($data->author_addresses as $authorAddressesItem) { 
            $this->addAuthorAddresses($authorAddressesItem);
           } 
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
