<?php
namespace PubliqAPI\Model;
use PubliqAPI\Base\RttSerializableTrait;
use PubliqAPI\Base\RttToJsonTrait;
use PubliqAPI\Base\ValidatorInterface;
use PubliqAPI\Base\Rtt;
use PubliqAPI\Base\NodeType;

class Config implements ValidatorInterface, \JsonSerializable
{
    use RttSerializableTrait;
    use RttToJsonTrait;
 
    CONST  memberNames = [
        'p2p_bind_to_address' => ['name' => 'p2pBindToAddress', 'convertToDate' => false, 'removeIfNull' => true],
        'p2p_connect_to_addresses' => ['name' => 'p2pConnectToAddresses', 'convertToDate' => false, 'removeIfNull' => true],
        'rpc_bind_to_address' => ['name' => 'rpcBindToAddress', 'convertToDate' => false, 'removeIfNull' => true],
        'slave_bind_to_address' => ['name' => 'slaveBindToAddress', 'convertToDate' => false, 'removeIfNull' => true],
        'public_address' => ['name' => 'publicAddress', 'convertToDate' => false, 'removeIfNull' => true],
        'public_ssl_address' => ['name' => 'publicSslAddress', 'convertToDate' => false, 'removeIfNull' => true],
        'private_key' => ['name' => 'privateKey', 'convertToDate' => false, 'removeIfNull' => true],
        'private_keys' => ['name' => 'privateKeys', 'convertToDate' => false, 'removeIfNull' => true],
        'manager_address' => ['name' => 'managerAddress', 'convertToDate' => false, 'removeIfNull' => true],
        'node_type' => ['name' => 'nodeType', 'convertToDate' => false, 'removeIfNull' => true],
        'automatic_fee' => ['name' => 'automaticFee', 'convertToDate' => false, 'removeIfNull' => true],
        'enable_action_log' => ['name' => 'enableActionLog', 'convertToDate' => false, 'removeIfNull' => true],
        'enable_inbox' => ['name' => 'enableInbox', 'convertToDate' => false, 'removeIfNull' => true],
        'testnet' => ['name' => 'testnet', 'convertToDate' => false, 'removeIfNull' => true],
        'discovery_server' => ['name' => 'discoveryServer', 'convertToDate' => false, 'removeIfNull' => true],
        'transfer_only' => ['name' => 'transferOnly', 'convertToDate' => false, 'removeIfNull' => true],
    ];

