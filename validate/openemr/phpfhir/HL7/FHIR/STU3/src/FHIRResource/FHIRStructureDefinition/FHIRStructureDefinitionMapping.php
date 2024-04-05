<?php

namespace HL7\FHIR\STU3\FHIRResource\FHIRStructureDefinition;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 *
 * Class creation date: February 10th, 2018
 */

use HL7\FHIR\STU3\FHIRElement\FHIRBackboneElement;

/**
 * A definition of a FHIR structure. This resource is used to describe the underlying resources, data types defined in FHIR, and also for describing extensions and constraints on resources and data types.
 */
class FHIRStructureDefinitionMapping extends FHIRBackboneElement implements \JsonSerializable
{
    /**
     * An Internal id that is used to identify this mapping set when specific mappings are made.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRId
     */
    public $identity = null;

    /**
     * An absolute URI that identifies the specification that this mapping is expressed to.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRUri
     */
    public $uri = null;

    /**
     * A name for the specification that is being mapped to.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * Comments about this mapping, including version notes, issues, scope limitations, and other important notes for usage.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $comment = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'StructureDefinition.Mapping';

    /**
     * An Internal id that is used to identify this mapping set when specific mappings are made.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRId
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * An Internal id that is used to identify this mapping set when specific mappings are made.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRId $identity
     * @return $this
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;
        return $this;
    }

    /**
     * An absolute URI that identifies the specification that this mapping is expressed to.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRUri
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * An absolute URI that identifies the specification that this mapping is expressed to.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRUri $uri
     * @return $this
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * A name for the specification that is being mapped to.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A name for the specification that is being mapped to.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Comments about this mapping, including version notes, issues, scope limitations, and other important notes for usage.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Comments about this mapping, including version notes, issues, scope limitations, and other important notes for usage.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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
            if (isset($data['identity'])) {
                $this->setIdentity($data['identity']);
            }
            if (isset($data['uri'])) {
                $this->setUri($data['uri']);
            }
            if (isset($data['name'])) {
                $this->setName($data['name']);
            }
            if (isset($data['comment'])) {
                $this->setComment($data['comment']);
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
        if (isset($this->identity)) {
            $json['identity'] = $this->identity;
        }
        if (isset($this->uri)) {
            $json['uri'] = $this->uri;
        }
        if (isset($this->name)) {
            $json['name'] = $this->name;
        }
        if (isset($this->comment)) {
            $json['comment'] = $this->comment;
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
            $sxe = new \SimpleXMLElement('<StructureDefinitionMapping xmlns="http://hl7.org/fhir"></StructureDefinitionMapping>');
        }
        parent::xmlSerialize(true, $sxe);
        if (isset($this->identity)) {
            $this->identity->xmlSerialize(true, $sxe->addChild('identity'));
        }
        if (isset($this->uri)) {
            $this->uri->xmlSerialize(true, $sxe->addChild('uri'));
        }
        if (isset($this->name)) {
            $this->name->xmlSerialize(true, $sxe->addChild('name'));
        }
        if (isset($this->comment)) {
            $this->comment->xmlSerialize(true, $sxe->addChild('comment'));
        }
        if ($returnSXE) {
            return $sxe;
        }
        return $sxe->saveXML();
    }
}
