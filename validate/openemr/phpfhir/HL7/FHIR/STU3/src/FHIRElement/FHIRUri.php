<?php

namespace HL7\FHIR\STU3\FHIRElement;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 *
 * Class creation date: February 10th, 2018
 */

use HL7\FHIR\STU3\FHIRElement;

/**
 * String of characters used to identify a name or a resource
 * see http://en.wikipedia.org/wiki/Uniform_resource_identifier
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRUri extends FHIRElement implements \JsonSerializable
{
    /**
     * @var string
     */
    public $value = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'uri';

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
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
        if (is_scalar($data)) {
            $this->setValue($data);
        } else {
            parent::__construct($data);
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return $this->value;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) {
            $sxe = new \SimpleXMLElement('<uri xmlns="http://hl7.org/fhir"></uri>');
        }
        $sxe->addAttribute('value', $this->value);
        if ($returnSXE) {
            return $sxe;
        }
        return $sxe->saveXML();
    }
}
