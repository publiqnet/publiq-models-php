<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\UriProblemType;

class UriError implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'uri' => ['name' => 'uri', 'convertToDate' => false],
        'uri_problem_type' => ['name' => 'uriProblemType', 'convertToDate' => false],
    ];

    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var string 
    */ 
    private $uriProblemType;
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    /** 
    * @param string $uriProblemType
    */ 
    public function setUriProblemType(string $uriProblemType) 
    { 
        UriProblemType::validate($uriProblemType);
        $this->uriProblemType = $uriProblemType;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function getUriProblemType() 
    {
        return $this->uriProblemType;
    }
    public function validate(\stdClass $data) 
    { 
        $this->setUri($data->uri); 
        $this->setUriProblemType($data->uri_problem_type); 
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
