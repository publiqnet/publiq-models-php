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
	7 => 'RewardInfo',
	8 => 'TransactionInfo',
	9 => 'BlockInfo',
	10 => 'Reward',
	11 => 'Transfer',
	12 => 'File',
	13 => 'Page',
	14 => 'DigestRequest',
	15 => 'Digest',
	16 => 'LoggedTransactionsRequest',
	17 => 'LoggedTransactions',
	18 => 'LoggedTransaction',
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
	37 => 'NotEnoughBalance',
	38 => 'TransactionDone',
	39 => 'FileNotFound',
	40 => 'RemoteError',
	41 => 'StorageFile',
	42 => 'StorageFileAddress',
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