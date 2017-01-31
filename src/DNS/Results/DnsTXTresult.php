<?php
namespace DNS\Results;

use DNS\Results\DnsResult;

/**
 * Class DnsTXTresult
 * @package DNS\Results
 */
class DnsTXTresult extends DnsResult
{
    /**
     * @var
     */
    private $record;

    /**
     * DnsTXTresult constructor.
     * @param $record
     */
    public function __construct($record)
    {
        parent::__construct();
        $this->setRecord($record);
    }

    /**
     * @param $record
     */
    public function setRecord($record)
    {
        $this->record = $record;
    }

    /**
     * @return mixed
     */
    public function getRecord()
    {
        return $this->record;
    }
}


