<?php
namespace PubliqAPI\Base;

abstract class RewardType extends BasicEnum
{
    const fee = "fee";
    const initial = "initial";
    const miner = "miner";
    const channel = "channel";
    const storage = "storage";
    const author = "author";
} 
