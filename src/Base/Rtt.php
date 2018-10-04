<?php
namespace PubliqAPI\Base;

class Rtt
{
    CONST types = [
	0 => 'Coin',
	1 => 'Broadcast',
	2 => 'Reward',
	3 => 'Transfer',
	4 => 'File',
	5 => 'Page',
	6 => 'Transaction',
	7 => 'SignedTransaction',
	8 => 'BlockHeader',
	9 => 'Block',
	10 => 'SignedBlock',
	11 => 'RewardInfo',
	12 => 'TransactionInfo',
	13 => 'BlockInfo',
	14 => 'DigestRequest',
	15 => 'Digest',
	16 => 'LoggedTransaction',
	17 => 'LoggedTransactionsRequest',
	18 => 'LoggedTransactions',
	19 => 'MasterKeyRequest',
	20 => 'MasterKey',
	21 => 'KeyPairRequest',
	22 => 'KeyPair',
	23 => 'SignRequest',
	24 => 'Signature',
	25 => 'SyncInfo',
	26 => 'SyncRequest',
	27 => 'SyncResponse',
	28 => 'BlockHeaderRequest',
	29 => 'BlockHeaderResponse',
	30 => 'BlockChainRequest',
	31 => 'BlockChainResponse',
	32 => 'Done',
	33 => 'InvalidPublicKey',
	34 => 'InvalidPrivateKey',
	35 => 'InvalidSignature',
	36 => 'InvalidAuthority',
	37 => 'FileNotFound',
	38 => 'RemoteError',
	39 => 'StorageFile',
	40 => 'StorageFileAddress',
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