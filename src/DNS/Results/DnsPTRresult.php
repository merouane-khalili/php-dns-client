<?php
namespace DNS\Results;

use DNS\Results\DnsResult;

/**
 * Class DnsPTRresult
 * @package DNS\Results
 */
class DnsPTRresult extends DnsResult
{
    /**
     * @var
     */
    private $data;

    /**
     * DnsPTRresult constructor.
     * @param $data
     */
    function __construct($data)
    {
        parent::__construct();
        $this->setData($data);
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
