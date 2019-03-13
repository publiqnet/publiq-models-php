<?php
namespace PubliqAPI\Base;

class Rtt
{
    CONST types = [
	0 => 'Coin',
	1 => 'Broadcast',
	2 => 'Transaction',
	3 => 'SignedTransaction',
	4 => 'BlockHeader',
	5 => 'Block',
	6 => 'SignedBlock',
	7 => 'RewardLog',
	8 => 'TransactionLog',
	9 => 'BlockLog',
	10 => 'Reward',
	11 => 'Transfer',
	12 => 'File',
	13 => 'ContentUnit',
	14 => 'Content',
	15 => 'Role',
	16 => 'AddressInfo',
	17 => 'ContentInfo',
	18 => 'StatItem',
	19 => 'StatInfo',
	20 => 'DigestRequest',
	21 => 'Digest',
	22 => 'LoggedTransactionsRequest',
	23 => 'LoggedTransactions',
	24 => 'LoggedTransaction',
	25 => 'MasterKeyRequest',
	26 => 'MasterKey',
	27 => 'KeyPairRequest',
	28 => 'KeyPair',
	29 => 'SignRequest',
	30 => 'Signature',
	31 => 'SyncInfo',
	32 => 'SyncRequest',
	33 => 'SyncResponse',
	34 => 'BlockHeaderRequest',
	35 => 'BlockHeaderResponse',
	36 => 'BlockchainRequest',
	37 => 'BlockchainResponse',
	38 => 'SyncRequest2',
	39 => 'SyncResponse2',
	40 => 'BlockHeaderRequest2',
	41 => 'BlockHeaderResponse2',
	42 => 'BlockchainRequest2',
	43 => 'BlockchainResponse2',
	44 => 'Done',
	45 => 'InvalidPublicKey',
	46 => 'InvalidPrivateKey',
	47 => 'InvalidSignature',
	48 => 'InvalidAuthority',
	49 => 'NotEnoughBalance',
	50 => 'TooLongString',
	51 => 'FileNotFound',
	52 => 'RemoteError',
	53 => 'StorageFile',
	54 => 'StorageFileAddress',
	55 => 'GetStorageFile',
	56 => 'IPDestination',
	57 => 'IPAddress',
	58 => 'Ping',
	59 => 'Pong',
	60 => 'TaskRequest',
	61 => 'TaskResponse',
  ];

/**
* @param string|object $jsonObj
* @return bool|string
*/
public static function validate($jsonObj)
{
    if (!is_object($jsonObj)) {
        $jsonObj = json_decode($jsonObj);
        if ($jsonObj === null) {
            return false;
        }
    }

    if (!isset($jsonObj->rtt)) {
        return false;
    }

    if (!isset(Rtt::types[$jsonObj->rtt])) {
        return false;
    }
    $className = 'PubliqAPI\\Model\\' . Rtt::types[$jsonObj->rtt];
    /**
    * @var ValidatorInterface $class
    */
    $class = new $className;
    $class->validate($jsonObj);
    return $class;

    }
}