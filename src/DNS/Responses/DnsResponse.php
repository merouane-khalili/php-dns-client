<?php
namespace DNS\Responses;

use DNS\Types\DnsTypes;
use DNS\Results\DnsAresult;
use DNS\Results\DnsNSresult;
use DNS\Results\DnsPTRresult;
use DNS\Results\DnsCNAMEresult;
use DNS\Results\DnsMXresult;
use DNS\Results\DnsSOAresult;
use DNS\Results\DnsTXTResult;
use DNS\Results\DnsDSresult;
use DNS\Results\DnsDNSKEYresult;
use DNS\Results\DnsRRSIGresult;
use DNS\Results\DnsResult;

/**
 * Class DnsResponse
 * @package DNS\Responses
 */
class DnsResponse
{
    /**
     * @var int
     */
    protected $responsecounter;
    /**
     * @var array
     */
    protected $resourceResults;
    /**
     * @var array
     */
    protected $nameserverResults;
    /**
     * @var array
     */
    protected $additionalResults;
    /**
     * @var
     */
    protected $resourceResponses;
    /**
     * @var
     */
    protected $nameserverResponses;
    /**
     * @var
     */
    protected $additionalResponses;
    /**
     * @var array
     */
    protected $queries;
    /**
     * @var
     */
    private $questions;
    /**
     * @var
     */
    private $answers;
    /**
     * @var bool
     */
    private $authorative;
    /**
     * @var bool
     */
    private $truncated;
    /**
     * @var bool
     */
    private $recursionRequested;
    /**
     * @var bool
     */
    private $recursionAvailable;
    /**
     * @var bool
     */
    private $authenticated;
    /**
     * @var bool
     */
    private $dnssecAware;

    /**
     *
     */
    const RESULTTYPE_RESOURCE = 'resource';
    /**
     *
     */
    const RESULTTYPE_NAMESERVER = 'nameserver';
    /**
     *
     */
    const RESULTTYPE_ADDITIONAL = 'additional';

    /**
     * DnsResponse constructor.
     */
    function __construct()
    {
        $this->authorative = false;
        $this->truncated = false;
        $this->recursionRequested = false;
        $this->recursionAvailable = false;
        $this->authenticated = false;
        $this->dnssecAware = false;
        $this->responsecounter = 12;
        $this->queries = array();
        $this->resourceResults = array();
        $this->nameserverResults = array();
        $this->additionalResults = array();
    }

    /**
     * @param $result
     * @param $recordtype
     */
    function addResult($result, $recordtype)
    {
        switch ($recordtype) {
            case dnsResponse::RESULTTYPE_RESOURCE:
                $this->resourceResults[] = $result;
                break;
            case dnsResponse::RESULTTYPE_NAMESERVER:
                $this->nameserverResults[] = $result;
                break;
            case dnsResponse::RESULTTYPE_ADDITIONAL:
                $this->additionalResults[] = $result;
                break;
            default:
                #$this->responsecounter = 12;
                break;
        }
        #
        # Reset response counter to start at beginning of response
        #

    }

    /**
     * @param $query
     */
    public function addQuery($query)
    {
        $this->queries[] = $query;
    }

    /**
     * @return array
     */
    public function getQueries()
    {
        return $this->queries;
    }

    /**
     * @param $count
     */
    public function setAnswerCount($count)
    {
        $this->answers = $count;
    }

    /**
     * @return mixed
     */
    public function getAnswerCount()
    {
        return $this->answers;
    }

    /**
     * @param $count
     */
    public function setQueryCount($count)
    {
        $this->questions = $count;
    }

    /**
     * @return mixed
     */
    public function getQueryCount()
    {
        return $this->questions;
    }

    /**
     * @param $flag
     */
    public function setAuthorative($flag)
    {
        $this->authorative = $flag;
    }

    /**
     * @return bool
     */
    public function getAuthorative()
    {
        return $this->authorative;
    }

    /**
     * @param $flag
     */
    public function setTruncated($flag)
    {
        $this->truncated = $flag;
    }

    /**
     * @return bool
     */
    public function getTruncated()
    {
        return $this->truncated;
    }

    /**
     * @param $flag
     */
    public function setRecursionRequested($flag)
    {
        $this->recursionRequested = $flag;
    }

    /**
     * @return bool
     */
    public function getRecursionRequested()
    {
        return $this->recursionRequested;
    }

    /**
     * @param $flag
     */
    public function setRecursionAvailable($flag)
    {
        $this->recursionAvailable = $flag;
    }

    /**
     * @return bool
     */
    public function getRecursionAvailable()
    {
        return $this->recursionAvailable;
    }

