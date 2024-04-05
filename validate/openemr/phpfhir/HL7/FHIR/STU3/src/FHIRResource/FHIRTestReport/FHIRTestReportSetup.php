<?php

namespace HL7\FHIR\STU3\FHIRResource\FHIRTestReport;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 *
 * Class creation date: February 10th, 2018
 */

use HL7\FHIR\STU3\FHIRElement\FHIRBackboneElement;

/**
 * A summary of information based on the results of executing a TestScript.
 */
class FHIRTestReportSetup extends FHIRBackboneElement implements \JsonSerializable
{
    /**
     * Action would contain either an operation or an assertion.
     * @var \HL7\FHIR\STU3\FHIRResource\FHIRTestReport\FHIRTestReportAction[]
     */
    public $action = [];

    /**
     * @var string
     */
    private $_fhirElementName = 'TestReport.Setup';

    /**
     * Action would contain either an operation or an assertion.
     * @return \HL7\FHIR\STU3\FHIRResource\FHIRTestReport\FHIRTestReportAction[]
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Action would contain either an operation or an assertion.
     * @param \HL7\FHIR\STU3\FHIRResource\FHIRTestReport\FHIRTestReportAction $action
     * @return $this
     */
    public function addAction($action)
    {
        $this->action[] = $action;
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
            if (isset($data['action'])) {
                if (is_array($data['action'])) {
                    foreach ($data['action'] as $d) {
                        $this->addAction($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"action" must be array of objects or null, '.gettype($data['action']).' seen.');
                }
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
        if (0 < count($this->action)) {
            $json['action'] = [];
            foreach ($this->action as $action) {
                $json['action'][] = $action;
            }
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
            $sxe = new \SimpleXMLElement('<TestReportSetup xmlns="http://hl7.org/fhir"></TestReportSetup>');
        }
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->action)) {
            foreach ($this->action as $action) {
                $action->xmlSerialize(true, $sxe->addChild('action'));
            }
        }
        if ($returnSXE) {
            return $sxe;
        }
        return $sxe->saveXML();
    }
}
