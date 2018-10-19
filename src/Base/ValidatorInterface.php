<?php
namespace PubliqAPI\Base;

interface ValidatorInterface
{
    public function validate(\stdClass $data);
}
