<?php
namespace DNS\Results;

use DNS\Results\DnsResult;

/**
 * Class DnsNSresult
 * @package DNS\Results
 */
class DnsNSresult extends DnsResult
{
    /**
     * @var
     */
    private $nameserver;

    /**
     * DnsNSresult constructor.
     * @param $ns
     */
    public function __construct($ns)
    {
        parent::__construct();
        $this->setNameserver($ns);
    }

    /**
     * @param $server
     */
    public function setNameserver($server)
    {
        $this->nameserver = $server;
    }

    /**
     * @return mixed
     */
    public function getNameserver()
    {
        return $this->nameserver;
    }
}

