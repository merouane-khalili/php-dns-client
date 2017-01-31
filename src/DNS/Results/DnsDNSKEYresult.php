<?php
namespace DNS\Results;

use DNS\Results\DnsResult;

/**
 * Class DnsDNSKEYresult
 * @package DNS\Results
 */
class DnsDNSKEYresult extends DnsResult
{
    /**
     * @var
     */
    private $flags;
    /**
     * @var
     */
    private $algorithm;
    /**
     * @var
     */
    private $protocol;
    /**
     * @var bool
     */
    private $sep;
    /**
     * @var bool
     */
    private $zonekey;
    /**
     * @var
     */
    private $keylength;
    /**
     * @var
     */
    private $publickey;
    /**
     * @var
     */
    private $publickeybase64;
    /**
     * @var
     */
    private $keytag;

    /**
     * DnsDNSKEYresult constructor.
     * @param $flags
     * @param $protocol
     * @param $algorithm
     * @param $pubkey
     */
    public function __construct($flags, $protocol, $algorithm, $pubkey)
    {
        parent::__construct();
        //$this->setKeytag($flags, $protocol, $algorithm, $pubkey);
        $this->setKeylength(strlen($pubkey));
        $this->setFlags($flags);
        $this->setProtocol($protocol);
        $this->setAlgorithm($algorithm);
        $this->setPublicKey($pubkey);
        $this->setPublicKeyBase64(base64_encode($pubkey));
        $this->sep = false;
        $this->zonekey = false;
    }

    /*
    private function setKeytag($flags,$protocol,$algorithm, $pubkey)
    {
        $sum=0;
        $wire = pack("ncc", $flags, $protocol, $algorithm) . $pubkey;
        if ($algorithm == 1)
        {
            $this->keytag = 0xffff & unpack("n", substr($wire,-3,2)) ;
        }
        else
        {
            $sum=0;
            for($i = 0; $i < strlen($wire); $i++)
            {
                $a = unpack("C", substr($wire,$i,1));
                $sum += ($i & 1) ? $a[1] : $a[1] << 8;
            }
        $this->keytag = 0xffff & ($sum + ($sum >> 16));
        }
    }
    */
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
     * @param $keylength
     */
    public function setKeylength($keylength)
    {
        $this->keylength = $keylength;
    }

    /**
     * @return mixed
     */
    public function getKeylength()
    {
        return $this->keylength;
    }

    /**
     * @param $flags
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;
    }

    /**
     * @return mixed
     */
    public function getFlags()
    {
        return $this->flags;
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
     * @param $protocol
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

    /**
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param $bool
     */
    public function setZoneKey($bool)
    {
        $this->zonekey = $bool;
    }

    /**
     * @return bool
     */
    public function getZoneKey()
    {
        return $this->zonekey;
    }

    /**
     * @param $bool
     */
    public function setSep($bool)
    {
        $this->sep = $bool;
    }

    /**
     * @return bool
     */
    public function getSep()
    {
        return $this->sep;
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

    /**
     * @param $key
     */
    public function setPublicKeyBase64($key)
    {
        $this->publickeybase64 = $key;
    }

    /**
     * @return mixed
     */
    public function getPublicKeyBase64()
    {
        return $this->publickeybase64;
    }
}
