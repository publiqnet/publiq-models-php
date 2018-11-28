<?php
namespace PubliqAPI\Model;

class NodeType
{
    static miner = 0;
    static channel = 1;
    static storage = 2;
 
    CONST  memberNames = [
        'miner' => ['name' => 'miner', 'convertToDate' => false],
        'channel' => ['name' => 'channel', 'convertToDate' => false],
        'storage' => ['name' => 'storage', 'convertToDate' => false],
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
            case 0: return "miner";
            case 1: return "channel";
            case 2: return "storage";
        }
    } 

    public static function toInt(string $name)
    {
        switch ($name) {
            case "miner": return 0;
            case "channel": return 1;
            case "storage": return 2;
        }
    } 

} 
