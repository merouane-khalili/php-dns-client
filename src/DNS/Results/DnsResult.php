<?php
namespace DNS\Results;

/**
 * Class DnsResult
 * @package DNS\Results
 */
class DnsResult
{

    /**
     * @var
     */
    private $type;
    /**
     * @var
     */
    private $typeid;
    /**
     * @var
     */
    private $class;
    /**
     * @var
     */
    private $ttl;
    /**
     * @var
     */
    private $data;
    /**
     * @var
     */
    private $domain;
    /**
     * @var
     */
    private $string;
    /**
     * @var
     */
    private $record;
    /**
     * @var array
     */
    private $extras = array();


    /**
     * DnsResult constructor.
     */
    public function __construct()
    {
        date_default_timezone_set('UTC');
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param $typeid
     */
    public function setTypeid($typeid)
    {
        $this->typeid = $typeid;
    }

    /**
     * @return mixed
     */
    public function getTypeid()
    {
        return $this->typeid;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @param $ttl
     */
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;
    }


    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
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
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }


    /**
     * @return mixed
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @param $string
     */
    public function setString($string)
    {
        $this->string = $string;
    }


    /**
     * @return mixed
     */
    public function getRecord()
    {
        return $this->record;
    }

    /**
     * @param $record
     */
    public function setRecord($record)
    {
        $this->record = $record;
    }

    /**
     * @return array
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * @param $extras
     */
    public function setExtras($extras)
    {
        $this->extras = $extras;
    }
}
