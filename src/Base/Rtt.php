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
	13 => 'Page',
	14 => 'Contract',
	15 => 'AddressInfo',
	16 => 'ArticleInfo',
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
	38 => 'Done',
	39 => 'InvalidPublicKey',
	40 => 'InvalidPrivateKey',
	41 => 'InvalidSignature',
	42 => 'InvalidAuthority',
	43 => 'NotEnoughBalance',
	44 => 'TransactionDone',
	45 => 'FileNotFound',
	46 => 'RemoteError',
	47 => 'StorageFile',
	48 => 'StorageFileAddress',
	49 => 'GetStorageFile',
	50 => 'IPDestination',
	51 => 'IPAddress',
	52 => 'Ping',
	53 => 'Pong',
	54 => 'TaskRequest',
	55 => 'TaskResponse',
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
    try {
        $className = 'PubliqAPI\\Model\\' . Rtt::types[$jsonObj->rtt];
        /**
        * @var ValidatorInterface $class
        */
        $class = new $className;
        $class->validate($jsonObj);
        return $class;
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
}