    /**
    * @var IPAddress
    */ 
    private $p2pBindToAddress;
    /**
    * @var array
    */ 
    private $p2pConnectToAddresses = [];
    /**
    * @var IPAddress
    */ 
    private $rpcBindToAddress;
    /**
    * @var IPAddress
    */ 
    private $slaveBindToAddress;
    /**
    * @var IPAddress
    */ 
    private $publicAddress;
    /**
    * @var IPAddress
    */ 
    private $publicSslAddress;
    /**
    * @var string
    */ 
    private $privateKey;
    /**
    * @var array
    */ 
    private $privateKeys = [];
    /**
    * @var string
    */ 
    private $managerAddress;
    /**
    * @var string 
    */ 
    private $nodeType;
    /**
    * @var Coin
    */ 
    private $automaticFee;
    /**
    * @var bool
    */ 
    private $enableActionLog;
    /**
    * @var bool
    */ 
    private $enableInbox;
    /**
    * @var bool
    */ 
    private $testnet;
    /**
    * @var bool
    */ 
    private $discoveryServer;
    /**
    * @var bool
    */ 
    private $transferOnly;
    /** 
    * @param IPAddress $p2pBindToAddress
    */ 
    public function setP2pBindToAddress(IPAddress $p2pBindToAddress) 
    { 
       $this->p2pBindToAddress = $p2pBindToAddress;
    }
    /** 
    * @param IPAddress $rpcBindToAddress
    */ 
    public function setRpcBindToAddress(IPAddress $rpcBindToAddress) 
    { 
       $this->rpcBindToAddress = $rpcBindToAddress;
    }
    /** 
    * @param IPAddress $slaveBindToAddress
    */ 
    public function setSlaveBindToAddress(IPAddress $slaveBindToAddress) 
    { 
       $this->slaveBindToAddress = $slaveBindToAddress;
    }
    /** 
    * @param IPAddress $publicAddress
    */ 
    public function setPublicAddress(IPAddress $publicAddress) 
    { 
       $this->publicAddress = $publicAddress;
    }
    /** 
    * @param IPAddress $publicSslAddress
    */ 
    public function setPublicSslAddress(IPAddress $publicSslAddress) 
    { 
       $this->publicSslAddress = $publicSslAddress;
    }
    /** 
    * @param string $privateKey
    */ 
    public function setPrivateKey(string $privateKey) 
    { 
       $this->privateKey = $privateKey;
    }
    /** 
    * @param string $managerAddress
    */ 
    public function setManagerAddress(string $managerAddress) 
    { 
       $this->managerAddress = $managerAddress;
    }
    /** 
    * @param string $nodeType
    */ 
    public function setNodeType(string $nodeType) 
    { 
        NodeType::validate($nodeType);
        $this->nodeType = $nodeType;
    }
    /** 
    * @param Coin $automaticFee
    */ 
    public function setAutomaticFee(Coin $automaticFee) 
    { 
       $this->automaticFee = $automaticFee;
    }
    /** 
    * @param bool $enableActionLog
    */ 
    public function setEnableActionLog(bool $enableActionLog) 
    { 
       $this->enableActionLog = $enableActionLog;
    }
    /** 
    * @param bool $enableInbox
    */ 
    public function setEnableInbox(bool $enableInbox) 
    { 
       $this->enableInbox = $enableInbox;
    }
    /** 
    * @param bool $testnet
    */ 
    public function setTestnet(bool $testnet) 
    { 
       $this->testnet = $testnet;
    }
    /** 
    * @param bool $discoveryServer
    */ 
    public function setDiscoveryServer(bool $discoveryServer) 
    { 
       $this->discoveryServer = $discoveryServer;
    }
    /** 
    * @param bool $transferOnly
    */ 
    public function setTransferOnly(bool $transferOnly) 
    { 
       $this->transferOnly = $transferOnly;
    }
    public function getP2pBindToAddress() 
    {
        return $this->p2pBindToAddress;
    }
    public function getP2pConnectToAddresses() 
    {
        return $this->p2pConnectToAddresses;
    }
    public function getRpcBindToAddress() 
    {
        return $this->rpcBindToAddress;
    }
    public function getSlaveBindToAddress() 
    {
        return $this->slaveBindToAddress;
    }
    public function getPublicAddress() 
    {
        return $this->publicAddress;
    }
    public function getPublicSslAddress() 
    {
        return $this->publicSslAddress;
    }
    public function getPrivateKey() 
    {
        return $this->privateKey;
    }
    public function getPrivateKeys() 
    {
        return $this->privateKeys;
    }
    public function getManagerAddress() 
    {
        return $this->managerAddress;
    }
    public function getNodeType() 
    {
        return $this->nodeType;
    }
    public function getAutomaticFee() 
    {
        return $this->automaticFee;
    }
    public function getEnableActionLog() 
    {
        return $this->enableActionLog;
    }
    public function getEnableInbox() 
    {
        return $this->enableInbox;
    }
    public function getTestnet() 
    {
        return $this->testnet;
    }
    public function getDiscoveryServer() 
    {
        return $this->discoveryServer;
    }
    public function getTransferOnly() 
    {
        return $this->transferOnly;
    }
    /**
    * @param IPAddress $p2pConnectToAddressesItem
    */
    public function addP2pConnectToAddresses(IPAddress $p2pConnectToAddressesItem)
    {
        $this->p2pConnectToAddresses[] = $p2pConnectToAddressesItem;
    }
    /**
    * @param string $privateKeysItem
    */
    public function addPrivateKeys(string $privateKeysItem)
    {
        $this->privateKeys[] = $privateKeysItem;
    }
    public function validate(\stdClass $data) 
    { 
        $this->p2pBindToAddress = new IPAddress();
        $this->p2pBindToAddress->validate($data->p2p_bind_to_address);
        $this->rpcBindToAddress = new IPAddress();
        $this->rpcBindToAddress->validate($data->rpc_bind_to_address);
        $this->slaveBindToAddress = new IPAddress();
        $this->slaveBindToAddress->validate($data->slave_bind_to_address);
        $this->publicAddress = new IPAddress();
        $this->publicAddress->validate($data->public_address);
        $this->publicSslAddress = new IPAddress();
        $this->publicSslAddress->validate($data->public_ssl_address);
        $this->automaticFee = new Coin();
        $this->automaticFee->validate($data->automatic_fee);
        $this->setPrivateKey($data->private_key); 
        $this->setManagerAddress($data->manager_address); 
        $this->setEnableActionLog($data->enable_action_log); 
        $this->setEnableInbox($data->enable_inbox); 
        $this->setTestnet($data->testnet); 
        $this->setDiscoveryServer($data->discovery_server); 
        $this->setTransferOnly($data->transfer_only); 
          foreach ($data->p2p_connect_to_addresses as $p2pConnectToAddressesItem) { 
              $p2pConnectToAddressesItemObj = new IPAddress(); 
              $p2pConnectToAddressesItemObj->validate($p2pConnectToAddressesItem); 
              $this->p2pConnectToAddresses[] = $p2pConnectToAddressesItemObj;
           } 
          foreach ($data->private_keys as $privateKeysItem) { 
            $this->addPrivateKeys($privateKeysItem);
           } 
        $this->setNodeType($data->node_type); 
    } 
    public static function getMemberName(string $camelCaseName)
    {
        foreach (self::memberNames as $key => $value) {
               if ($value['name'] == $camelCaseName) {
                   $value['key'] = $key;
                   return $value;
               }
       }
       return null;
    }

} 
