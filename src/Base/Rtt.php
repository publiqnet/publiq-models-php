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
	25 => 'ConsensusRequest',
	26 => 'ConsensusResponse',
	27 => 'BlockHeaderRequest',
	28 => 'BlockHeaderResponse',
	29 => 'BlockChainRequest',
	30 => 'BlockChainResponse',
	31 => 'Done',
	32 => 'InvalidPublicKey',
	33 => 'InvalidPrivateKey',
	34 => 'InvalidSignature',
	35 => 'InvalidAuthority',
	36 => 'FileNotFound',
	37 => 'RemoteError',
	38 => 'LogTransaction',
	39 => 'RevertLastLoggedAction',
	40 => 'Shutdown',
	41 => 'StorageFile',
	42 => 'StorageFileAddress',
	43 => 'BlockchainFileData',
	44 => 'TransactionFileData',
	45 => 'StateFileData',
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
            $className = 'Vendor\\Packege\\Model\\' . Rtt::types[$jsonObj->rtt];
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
