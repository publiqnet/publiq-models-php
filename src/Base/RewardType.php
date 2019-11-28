<?php
namespace PubliqAPI\Base;

abstract class RewardType extends BasicEnum
{
    const initial = "initial";
    const miner = "miner";
    const author = "author";
    const channel = "channel";
    const storage = "storage";
    const sponsored_return = "sponsored_return";
} 
