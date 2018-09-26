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
	11 => 'DigestRequest',
	12 => 'Digest',
	13 => 'LoggedTransaction',
	14 => 'LoggedTransactionsRequest',
	15 => 'LoggedTransactions',
	16 => 'MasterKeyRequest',
	17 => 'MasterKey',
	18 => 'KeyPairRequest',
	19 => 'KeyPair',
	20 => 'SignRequest',
	21 => 'Signature',
	22 => 'SyncInfo',
	23 => 'SyncRequest',
	24 => 'SyncResponse',
	25 => 'BlockHeaderRequest',
	26 => 'BlockHeaderResponse',
	27 => 'BlockChainRequest',
	28 => 'BlockChainResponse',
	29 => 'Done',
	30 => 'InvalidPublicKey',
	31 => 'InvalidPrivateKey',
	32 => 'InvalidSignature',
	33 => 'InvalidAuthority',
	34 => 'FileNotFound',
	35 => 'RemoteError',
	36 => 'BlockInfo',
	37 => 'RewardInfo',
	38 => 'TransactionInfo',
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