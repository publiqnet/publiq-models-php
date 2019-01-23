<?php
namespace PubliqAPI\Model;

class LoggingType
{
    static apply = 0;
    static revert = 1;
 
    CONST  memberNames = [
        'apply' => ['name' => 'apply', 'convertToDate' => false],
        'revert' => ['name' => 'revert', 'convertToDate' => false],
    ];

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

    public static function toString(int $value)
    {
        switch ($value) {
            case 0: return "apply";
            case 1: return "revert";
        }
    } 

    public static function toInt(string $name)
    {
        switch ($name) {
            case "apply": return 0;
            case "revert": return 1;
        }
    } 

} 
