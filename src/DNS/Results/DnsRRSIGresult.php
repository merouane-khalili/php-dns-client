<?php
namespace DNS\Results;

use DNS\Results\DnsResult;
use DNS\Types\DnsTypes;

/**
 * Class DnsRRSIGresult
 * @package DNS\Results
 */
class DnsRRSIGresult extends DnsResult
{
    /**
     * @var
     */
    private $typecovered;
    /**
     * @var
     */
    private $algorithm;
    /**
     * @var
     */
    private $labels;
    /**
     * @var
     */
    private $originalttl;
    /**
     * @var
     */
    private $expirationdate;
    /**
     * @var
     */
    private $expirationtimestamp;
    /**
     * @var
     */
    private $inceptiondate;
    /**
     * @var
     */
    private $inceptiontimestamp;
    /**
     * @var
     */
    private $keytag;
    /**
     * @var
     */
    private $signername;
    /**
     * @var
     */
    private $signature;
    /**
     * @var
     */
    private $signaturebase64;
    /**
     * @var
     */
    private $publickey;

    /**
     * DnsRRSIGresult constructor.
     * @param $type
     * @param $algorithm
     * @param $labels
     * @param $originalttl
     * @param $expiration
     * @param $inception
     * @param $keytag
     */
    public function __construct($type, $algorithm, $labels, $originalttl, $expiration, $inception, $keytag)
    {
        parent::__construct();
        date_default_timezone_set('UTC');
        $types = new DnsTypes();
        $this->setTypecovered($types->getById($type));
        $this->setAlgorithm($algorithm);
        $this->setLabels($labels);
        $this->setOriginalTTL($originalttl);
        $this->setExpirationTimestamp($expiration);
        $this->setInceptionTimestamp($inception);
        $this->setExpirationDate(date('YmdHis', $expiration));
        $this->setInceptionDate(date('YmdHis', $inception));
        $this->setKeytag($keytag);
    }

    /**
     * @param $timestamp
     */
    public function setExpirationTimestamp($timestamp)
    {
        $this->expirationtimestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getExpirationTimestamp()
    {
        return $this->expirationtimestamp;
    }

    /**
     * @param $timestamp
     */
    public function setInceptionTimestamp($timestamp)
    {
        $this->inceptiontimestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getInceptionTimestamp()
    {
        return $this->inceptiontimestamp;
    }

    /**
     * @param $sig
     */
    public function setSignature($sig)
    {
        $this->signature = $sig;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param $sig
     */
    public function setSignatureBase64($sig)
    {
        $this->signaturebase64 = $sig;
    }

    /**
     * @return mixed
     */
    public function getSignatureBase64()
    {
        return $this->signaturebase64;
    }

    /**
     * @param $name
     */
    public function setSignername($name)
    {
        $this->signername = $name;
    }

    /**
     * @return mixed
     */
    public function getSignername()
    {
        return $this->signername;
    }

    /**
     * @param $type
     */
    public function setTypecovered($type)
    {
        $this->typecovered = $type;
    }

    /**
     * @return mixed
     */
    public function getTypecovered()
    {
        return $this->typecovered;
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
     * @param $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @return mixed
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param $expiration
     */
    public function setExpirationDate($expiration)
    {
        $this->expirationdate = $expiration;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationdate;
    }

    /**
     * @param $inception
     */
    public function setInceptionDate($inception)
    {
        $this->inceptiondate = $inception;
    }

    /**
     * @return mixed
     */
    public function getInceptionDate()
    {
        return $this->inceptiondate;
    }

    /**
     * @param $ttl
     */
    public function setOriginalTTL($ttl)
    {
        $this->originalttl = $ttl;
    }

    /**
     * @return mixed
     */
    public function getOriginalTTL()
    {
        return $this->originalttl;
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
     * @param $key
     */
    public function setPublicKey($key)
    {
        $this->publickey = $key;
    }

    /**
     * @return mixed
     */
    public function getPublicKey()
    {
        return $this->publickey;
    }
}
