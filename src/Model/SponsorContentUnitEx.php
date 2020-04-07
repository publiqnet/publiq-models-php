<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\SponsorType;

class SponsorContentUnitEx implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'type' => ['name' => 'type', 'convertToDate' => false],
        'sponsor_address' => ['name' => 'sponsorAddress', 'convertToDate' => false],
        'uri' => ['name' => 'uri', 'convertToDate' => false],
        'start_time_point' => ['name' => 'startTimePoint', 'convertToDate' => true],
        'hours' => ['name' => 'hours', 'convertToDate' => false],
        'amount' => ['name' => 'amount', 'convertToDate' => false],
    ];

    /**
    * @var string 
    */ 
    private $type;
    /**
    * @var string
    */ 
    private $sponsorAddress;
    /**
    * @var string
    */ 
    private $uri;
    /**
    * @var integer
    */ 
    private $startTimePoint;
    /**
    * @var int
    */ 
    private $hours;
    /**
    * @var Coin
    */ 
    private $amount;
    /** 
    * @param string $type
    */ 
    public function setType(string $type) 
    { 
        SponsorType::validate($type);
        $this->type = $type;
    }
    /** 
    * @param string $sponsorAddress
    */ 
    public function setSponsorAddress(string $sponsorAddress) 
    { 
       $this->sponsorAddress = $sponsorAddress;
    }
    /** 
    * @param string $uri
    */ 
    public function setUri(string $uri) 
    { 
       $this->uri = $uri;
    }
    /** 
    * @param int $startTimePoint
    */ 
    public function setStartTimePoint(int $startTimePoint) 
    { 
       $this->startTimePoint = $startTimePoint;
    }
    /** 
    * @param int $hours
    */ 
    public function setHours(int $hours) 
    { 
       $this->hours = $hours;
    }
    /** 
    * @param Coin $amount
    */ 
    public function setAmount(Coin $amount) 
    { 
       $this->amount = $amount;
    }
    public function getType() 
    {
        return $this->type;
    }
    public function getSponsorAddress() 
    {
        return $this->sponsorAddress;
    }
    public function getUri() 
    {
        return $this->uri;
    }
    public function getStartTimePoint() 
    {
        return $this->startTimePoint;
    }
    public function getHours() 
    {
        return $this->hours;
    }
    public function getAmount() 
    {
        return $this->amount;
    }
    public function validate(\stdClass $data) 
    { 
        $this->amount = new Coin();
        $this->amount->validate($data->amount);
        $this->setSponsorAddress($data->sponsor_address); 
        $this->setUri($data->uri); 
        $this->setStartTimePoint(strtotime($data->start_time_point)); 
        $this->setHours($data->hours); 
        $this->setType($data->type); 
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
