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
	19 => 'TransactionReserve6',
	20 => 'TransactionReserve7',
	21 => 'TransactionReserve8',
	22 => 'TransactionReserve9',
	23 => 'TransactionReserve10',
	24 => 'TransactionReserve11',
	25 => 'TransactionReserve12',
	26 => 'TransactionReserve13',
	27 => 'TransactionReserve14',
	28 => 'TransactionReserve15',
	29 => 'File',
	30 => 'ContentUnit',
	31 => 'Content',
	32 => 'Role',
	33 => 'AddressInfo',
	34 => 'StorageUpdate',
	35 => 'ServiceStatistics',
	36 => 'ServiceStatisticsFile',
	37 => 'ServiceStatisticsCount',
	38 => 'SponsorContentUnit',
	39 => 'CancelSponsorContentUnit',
	40 => 'TransactionReserve18',
	41 => 'TransactionReserve19',
	42 => 'TransactionReserve20',
	43 => 'TransactionReserve21',
	44 => 'TransactionReserve22',
	45 => 'TransactionReserve23',
	46 => 'TransactionReserve24',
	47 => 'TransactionReserve25',
	48 => 'IPDestination',
	49 => 'IPAddress',
	50 => 'Ping',
	51 => 'Pong',
	52 => 'DigestRequest',
	53 => 'Digest',
	54 => 'LoggedTransactionsRequest',
	55 => 'LoggedTransactions',
	56 => 'LoggedTransaction',
	57 => 'MasterKeyRequest',
	58 => 'MasterKey',
	59 => 'KeyPairRequest',
	60 => 'KeyPair',
	61 => 'SignRequest',
	62 => 'Signature',
	63 => 'TransactionBroadcastRequest',
	64 => 'TransactionDone',
	65 => 'ApiReserve1',
	66 => 'ApiReserve2',
	67 => 'ApiReserve3',
	68 => 'ApiReserve4',
	69 => 'SyncRequest',
	70 => 'SyncResponse',
	71 => 'BlockHeaderRequest',
	72 => 'BlockHeaderResponse',
	73 => 'BlockchainRequest',
	74 => 'BlockchainResponse',
	75 => 'PublicAddressesRequest',
	76 => 'PublicAddressesInfo',
	77 => 'PublicAddressInfo',
	78 => 'IncompleteTransactionsRequest',
	79 => 'IncompleteTransactions',
	80 => 'Served',
	81 => 'ContentUnitImpactLog',
	82 => 'ContentUnitImpactPerChannel',
	83 => 'SponsorContentUnitApplied',
	84 => 'FileUrisRequest',
	85 => 'FileUris',
	86 => 'ApiReserve10',
	87 => 'ApiReserve11',
	88 => 'Done',
	89 => 'InvalidPublicKey',
	90 => 'InvalidPrivateKey',
	91 => 'InvalidSignature',
	92 => 'InvalidAuthority',
	93 => 'NotEnoughBalance',
	94 => 'TooLongString',
	95 => 'UriError',
	96 => 'TransactionPoolFull',
	97 => 'ResponseCodeReserve2',
	98 => 'ResponseCodeReserve3',
	99 => 'ResponseCodeReserve4',
	100 => 'ResponseCodeReserve5',
	101 => 'ResponseCodeReserve6',
	102 => 'ResponseCodeReserve7',
	103 => 'ResponseCodeReserve8',
	104 => 'ResponseCodeReserve9',
	105 => 'ResponseCodeReserve10',
	106 => 'RemoteError',
	107 => 'StorageFile',
	108 => 'StorageFileDelete',
	109 => 'StorageFileAddress',
	110 => 'StorageFileRequest',
	111 => 'StorageFileDetails',
	112 => 'StorageFileDetailsResponse',
	113 => 'StorageUpdateCommand',
	114 => 'Letter',
	115 => 'CheckInbox',
	116 => 'Inbox',
	117 => 'GenericModelReserve1',
	118 => 'GenericModelReserve2',
	119 => 'GenericModelReserve3',
	120 => 'GenericModelReserve4',
	121 => 'GenericModelReserve5',
	122 => 'GenericModelReserve6',
	123 => 'GenericModelReserve7',
	124 => 'GenericModelReserve8',
	125 => 'GenericModelReserve9',
	126 => 'GenericModelReserve10',
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