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
	17 => 'ArticleInfo',
	18 => 'ContentInfo',
	19 => 'StatItem',
	20 => 'StatInfo',
	21 => 'DigestRequest',
	22 => 'Digest',
	23 => 'LoggedTransactionsRequest',
	24 => 'LoggedTransactions',
	25 => 'LoggedTransaction',
	26 => 'MasterKeyRequest',
	27 => 'MasterKey',
	28 => 'KeyPairRequest',
	29 => 'KeyPair',
	30 => 'SignRequest',
	31 => 'Signature',
	32 => 'SyncInfo',
	33 => 'SyncRequest',
	34 => 'SyncResponse',
	35 => 'BlockHeaderRequest',
	36 => 'BlockHeaderResponse',
	37 => 'BlockchainRequest',
	38 => 'BlockchainResponse',
	39 => 'Done',
	40 => 'InvalidPublicKey',
	41 => 'InvalidPrivateKey',
	42 => 'InvalidSignature',
	43 => 'InvalidAuthority',
	44 => 'NotEnoughBalance',
	45 => 'TooLongString',
	46 => 'FileNotFound',
	47 => 'RemoteError',
	48 => 'StorageFile',
	49 => 'StorageFileAddress',
	50 => 'GetStorageFile',
	51 => 'IPDestination',
	52 => 'IPAddress',
	53 => 'Ping',
	54 => 'Pong',
	55 => 'TaskRequest',
	56 => 'TaskResponse',
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