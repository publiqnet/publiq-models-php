<?php
namespace PubliqAPI\Base;

class Rtt
{
    CONST types = [
	0 => 'Broadcast',
	1 => 'Reward',
	2 => 'Transfer',
	3 => 'File',
	4 => 'Page',
	5 => 'Transaction',
	6 => 'SignedTransaction',
	7 => 'BlockHeader',
	8 => 'Block',
	9 => 'SignedBlock',
	10 => 'DigestRequest',
	11 => 'Digest',
	12 => 'ChainInfoRequest',
	13 => 'ChainInfo',
	14 => 'LoggedTransaction',
	15 => 'LoggedTransactionsRequest',
	16 => 'LoggedTransactions',
	17 => 'MasterKeyRequest',
	18 => 'MasterKey',
	19 => 'KeyPairRequest',
	20 => 'KeyPair',
	21 => 'SignRequest',
	22 => 'Signature',
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
	36 => 'LogTransaction',
	37 => 'RevertLastLoggedAction',
	38 => 'Shutdown',
	39 => 'StorageFile',
	40 => 'StorageFileAddress',
	41 => 'BlockchainFileData',
	42 => 'TransactionFileData',
	43 => 'StateFileData',
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
