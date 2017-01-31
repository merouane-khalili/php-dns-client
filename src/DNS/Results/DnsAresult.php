<?php
namespace DNS\Results;
use DNS\Results\DnsResult;

/**
 * Class DnsAresult
 * @package DNS\Results
 */
class DnsAresult extends DnsResult
{
    /**
     * @var
     */
    private $ipv4;

    /**
     * DnsAresult constructor.
     * @param $ip
     */
    function __construct($ip)
    {
        parent::__construct();
        $this->setIpv4($ip);
    }

    /**
     * @param $ip
     */
    public function setIpv4($ip)
    {
        $this->ipv4 = $ip;
    }

    /**
     * @return mixed
     */
    public function getIpv4()
    {
        return $this->ipv4;
    }
}