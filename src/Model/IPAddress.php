<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\IPType;

class IPAddress implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'ip_type' => ['name' => 'ipType', 'convertToDate' => false, 'removeIfNull' => false],
        'local' => ['name' => 'local', 'convertToDate' => false, 'removeIfNull' => false],
        'remote' => ['name' => 'remote', 'convertToDate' => false, 'removeIfNull' => false],
    ];

    /**
    * @var string 
    */ 
    private $ipType;
    /**
    * @var IPDestination
    */ 
    private $local;
    /**
    * @var IPDestination
    */ 
    private $remote;
    /** 
    * @param string $ipType
    */ 
    public function setIpType(string $ipType) 
    { 
        IPType::validate($ipType);
        $this->ipType = $ipType;
    }
    /** 
    * @param IPDestination $local
    */ 
    public function setLocal(IPDestination $local) 
    { 
       $this->local = $local;
    }
    /** 
    * @param IPDestination $remote
    */ 
    public function setRemote(IPDestination $remote) 
    { 
       $this->remote = $remote;
    }
    public function getIpType() 
    {
        return $this->ipType;
    }
    public function getLocal() 
    {
        return $this->local;
    }
    public function getRemote() 
    {
        return $this->remote;
    }
    public function validate(\stdClass $data) 
    { 
        $this->local = new IPDestination();
        $this->local->validate($data->local);
        $this->remote = new IPDestination();
        $this->remote->validate($data->remote);
        $this->setIpType($data->ip_type); 
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
