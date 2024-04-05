<?php

namespace HL7\FHIR\STU3\FHIRResource\FHIRMeasure;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 *
 * Class creation date: February 10th, 2018
 */

use HL7\FHIR\STU3\FHIRElement\FHIRBackboneElement;

/**
 * The Measure resource provides the definition of a quality measure.
 */
class FHIRMeasureGroup extends FHIRBackboneElement implements \JsonSerializable
{
    /**
     * A unique identifier for the group. This identifier will used to report data for the group in the measure report.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier
     */
    public $identifier = null;

    /**
     * Optional name or short description of this group.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * The human readable description of this population group.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $description = null;

    /**
     * A population criteria for the measure.
     * @var \HL7\FHIR\STU3\FHIRResource\FHIRMeasure\FHIRMeasurePopulation[]
     */
    public $population = [];

    /**
     * The stratifier criteria for the measure report, specified as either the name of a valid CQL expression defined within a referenced library, or a valid FHIR Resource Path.
     * @var \HL7\FHIR\STU3\FHIRResource\FHIRMeasure\FHIRMeasureStratifier[]
     */
    public $stratifier = [];

    /**
     * @var string
     */
    private $_fhirElementName = 'Measure.Group';

    /**
     * A unique identifier for the group. This identifier will used to report data for the group in the measure report.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * A unique identifier for the group. This identifier will used to report data for the group in the measure report.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * Optional name or short description of this group.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Optional name or short description of this group.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The human readable description of this population group.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * The human readable description of this population group.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * A population criteria for the measure.
     * @return \HL7\FHIR\STU3\FHIRResource\FHIRMeasure\FHIRMeasurePopulation[]
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * A population criteria for the measure.
     * @param \HL7\FHIR\STU3\FHIRResource\FHIRMeasure\FHIRMeasurePopulation $population
     * @return $this
     */
    public function addPopulation($population)
    {
        $this->population[] = $population;
        return $this;
    }

    /**
     * The stratifier criteria for the measure report, specified as either the name of a valid CQL expression defined within a referenced library, or a valid FHIR Resource Path.
     * @return \HL7\FHIR\STU3\FHIRResource\FHIRMeasure\FHIRMeasureStratifier[]
     */
    public function getStratifier()
    {
        return $this->stratifier;
    }

    /**
     * The stratifier criteria for the measure report, specified as either the name of a valid CQL expression defined within a referenced library, or a valid FHIR Resource Path.
     * @param \HL7\FHIR\STU3\FHIRResource\FHIRMeasure\FHIRMeasureStratifier $stratifier
     * @return $this
     */
    public function addStratifier($stratifier)
    {
        $this->stratifier[] = $stratifier;
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
            if (isset($data['identifier'])) {
                $this->setIdentifier($data['identifier']);
            }
            if (isset($data['name'])) {
                $this->setName($data['name']);
            }
            if (isset($data['description'])) {
                $this->setDescription($data['description']);
            }
            if (isset($data['population'])) {
                if (is_array($data['population'])) {
                    foreach ($data['population'] as $d) {
                        $this->addPopulation($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"population" must be array of objects or null, '.gettype($data['population']).' seen.');
                }
            }
            if (isset($data['stratifier'])) {
                if (is_array($data['stratifier'])) {
                    foreach ($data['stratifier'] as $d) {
                        $this->addStratifier($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"stratifier" must be array of objects or null, '.gettype($data['stratifier']).' seen.');
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
        if (isset($this->identifier)) {
            $json['identifier'] = $this->identifier;
        }
        if (isset($this->name)) {
            $json['name'] = $this->name;
        }
        if (isset($this->description)) {
            $json['description'] = $this->description;
        }
        if (0 < count($this->population)) {
            $json['population'] = [];
            foreach ($this->population as $population) {
                $json['population'][] = $population;
            }
        }
        if (0 < count($this->stratifier)) {
            $json['stratifier'] = [];
            foreach ($this->stratifier as $stratifier) {
                $json['stratifier'][] = $stratifier;
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
            $sxe = new \SimpleXMLElement('<MeasureGroup xmlns="http://hl7.org/fhir"></MeasureGroup>');
        }
        parent::xmlSerialize(true, $sxe);
        if (isset($this->identifier)) {
            $this->identifier->xmlSerialize(true, $sxe->addChild('identifier'));
        }
        if (isset($this->name)) {
            $this->name->xmlSerialize(true, $sxe->addChild('name'));
        }
        if (isset($this->description)) {
            $this->description->xmlSerialize(true, $sxe->addChild('description'));
        }
        if (0 < count($this->population)) {
            foreach ($this->population as $population) {
                $population->xmlSerialize(true, $sxe->addChild('population'));
            }
        }
        if (0 < count($this->stratifier)) {
            foreach ($this->stratifier as $stratifier) {
                $stratifier->xmlSerialize(true, $sxe->addChild('stratifier'));
            }
        }
        if ($returnSXE) {
            return $sxe;
        }
        return $sxe->saveXML();
    }
}
