<?php

namespace HL7\FHIR\STU3\FHIRResource\FHIRBundle;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 *
 * Class creation date: February 10th, 2018
 */

use HL7\FHIR\STU3\FHIRElement\FHIRBackboneElement;

/**
 * A container for a collection of resources.
 */
class FHIRBundleLink extends FHIRBackboneElement implements \JsonSerializable
{
    /**
     * A name which details the functional use for this link - see [http://www.iana.org/assignments/link-relations/link-relations.xhtml#link-relations-1](http://www.iana.org/assignments/link-relations/link-relations.xhtml#link-relations-1).
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $relation = null;

    /**
     * The reference details for the link.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRUri
     */
    public $url = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'Bundle.Link';

    /**
     * A name which details the functional use for this link - see [http://www.iana.org/assignments/link-relations/link-relations.xhtml#link-relations-1](http://www.iana.org/assignments/link-relations/link-relations.xhtml#link-relations-1).
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * A name which details the functional use for this link - see [http://www.iana.org/assignments/link-relations/link-relations.xhtml#link-relations-1](http://www.iana.org/assignments/link-relations/link-relations.xhtml#link-relations-1).
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $relation
     * @return $this
     */
    public function setRelation($relation)
    {
        $this->relation = $relation;
        return $this;
    }

    /**
     * The reference details for the link.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRUri
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * The reference details for the link.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRUri $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function get_fhirElementName()
    {
        return $this->_fhirElementName;
    }

    /**
     * @param mixed $data
     */
    public function __construct($data = [])
    {
        if (is_array($data)) {
            if (isset($data['relation'])) {
                $this->setRelation($data['relation']);
            }
            if (isset($data['url'])) {
                $this->setUrl($data['url']);
            }
        } elseif (null !== $data) {
            throw new \InvalidArgumentException('$data expected to be array of values, saw "'.gettype($data).'"');
        }
        parent::__construct($data);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->get_fhirElementName();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();
        if (isset($this->relation)) {
            $json['relation'] = $this->relation;
        }
        if (isset($this->url)) {
            $json['url'] = $this->url;
        }
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) {
            $sxe = new \SimpleXMLElement('<BundleLink xmlns="http://hl7.org/fhir"></BundleLink>');
        }
        parent::xmlSerialize(true, $sxe);
        if (isset($this->relation)) {
            $this->relation->xmlSerialize(true, $sxe->addChild('relation'));
        }
        if (isset($this->url)) {
            $this->url->xmlSerialize(true, $sxe->addChild('url'));
        }
        if ($returnSXE) {
            return $sxe;
        }
        return $sxe->saveXML();
    }
}