    /**
     * @param $flag
     */
    public function setAuthenticated($flag)
    {
        $this->authenticated = $flag;
    }

    /**
     * @return bool
     */
    public function getAuthenticated()
    {
        return $this->authenticated;
    }

    /**
     * @param $flag
     */
    public function setDnssecAware($flag)
    {
        $this->dnssecAware = $flag;
    }

    /**
     * @return bool
     */
    public function getDnssecAware()
    {
        return $this->dnssecAware;
    }

    /**
     * @return array
     */
    public function getResourceResults()
    {
        return $this->resourceResults;
    }

    /**
     * @return array
     */
    public function getNameserverResults()
    {
        return $this->nameserverResults;
    }

    /**
     * @return array
     */
    public function getAdditionalResults()
    {
        return $this->additionalResults;
    }

    /**
     * @param $buffer
     * @param int $count
     * @param string $offset
     * @return string
     */
    public function readResponse($buffer, $count = 1, $offset = "")
    {
        if ($offset == "") // no offset so use and increment the ongoing counter
        {
            $return = substr($buffer, $this->responsecounter, $count);
            $this->responsecounter += $count;
        } else {
            $return = substr($buffer, $offset, $count);
        }
        return $return;
    }

    /**
     * @param $buffer
     * @param string $resulttype
     */
    public function readRecord($buffer, $resulttype = '')
    {
        $domain = $this->ReadDomainLabel($buffer);
        $ans_header_bin = $this->readResponse($buffer, 10); // 10 byte header
        $ans_header = unpack("ntype/nclass/Nttl/nlength", $ans_header_bin);
        #echo "Record Type ".$ans_header['type']." Class ".$ans_header['class']." TTL ".$ans_header['ttl']." Length ".$ans_header['length']."\n";
        #$this->DebugBinary($buffer);
        $types = new DnsTypes();
        $typeid = $types->getById($ans_header['type']);
        //$extras = array();
        switch ($typeid) {
            case 'A':
                $result = new DnsAresult(implode(".", unpack("Ca/Cb/Cc/Cd", $this->readResponse($buffer, 4))));
                break;

            case 'NS':
                $result = new DnsNSresult($this->ReadDomainLabel($buffer));
                break;

            case 'PTR':
                $result = new DnsPTRresult($this->ReadDomainLabel($buffer));
                break;

            case 'CNAME':
                $result = new DnsCNAMEresult($this->ReadDomainLabel($buffer));
                break;

            case 'MX':
                $result = new DnsMXresult();
                $prefs = $this->readResponse($buffer, 2);
                $prefs = unpack("nprio", $prefs);
                $result->setPrio($prefs['prio']);
                $result->setServer($this->ReadDomainLabel($buffer));
                break;

            case 'SOA':
                $result = new DnsSOAresult();
                $result->setNameserver($this->ReadDomainLabel($buffer));
                $result->setResponsible($this->ReadDomainLabel($buffer));
                $buffer = $this->readResponse($buffer, 20);
                $extras = unpack("Nserial/Nrefresh/Nretry/Nexpiry/Nminttl", $buffer);
                $result->setSerial($extras['serial']);
                $result->setRefresh($extras['refresh']);
                $result->setRetry($extras['retry']);
                $result->setExpiry($extras['expiry']);
                $result->setMinttl($extras['minttl']);
                break;

            case 'TXT':
                $result = new DnsTXTResult($this->readResponse($buffer, $ans_header['length']));
                break;

            case 'DS':
                $stuff = $this->readResponse($buffer, $ans_header['length']);
                $length = (($ans_header['length'] - 4) * 2) - 8;
                $stuff = unpack("nkeytag/Calgo/Cdigest/H" . $length . "string/H*rest", $stuff);
                $stuff['string'] = strtoupper($stuff['string']);
                $stuff['rest'] = strtoupper($stuff['rest']);
                $result = new DnsDSresult($stuff['keytag'], $stuff['algo'], $stuff['digest'], $stuff['string'], $stuff['rest']);
                break;

            case 'DNSKEY':
                $stuff = $this->readResponse($buffer, $ans_header['length']);
                $this->keytag($stuff, $ans_header['length']);
                $this->keytag2($stuff, $ans_header['length']);
                $extras = unpack("nflags/Cprotocol/Calgorithm/a*pubkey", $stuff);
                $flags = sprintf("%016b\n", $extras['flags']);
                $result = new DnsDNSKEYresult($extras['flags'], $extras['protocol'], $extras['algorithm'], $extras['pubkey']);
                $result->setKeytag($this->keytag($stuff, $ans_header['length']));
                if ($flags{7} == '1') {
                    $result->setZoneKey(true);
                }
                if ($flags{15} == '1') {
                    $result->setSep(true);
                }
                break;

            case 'RRSIG':
                $stuff = $this->readResponse($buffer, 18);
                //$length = $ans_header['length'] - 18;
                $test = unpack("ntype/calgorithm/clabels/Noriginalttl/Nexpiration/Ninception/nkeytag", $stuff);
                $result = new DnsRRSIGresult($test['type'], $test['algorithm'], $test['labels'], $test['originalttl'], $test['expiration'], $test['inception'], $test['keytag']);
                $name = $this->ReadDomainLabel($buffer);
                $result->setSignername($name);
                $sig = $this->readResponse($buffer, $ans_header['length'] - (strlen($name) + 2) - 18);
                $result->setSignature($sig);
                $result->setSignatureBase64(base64_encode($sig));
                break;

            default: // something we can't deal with
                $result = new DnsResult();
                #echo "Length: ".$ans_header['length']."\n";
                $stuff = $this->readResponse($buffer, $ans_header['length']);
                $result->setData($stuff);
                break;

        }
        $result->setDomain($domain);
        $result->setType($ans_header['type']);
        $result->setTypeid($typeid);
        $result->setClass($ans_header['class']);
        $result->setTtl($ans_header['ttl']);
        $this->AddResult($result, $resulttype);
        return;
    }


