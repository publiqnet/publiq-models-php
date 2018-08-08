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
	13 => 'ChainInfoRequest',
	14 => 'ChainInfo',
	15 => 'LoggedTransaction',
	16 => 'LoggedTransactionsRequest',
	17 => 'LoggedTransactions',
	18 => 'MasterKeyRequest',
	19 => 'MasterKey',
	20 => 'KeyPairRequest',
	21 => 'KeyPair',
	22 => 'SignRequest',
	23 => 'Signature',
	24 => 'SyncRequest',
	25 => 'SyncResponse',
	26 => 'BlockHeaderRequest',
	27 => 'BlockHeaderResponse',
	28 => 'BlockChainRequest',
	29 => 'BlockChainResponse',
	30 => 'Done',
	31 => 'InvalidPublicKey',
	32 => 'InvalidPrivateKey',
	33 => 'InvalidSignature',
	34 => 'InvalidAuthority',
	35 => 'FileNotFound',
	36 => 'RemoteError',
	37 => 'LogTransaction',
	38 => 'RevertLastLoggedAction',
	39 => 'Shutdown',
	40 => 'StorageFile',
	41 => 'StorageFileAddress',
	42 => 'BlockchainFileData',
	43 => 'TransactionFileData',
	44 => 'StateFileData',
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
