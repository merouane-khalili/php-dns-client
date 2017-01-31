<?php
namespace DNS\Results;
use DNS\Results\DnsResult;

/**
 * Class DnsCNAMEresult
 * @package DNS\Results
 */
class DnsCNAMEresult extends DnsResult
{
    /**
     * @var
     */
    private $redirect;

    /**
     * DnsCNAMEresult constructor.
     * @param $redirect
     */
    public function __construct($redirect)
    {
        parent::__construct();
        $this->setRedirect($redirect);
    }

    /**
     * @param $redirect
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
    }

    /**
     * @return mixed
     */
    public function getRedirect()
    {
        return $this->redirect;
    }
}
