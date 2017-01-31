<?php
namespace DNS\Results;

use DNS\Results\DnsResult;

/**
 * Class DnsSOAresult
 * @package DNS\Results
 */
class DnsSOAresult extends DnsResult
{
    /**
     * @var
     */
    private $nameserver;
    /**
     * @var
     */
    private $responsible;
    /**
     * @var
     */
    private $serial;
    /**
     * @var
     */
    private $refresh;
    /**
     * @var
     */
    private $expiry;
    /**
     * @var
     */
    private $retry;
    /**
     * @var
     */
    private $minttl;


    /**
     * @param $serial
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
    }

    /**
     * @return mixed
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * @param $expiry
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;
    }

    /**
     * @return mixed
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * @param $retry
     */
    public function setRetry($retry)
    {
        $this->retry = $retry;
    }

    /**
     * @return mixed
     */
    public function getRetry()
    {
        return $this->retry;
    }

    /**
     * @param $minttl
     */
    public function setMinttl($minttl)
    {
        $this->minttl = $minttl;
    }

    /**
     * @return mixed
     */
    public function getMinttl()
    {
        return $this->minttl;
    }

    /**
     * @param $refresh
     */
    public function setRefresh($refresh)
    {
        $this->refresh = $refresh;
    }

    /**
     * @return mixed
     */
    public function getRefresh()
    {
        return $this->refresh;
    }

    /**
     * @param $name
     */
    public function setResponsible($name)
    {
        $dot = strpos($name, ".");
        $name[$dot] = "@";
        $this->responsible = $name;
    }

    /**
     * @return mixed
     */
    public function getResponsible()
    {
        return $this->responsible;
    }

    /**
     * @param $data
     */
    public function setNameserver($data)
    {
        $this->nameserver = $data;
    }

    /**
     * @return mixed
     */
    public function getNameserver()
    {
        return $this->nameserver;
    }

}


