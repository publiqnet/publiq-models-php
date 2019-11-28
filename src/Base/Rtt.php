<?php
namespace PubliqAPI\Base;

class Rtt
{
    CONST types = [
	0 => 'StorageOrder',
	1 => 'SignedStorageOrder',
	2 => 'Authority',
	3 => 'SignRequest',
	4 => 'VerificationResponse',
	5 => 'RemoteError',
  ];

/**
* @param string|object $jsonObj
* @return bool|string
*/
public static function validate($jsonObj)
{
    if (!is_object($jsonObj)) {
        $jsonObj = json_decode($jsonObj);
        if ($jsonObj === null) {
            return false;
        }
    }

    if (!isset($jsonObj->rtt)) {
        return false;
    }

    if (!isset(Rtt::types[$jsonObj->rtt])) {
        return false;
    }
    $className = 'PubliqAPI\\Model\\' . Rtt::types[$jsonObj->rtt];
    /**
    * @var ValidatorInterface $class
    */
    $class = new $className;
    $class->validate($jsonObj);
    return $class;

    }
}