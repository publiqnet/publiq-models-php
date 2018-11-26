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

    public static function toString()
    {
        switch (self) {
            case self::miner: return "miner";
            case self::channel: return "channel";
            case self::storage: return "storage";
        }
    } 

    public static function toEnum(string $name)
    {
        switch ($name) {
            case "miner": return NodeType::miner;
            case "channel": return NodeType::channel;
            case "storage": return NodeType::storage;
        }
    } 

} 
