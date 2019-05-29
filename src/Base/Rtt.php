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
	26 => 'ServiceStatisticsFile',
	27 => 'ServiceStatisticsCount',
	28 => 'TransactionReserve7',
	29 => 'TransactionReserve8',
	30 => 'TransactionReserve9',
	31 => 'TransactionReserve10',
	32 => 'TransactionReserve11',
	33 => 'TransactionReserve12',
	34 => 'TransactionReserve13',
	35 => 'TransactionReserve14',
	36 => 'TransactionReserve15',
	37 => 'IPDestination',
	38 => 'IPAddress',
	39 => 'Ping',
	40 => 'Pong',
	41 => 'DigestRequest',
	42 => 'Digest',
	43 => 'LoggedTransactionsRequest',
	44 => 'LoggedTransactions',
	45 => 'LoggedTransaction',
	46 => 'MasterKeyRequest',
	47 => 'MasterKey',
	48 => 'KeyPairRequest',
	49 => 'KeyPair',
	50 => 'SignRequest',
	51 => 'Signature',
	52 => 'TransactionBroadcastRequest',
	53 => 'TransactionDone',
	54 => 'ApiReserve1',
	55 => 'ApiReserve2',
	56 => 'ApiReserve3',
	57 => 'ApiReserve4',
	58 => 'SyncRequest',
	59 => 'SyncResponse',
	60 => 'BlockHeaderRequest',
	61 => 'BlockHeaderResponse',
	62 => 'BlockchainRequest',
	63 => 'BlockchainResponse',
	64 => 'PublicAddressesRequest',
	65 => 'PublicAddressesInfo',
	66 => 'PublicAddressInfo',
	67 => 'IncompleteTransactionsRequest',
	68 => 'IncompleteTransactions',
	69 => 'Served',
	70 => 'ApiReserve5',
	71 => 'ApiReserve6',
	72 => 'ApiReserve7',
	73 => 'ApiReserve8',
	74 => 'ApiReserve9',
	75 => 'ApiReserve10',
	76 => 'ApiReserve11',
	77 => 'Done',
	78 => 'InvalidPublicKey',
	79 => 'InvalidPrivateKey',
	80 => 'InvalidSignature',
	81 => 'InvalidAuthority',
	82 => 'NotEnoughBalance',
	83 => 'TooLongString',
	84 => 'UriError',
	85 => 'ResponseCodeReserve1',
	86 => 'ResponseCodeReserve2',
	87 => 'ResponseCodeReserve3',
	88 => 'ResponseCodeReserve4',
	89 => 'ResponseCodeReserve5',
	90 => 'ResponseCodeReserve6',
	91 => 'ResponseCodeReserve7',
	92 => 'ResponseCodeReserve8',
	93 => 'ResponseCodeReserve9',
	94 => 'ResponseCodeReserve10',
	95 => 'RemoteError',
	96 => 'StorageFile',
	97 => 'StorageFileDelete',
	98 => 'StorageFileAddress',
	99 => 'StorageFileRequest',
	100 => 'StorageFileSize',
	101 => 'StorageFileSizeResponse',
	102 => 'GenericModelReserve1',
	103 => 'GenericModelReserve2',
	104 => 'GenericModelReserve3',
	105 => 'GenericModelReserve4',
	106 => 'GenericModelReserve5',
	107 => 'GenericModelReserve6',
	108 => 'GenericModelReserve7',
	109 => 'GenericModelReserve8',
	110 => 'GenericModelReserve9',
	111 => 'GenericModelReserve10',
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