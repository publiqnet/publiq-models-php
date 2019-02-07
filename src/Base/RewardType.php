<?php
namespace PubliqAPI\Base;

abstract class RewardType extends BasicEnum
{
    const fee = 0;
    const initial = 1;
    const miner = 2;
    const channel = 3;
    const storage = 4;
    const author = 5;
} 
