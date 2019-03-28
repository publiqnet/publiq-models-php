<?php
namespace PubliqAPI\Base;

class Rtt
{
    CONST types = [
	0 => 'Coin',
	1 => 'Broadcast',
	2 => 'Transaction',
	3 => 'Authority',
	4 => 'SignedTransaction',
	5 => 'BlockHeader',
	6 => 'BlockHeaderExtended',
	7 => 'Block',
	8 => 'SignedBlock',
	9 => 'RewardLog',
	10 => 'TransactionLog',
	11 => 'BlockLog',
	12 => 'Reward',
	13 => 'Transfer',
	14 => 'TransactionReserve1',
	15 => 'TransactionReserve2',
	16 => 'TransactionReserve3',
	17 => 'TransactionReserve4',
	18 => 'TransactionReserve5',
	19 => 'File',
	20 => 'ContentUnit',
	21 => 'Content',
	22 => 'Role',
	23 => 'AddressInfo',
	24 => 'StorageUpdate',
	25 => 'ServiceStatistics',
	26 => 'ServiceStatisticsItem',
	27 => 'TransactionReserve6',
	28 => 'TransactionReserve7',
	29 => 'TransactionReserve8',
	30 => 'TransactionReserve9',
	31 => 'TransactionReserve10',
	32 => 'TransactionReserve11',
	33 => 'TransactionReserve12',
	34 => 'TransactionReserve13',
	35 => 'TransactionReserve14',
	36 => 'TransactionReserve15',
	37 => 'DigestRequest',
	38 => 'Digest',
	39 => 'LoggedTransactionsRequest',
	40 => 'LoggedTransactions',
	41 => 'LoggedTransaction',
	42 => 'MasterKeyRequest',
	43 => 'MasterKey',
	44 => 'KeyPairRequest',
	45 => 'KeyPair',
	46 => 'SignRequest',
	47 => 'Signature',
	48 => 'TransactionBroadcastRequest',
	49 => 'SignedTransactionBroadcastRequest',
	50 => 'TransactionDone',
	51 => 'IncompleteTransactionsRequest',
	52 => 'IncompleteTransactions',
	53 => 'IncompleteTransactionItem',
	54 => 'SyncRequest',
	55 => 'SyncResponse',
	56 => 'BlockHeaderRequest',
	57 => 'BlockHeaderResponse',
	58 => 'BlockchainRequest',
	59 => 'BlockchainResponse',
	60 => 'ApiReserve1',
	61 => 'ApiReserve2',
	62 => 'ApiReserve3',
	63 => 'ApiReserve4',
	64 => 'ApiReserve5',
	65 => 'ApiReserve6',
	66 => 'ApiReserve7',
	67 => 'ApiReserve8',
	68 => 'ApiReserve9',
	69 => 'ApiReserve10',
	70 => 'Done',
	71 => 'InvalidPublicKey',
	72 => 'InvalidPrivateKey',
	73 => 'InvalidSignature',
	74 => 'InvalidAuthority',
	75 => 'NotEnoughBalance',
	76 => 'TooLongString',
	77 => 'FileNotFound',
	78 => 'UriError',
	79 => 'ResponseCodeReserve1',
	80 => 'ResponseCodeReserve2',
	81 => 'ResponseCodeReserve3',
	82 => 'ResponseCodeReserve4',
	83 => 'ResponseCodeReserve5',
	84 => 'ResponseCodeReserve6',
	85 => 'ResponseCodeReserve7',
	86 => 'ResponseCodeReserve8',
	87 => 'ResponseCodeReserve9',
	88 => 'ResponseCodeReserve10',
	89 => 'RemoteError',
	90 => 'StorageFile',
	91 => 'StorageFileDelete',
	92 => 'StorageFileAddress',
	93 => 'StorageFileRequest',
	94 => 'GenericModelReserve1',
	95 => 'GenericModelReserve2',
	96 => 'GenericModelReserve3',
	97 => 'GenericModelReserve4',
	98 => 'GenericModelReserve5',
	99 => 'GenericModelReserve6',
	100 => 'GenericModelReserve7',
	101 => 'GenericModelReserve8',
	102 => 'GenericModelReserve9',
	103 => 'GenericModelReserve10',
	104 => 'IPDestination',
	105 => 'IPAddress',
	106 => 'Ping',
	107 => 'Pong',
	108 => 'TaskRequest',
	109 => 'TaskResponse',
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