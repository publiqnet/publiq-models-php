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
	77 => 'UriError',
	78 => 'ResponseCodeReserve1',
	79 => 'ResponseCodeReserve2',
	80 => 'ResponseCodeReserve3',
	81 => 'ResponseCodeReserve4',
	82 => 'ResponseCodeReserve5',
	83 => 'ResponseCodeReserve6',
	84 => 'ResponseCodeReserve7',
	85 => 'ResponseCodeReserve8',
	86 => 'ResponseCodeReserve9',
	87 => 'ResponseCodeReserve10',
	88 => 'RemoteError',
	89 => 'StorageFile',
	90 => 'StorageFileDelete',
	91 => 'StorageFileAddress',
	92 => 'StorageFileRequest',
	93 => 'GenericModelReserve1',
	94 => 'GenericModelReserve2',
	95 => 'GenericModelReserve3',
	96 => 'GenericModelReserve4',
	97 => 'GenericModelReserve5',
	98 => 'GenericModelReserve6',
	99 => 'GenericModelReserve7',
	100 => 'GenericModelReserve8',
	101 => 'GenericModelReserve9',
	102 => 'GenericModelReserve10',
	103 => 'IPDestination',
	104 => 'IPAddress',
	105 => 'Ping',
	106 => 'Pong',
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