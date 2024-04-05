<?php

namespace HL7\FHIR\STU3\FHIRResource\FHIRContract;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 *
 * Class creation date: February 10th, 2018
 */

use HL7\FHIR\STU3\FHIRElement\FHIRBackboneElement;

/**
 * A formal agreement between parties regarding the conduct of business, exchange of information or other matters.
 */
class FHIRContractAgent extends FHIRBackboneElement implements \JsonSerializable
{
    /**
     * Who or what parties are assigned roles in this Contract.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public $actor = null;

    /**
     * Role type of agent assigned roles in this Contract.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public $role = [];

    /**
     * @var string
     */
    private $_fhirElementName = 'Contract.Agent';

    /**
     * Who or what parties are assigned roles in this Contract.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Who or what parties are assigned roles in this Contract.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $actor
     * @return $this
     */
    public function setActor($actor)
    {
        $this->actor = $actor;
        return $this;
    }

    /**
     * Role type of agent assigned roles in this Contract.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Role type of agent assigned roles in this Contract.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept $role
     * @return $this
     */
    public function addRole($role)
    {
        $this->role[] = $role;
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
            if (isset($data['actor'])) {
                $this->setActor($data['actor']);
            }
            if (isset($data['role'])) {
                if (is_array($data['role'])) {
                    foreach ($data['role'] as $d) {
                        $this->addRole($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"role" must be array of objects or null, '.gettype($data['role']).' seen.');
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
        if (isset($this->actor)) {
            $json['actor'] = $this->actor;
        }
        if (0 < count($this->role)) {
            $json['role'] = [];
            foreach ($this->role as $role) {
                $json['role'][] = $role;
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
            $sxe = new \SimpleXMLElement('<ContractAgent xmlns="http://hl7.org/fhir"></ContractAgent>');
        }
        parent::xmlSerialize(true, $sxe);
        if (isset($this->actor)) {
            $this->actor->xmlSerialize(true, $sxe->addChild('actor'));
        }
        if (0 < count($this->role)) {
            foreach ($this->role as $role) {
                $role->xmlSerialize(true, $sxe->addChild('role'));
            }
        }
        if ($returnSXE) {
            return $sxe;
        }
        return $sxe->saveXML();
    }
}
