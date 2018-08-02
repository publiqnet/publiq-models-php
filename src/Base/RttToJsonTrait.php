<?php
namespace PubliqAPI\Base;

trait RttToJsonTrait
{
    public function convertToJson()
    {
        return json_encode($this);
    }
}
