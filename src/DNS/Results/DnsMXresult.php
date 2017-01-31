<?php
namespace DNS\Results;

use DNS\Results\DnsResult;

/**
 * Class DnsMXresult
 * @package DNS\Results
 */
class DnsMXresult extends DnsResult
{
    /**
     * @var
     */
    private $prio;
    /**
     * @var
     */
    private $server;


    /**
     * @param $prio
     */
    public function setPrio($prio)
    {
        $this->prio = $prio;
    }

    /**
     * @return mixed
     */
    public function getPrio()
    {
        return $this->prio;
    }

    /**
     * @param $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }
}
