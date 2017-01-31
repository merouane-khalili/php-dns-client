<?php
namespace DNS\Results;

use DNS\Results\DnsResult;

/**
 * Class DnsDSresult
 * @package DNS\Results
 */
class DnsDSresult extends DnsResult
{
    /**
     * @var
     */
    private $keytag;
    /**
     * @var
     */
    private $algorithm;
    /**
     * @var
     */
    private $digest;
    /**
     * @var
     */
    private $key;
    /**
     * @var
     */
    private $rest;

    /**
     * DnsDSresult constructor.
     * @param $keytag
     * @param $algorithm
     * @param $digest
     * @param $key
     * @param $rest
     */
    public function __construct($keytag, $algorithm, $digest, $key, $rest)
    {
        parent::__construct();
        $this->setKeytag($keytag);
        $this->setAlgorithm($algorithm);
        $this->setDigest($digest);
        $this->setKey($key);
        $this->setRest($rest);
    }

    /**
     * @param $keytag
     */
    public function setKeytag($keytag)
    {
        $this->keytag = $keytag;
    }

    /**
     * @return mixed
     */
    public function getKeytag()
    {
        return $this->keytag;
    }

    /**
     * @param $algorithm
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;
    }

    /**
     * @return mixed
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * @param $digest
     */
    public function setDigest($digest)
    {
        $this->digest = $digest;
    }

    /**
     * @return mixed
     */
    public function getDigest()
    {
        return $this->digest;
    }

    /**
     * @param $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $rest
     */
    public function setRest($rest)
    {
        $this->rest = $rest;
    }

    /**
     * @return mixed
     */
    public function getRest()
    {
        return $this->rest;
    }
}
