<?php

namespace HL7\FHIR\STU3\FHIRResource\FHIRCommunicationRequest;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 *
 * Class creation date: February 10th, 2018
 */

use HL7\FHIR\STU3\FHIRElement\FHIRBackboneElement;

/**
 * A request to convey information; e.g. the CDS system proposes that an alert be sent to a responsible provider, the CDS system proposes that the public health agency be notified about a reportable condition.
 */
class FHIRCommunicationRequestRequester extends FHIRBackboneElement implements \JsonSerializable
{
    /**
     * The device, practitioner, etc. who initiated the request.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public $agent = null;

    /**
     * The organization the device or practitioner was acting on behalf of.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public $onBehalfOf = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'CommunicationRequest.Requester';

    /**
     * The device, practitioner, etc. who initiated the request.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * The device, practitioner, etc. who initiated the request.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $agent
     * @return $this
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;
        return $this;
    }

    /**
     * The organization the device or practitioner was acting on behalf of.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public function getOnBehalfOf()
    {
        return $this->onBehalfOf;
    }

    /**
     * The organization the device or practitioner was acting on behalf of.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $onBehalfOf
     * @return $this
     */
    public function setOnBehalfOf($onBehalfOf)
    {
        $this->onBehalfOf = $onBehalfOf;
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
            if (isset($data['agent'])) {
                $this->setAgent($data['agent']);
            }
            if (isset($data['onBehalfOf'])) {
                $this->setOnBehalfOf($data['onBehalfOf']);
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
        if (isset($this->agent)) {
            $json['agent'] = $this->agent;
        }
        if (isset($this->onBehalfOf)) {
            $json['onBehalfOf'] = $this->onBehalfOf;
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
            $sxe = new \SimpleXMLElement('<CommunicationRequestRequester xmlns="http://hl7.org/fhir"></CommunicationRequestRequester>');
        }
        parent::xmlSerialize(true, $sxe);
        if (isset($this->agent)) {
            $this->agent->xmlSerialize(true, $sxe->addChild('agent'));
        }
        if (isset($this->onBehalfOf)) {
            $this->onBehalfOf->xmlSerialize(true, $sxe->addChild('onBehalfOf'));
        }
        if ($returnSXE) {
            return $sxe;
        }
        return $sxe->saveXML();
    }
}
