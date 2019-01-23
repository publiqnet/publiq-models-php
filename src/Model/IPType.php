<?php
namespace PubliqAPI\Model;

class IPType
{
    static any = 0;
    static ipv4 = 1;
    static ipv6 = 2;
 
    CONST  memberNames = [
        'any' => ['name' => 'any', 'convertToDate' => false],
        'ipv4' => ['name' => 'ipv4', 'convertToDate' => false],
        'ipv6' => ['name' => 'ipv6', 'convertToDate' => false],
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
            case 0: return "any";
            case 1: return "ipv4";
            case 2: return "ipv6";
        }
    } 

    public static function toInt(string $name)
    {
        switch ($name) {
            case "any": return 0;
            case "ipv4": return 1;
            case "ipv6": return 2;
        }
    } 

} 
