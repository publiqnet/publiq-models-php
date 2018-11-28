<?php
namespace PubliqAPI\Base;


trait RttSerializableTrait
{
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        $path = explode('\\', static::class);
        $className = array_pop($path);
        if (!$className) {
            throw new \Exception("Cannot find class in rtt list");
        }
        $vars2['rtt'] = array_search($className, Rtt::types);

        foreach ($vars as  $name => $value)
        {
            $member = (static::class)::getMemberName($name);
            if ($member['convertToDate']) {
                $vars2[$member['key']] = date("Y-m-d H:i:s", $value);
            } elseif ($member['isEnam'] != 'NULL') {
                $vars2[$member['key']] = $member['isEnam'].toString($value);
            } else {
                $vars2[$member['key']] = $value;
            }
        }
        return $vars2;
    }
}