    /**
     * @param $key
     * @param $keysize
     * @return int
     */
    private function keytag($key, $keysize)
    {
        $ac = 0;
        for ($i = 0; $i < $keysize; $i++) {
            $keyp = unpack("C", $key[$i]);
            $ac += (($i & 1) ? $keyp[1] : $keyp[1] << 8);
        }
        $ac += ($ac >> 16) & 0xFFFF;
        $keytag = $ac & 0xFFFF;
        return $keytag;
    }

    /**
     * @param $key
     * @param $keysize
     * @return int
     */
    private function keytag2($key, $keysize)
    {
        $ac = 0;
        for ($i = 0; $i < $keysize; $i++) {
            $keyp = unpack("C", $key[$i]);
            $ac += ($i % 2 ? $keyp[1] : 256 * $keyp[1]);
        }
        $ac += ($ac / 65536) % 65536;
        $keytag = $ac % 65536;
        return $keytag;
    }

    /**
     * @param $buffer
     * @return string
     */
    private function ReadDomainLabel($buffer)
    {
        $count = 0;
        $labels = $this->ReadDomainLabels($buffer, $this->responsecounter, $count);
        $domain = implode(".", $labels);
        $this->responsecounter += $count;
        #$this->writeLog("Label ".$domain." len ".$count);
        return $domain;
    }

    /**
     * @param $buffer
     * @param $offset
     * @param int $counter
     * @return array
     */
    private function ReadDomainLabels($buffer, $offset, &$counter = 0)
    {
        $labels = array();
        $startoffset = $offset;
        $return = false;
        while (!$return) {
            $label_len = ord($this->readResponse($buffer, 1, $offset++));
            if ($label_len <= 0) $return = true; // end of data
            else if ($label_len < 64) // uncompressed data
            {
                $labels[] = $this->readResponse($buffer, $label_len, $offset);
                $offset += $label_len;
            } else // label_len>=64 -- pointer
            {
                $nextitem = $this->readResponse($buffer, 1, $offset++);
                $pointer_offset = (($label_len & 0x3f) << 8) + ord($nextitem);
                // Branch Back Upon Ourselves...
                #$this->writeLog("Label Offset: ".$pointer_offset);
                $pointer_labels = $this->ReadDomainLabels($buffer, $pointer_offset);
                foreach ($pointer_labels as $ptr_label)
                    $labels[] = $ptr_label;
                $return = true;
            }
        }
        $counter = $offset - $startoffset;
        return $labels;
    }

    /**
     * @param $count
     */
    public function setResourceResultCount($count)
    {
        $this->resourceResponses = $count;
    }

    /**
     * @return mixed
     */
    public function getResourceResultCount()
    {
        return $this->resourceResponses;
    }

    /**
     * @param $count
     */
    public function setNameserverResultCount($count)
    {
        $this->nameserverResponses = $count;
    }

    /**
     * @return mixed
     */
    public function getNameserverResultCount()
    {
        return $this->nameserverResponses;
    }

    /**
     * @param $count
     */
    public function setAdditionalResultCount($count)
    {
        $this->additionalResponses = $count;
    }

    /**
     * @return mixed
     */
    public function getAdditionalResultCount()
    {
        return $this->additionalResponses;
    }

}

