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
	22 => 'SyncRequest',
	23 => 'SyncResponse',
	24 => 'BlockHeaderRequest',
	25 => 'BlockHeaderResponse',
	26 => 'BlockChainRequest',
	27 => 'BlockChainResponse',
	28 => 'Done',
	29 => 'InvalidPublicKey',
	30 => 'InvalidPrivateKey',
	31 => 'InvalidSignature',
	32 => 'InvalidAuthority',
	33 => 'FileNotFound',
	34 => 'RemoteError',
	35 => 'LogTransaction',
	36 => 'RevertLastLoggedAction',
	37 => 'Shutdown',
	38 => 'StorageFile',
	39 => 'StorageFileAddress',
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
