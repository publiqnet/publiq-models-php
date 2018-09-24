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
        $vars['rtt'] = array_search($className, Rtt::types);

        foreach ($vars as  $name => $value)
        {
            $vars[(static::class)::getMemberName($name)] = $value;
        }
        return $vars;
    }
}
