<?php

namespace HL7\FHIR\STU3\FHIRDomainResource;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 *
 * Class creation date: February 10th, 2018
 */

use HL7\FHIR\STU3\FHIRResource\FHIRDomainResource;

/**
 * A specific set of Roles/Locations/specialties/services that a practitioner may perform at an organization for a period of time.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRPractitionerRole extends FHIRDomainResource implements \JsonSerializable
{
    /**
     * Business Identifiers that are specific to a role/location.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = [];

    /**
     * Whether this practitioner's record is in active use.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRBoolean
     */
    public $active = null;

    /**
     * The period during which the person is authorized to act as a practitioner in these role(s) for the organization.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRPeriod
     */
    public $period = null;

    /**
     * Practitioner that is able to provide the defined services for the organation.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public $practitioner = null;

    /**
     * The organization where the Practitioner performs the roles associated.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public $organization = null;

    /**
     * Roles which this practitioner is authorized to perform for the organization.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public $code = [];

    /**
     * Specific specialty of the practitioner.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public $specialty = [];

    /**
     * The location(s) at which this practitioner provides care.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public $location = [];

    /**
     * The list of healthcare services that this worker provides for this role's Organization/Location(s).
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public $healthcareService = [];

    /**
     * Contact details that are specific to the role/location/service.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRContactPoint[]
     */
    public $telecom = [];

    /**
     * A collection of times that the Service Site is available.
     * @var \HL7\FHIR\STU3\FHIRResource\FHIRPractitionerRole\FHIRPractitionerRoleAvailableTime[]
     */
    public $availableTime = [];

    /**
     * The HealthcareService is not available during this period of time due to the provided reason.
     * @var \HL7\FHIR\STU3\FHIRResource\FHIRPractitionerRole\FHIRPractitionerRoleNotAvailable[]
     */
    public $notAvailable = [];

    /**
     * A description of site availability exceptions, e.g. public holiday availability. Succinctly describing all possible exceptions to normal site availability as details in the available Times and not available Times.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $availabilityExceptions = null;

    /**
     * Technical endpoints providing access to services operated for the practitioner with this role.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public $endpoint = [];

    /**
     * @var string
     */
    private $_fhirElementName = 'PractitionerRole';

    /**
     * Business Identifiers that are specific to a role/location.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Business Identifiers that are specific to a role/location.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * Whether this practitioner's record is in active use.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRBoolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Whether this practitioner's record is in active use.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRBoolean $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * The period during which the person is authorized to act as a practitioner in these role(s) for the organization.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRPeriod
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * The period during which the person is authorized to act as a practitioner in these role(s) for the organization.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRPeriod $period
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * Practitioner that is able to provide the defined services for the organation.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public function getPractitioner()
    {
        return $this->practitioner;
    }

    /**
     * Practitioner that is able to provide the defined services for the organation.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $practitioner
     * @return $this
     */
    public function setPractitioner($practitioner)
    {
        $this->practitioner = $practitioner;
        return $this;
    }

    /**
     * The organization where the Practitioner performs the roles associated.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * The organization where the Practitioner performs the roles associated.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $organization
     * @return $this
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
        return $this;
    }

    /**
     * Roles which this practitioner is authorized to perform for the organization.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Roles which this practitioner is authorized to perform for the organization.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept $code
     * @return $this
     */
    public function addCode($code)
    {
        $this->code[] = $code;
        return $this;
    }

    /**
     * Specific specialty of the practitioner.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public function getSpecialty()
    {
        return $this->specialty;
    }

    /**
     * Specific specialty of the practitioner.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept $specialty
     * @return $this
     */
    public function addSpecialty($specialty)
    {
        $this->specialty[] = $specialty;
        return $this;
    }

    /**
     * The location(s) at which this practitioner provides care.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * The location(s) at which this practitioner provides care.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $location
     * @return $this
     */
    public function addLocation($location)
    {
        $this->location[] = $location;
        return $this;
    }

    /**
     * The list of healthcare services that this worker provides for this role's Organization/Location(s).
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public function getHealthcareService()
    {
        return $this->healthcareService;
    }

    /**
     * The list of healthcare services that this worker provides for this role's Organization/Location(s).
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $healthcareService
     * @return $this
     */
    public function addHealthcareService($healthcareService)
    {
        $this->healthcareService[] = $healthcareService;
        return $this;
    }

    /**
     * Contact details that are specific to the role/location/service.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRContactPoint[]
     */
    public function getTelecom()
    {
        return $this->telecom;
    }

    /**
     * Contact details that are specific to the role/location/service.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRContactPoint $telecom
     * @return $this
     */
    public function addTelecom($telecom)
    {
        $this->telecom[] = $telecom;
        return $this;
    }

    /**
     * A collection of times that the Service Site is available.
     * @return \HL7\FHIR\STU3\FHIRResource\FHIRPractitionerRole\FHIRPractitionerRoleAvailableTime[]
     */
    public function getAvailableTime()
    {
        return $this->availableTime;
    }

    /**
     * A collection of times that the Service Site is available.
     * @param \HL7\FHIR\STU3\FHIRResource\FHIRPractitionerRole\FHIRPractitionerRoleAvailableTime $availableTime
     * @return $this
     */
    public function addAvailableTime($availableTime)
    {
        $this->availableTime[] = $availableTime;
        return $this;
    }

    /**
     * The HealthcareService is not available during this period of time due to the provided reason.
     * @return \HL7\FHIR\STU3\FHIRResource\FHIRPractitionerRole\FHIRPractitionerRoleNotAvailable[]
     */
    public function getNotAvailable()
    {
        return $this->notAvailable;
    }

    /**
     * The HealthcareService is not available during this period of time due to the provided reason.
     * @param \HL7\FHIR\STU3\FHIRResource\FHIRPractitionerRole\FHIRPractitionerRoleNotAvailable $notAvailable
     * @return $this
     */
    public function addNotAvailable($notAvailable)
    {
        $this->notAvailable[] = $notAvailable;
        return $this;
    }

    /**
     * A description of site availability exceptions, e.g. public holiday availability. Succinctly describing all possible exceptions to normal site availability as details in the available Times and not available Times.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getAvailabilityExceptions()
    {
        return $this->availabilityExceptions;
    }

    /**
     * A description of site availability exceptions, e.g. public holiday availability. Succinctly describing all possible exceptions to normal site availability as details in the available Times and not available Times.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $availabilityExceptions
     * @return $this
     */
    public function setAvailabilityExceptions($availabilityExceptions)
    {
        $this->availabilityExceptions = $availabilityExceptions;
        return $this;
    }

    /**
     * Technical endpoints providing access to services operated for the practitioner with this role.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Technical endpoints providing access to services operated for the practitioner with this role.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $endpoint
     * @return $this
     */
    public function addEndpoint($endpoint)
    {
        $this->endpoint[] = $endpoint;
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
                if (is_array($data['identifier'])) {
                    foreach ($data['identifier'] as $d) {
                        $this->addIdentifier($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"identifier" must be array of objects or null, '.gettype($data['identifier']).' seen.');
                }
            }
            if (isset($data['active'])) {
                $this->setActive($data['active']);
            }
            if (isset($data['period'])) {
                $this->setPeriod($data['period']);
            }
            if (isset($data['practitioner'])) {
                $this->setPractitioner($data['practitioner']);
            }
            if (isset($data['organization'])) {
                $this->setOrganization($data['organization']);
            }
            if (isset($data['code'])) {
                if (is_array($data['code'])) {
                    foreach ($data['code'] as $d) {
                        $this->addCode($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"code" must be array of objects or null, '.gettype($data['code']).' seen.');
                }
            }
            if (isset($data['specialty'])) {
                if (is_array($data['specialty'])) {
                    foreach ($data['specialty'] as $d) {
                        $this->addSpecialty($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"specialty" must be array of objects or null, '.gettype($data['specialty']).' seen.');
                }
            }
            if (isset($data['location'])) {
                if (is_array($data['location'])) {
                    foreach ($data['location'] as $d) {
                        $this->addLocation($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"location" must be array of objects or null, '.gettype($data['location']).' seen.');
                }
            }
            if (isset($data['healthcareService'])) {
                if (is_array($data['healthcareService'])) {
                    foreach ($data['healthcareService'] as $d) {
                        $this->addHealthcareService($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"healthcareService" must be array of objects or null, '.gettype($data['healthcareService']).' seen.');
                }
            }
            if (isset($data['telecom'])) {
                if (is_array($data['telecom'])) {
                    foreach ($data['telecom'] as $d) {
                        $this->addTelecom($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"telecom" must be array of objects or null, '.gettype($data['telecom']).' seen.');
                }
            }
            if (isset($data['availableTime'])) {
                if (is_array($data['availableTime'])) {
                    foreach ($data['availableTime'] as $d) {
                        $this->addAvailableTime($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"availableTime" must be array of objects or null, '.gettype($data['availableTime']).' seen.');
                }
            }
            if (isset($data['notAvailable'])) {
                if (is_array($data['notAvailable'])) {
                    foreach ($data['notAvailable'] as $d) {
                        $this->addNotAvailable($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"notAvailable" must be array of objects or null, '.gettype($data['notAvailable']).' seen.');
                }
            }
            if (isset($data['availabilityExceptions'])) {
                $this->setAvailabilityExceptions($data['availabilityExceptions']);
            }
            if (isset($data['endpoint'])) {
                if (is_array($data['endpoint'])) {
                    foreach ($data['endpoint'] as $d) {
                        $this->addEndpoint($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"endpoint" must be array of objects or null, '.gettype($data['endpoint']).' seen.');
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
        $json['resourceType'] = $this->_fhirElementName;
        if (0 < count($this->identifier)) {
            $json['identifier'] = [];
            foreach ($this->identifier as $identifier) {
                $json['identifier'][] = $identifier;
            }
        }
        if (isset($this->active)) {
            $json['active'] = $this->active;
        }
        if (isset($this->period)) {
            $json['period'] = $this->period;
        }
        if (isset($this->practitioner)) {
            $json['practitioner'] = $this->practitioner;
        }
        if (isset($this->organization)) {
            $json['organization'] = $this->organization;
        }
        if (0 < count($this->code)) {
            $json['code'] = [];
            foreach ($this->code as $code) {
                $json['code'][] = $code;
            }
        }
        if (0 < count($this->specialty)) {
            $json['specialty'] = [];
            foreach ($this->specialty as $specialty) {
                $json['specialty'][] = $specialty;
            }
        }
        if (0 < count($this->location)) {
            $json['location'] = [];
            foreach ($this->location as $location) {
                $json['location'][] = $location;
            }
        }
        if (0 < count($this->healthcareService)) {
            $json['healthcareService'] = [];
            foreach ($this->healthcareService as $healthcareService) {
                $json['healthcareService'][] = $healthcareService;
            }
        }
        if (0 < count($this->telecom)) {
            $json['telecom'] = [];
            foreach ($this->telecom as $telecom) {
                $json['telecom'][] = $telecom;
            }
        }
        if (0 < count($this->availableTime)) {
            $json['availableTime'] = [];
            foreach ($this->availableTime as $availableTime) {
                $json['availableTime'][] = $availableTime;
            }
        }
        if (0 < count($this->notAvailable)) {
            $json['notAvailable'] = [];
            foreach ($this->notAvailable as $notAvailable) {
                $json['notAvailable'][] = $notAvailable;
            }
        }
        if (isset($this->availabilityExceptions)) {
            $json['availabilityExceptions'] = $this->availabilityExceptions;
        }
        if (0 < count($this->endpoint)) {
            $json['endpoint'] = [];
            foreach ($this->endpoint as $endpoint) {
                $json['endpoint'][] = $endpoint;
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
            $sxe = new \SimpleXMLElement('<PractitionerRole xmlns="http://hl7.org/fhir"></PractitionerRole>');
        }
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach ($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (isset($this->active)) {
            $this->active->xmlSerialize(true, $sxe->addChild('active'));
        }
        if (isset($this->period)) {
            $this->period->xmlSerialize(true, $sxe->addChild('period'));
        }
        if (isset($this->practitioner)) {
            $this->practitioner->xmlSerialize(true, $sxe->addChild('practitioner'));
        }
        if (isset($this->organization)) {
            $this->organization->xmlSerialize(true, $sxe->addChild('organization'));
        }
        if (0 < count($this->code)) {
            foreach ($this->code as $code) {
                $code->xmlSerialize(true, $sxe->addChild('code'));
            }
        }
        if (0 < count($this->specialty)) {
            foreach ($this->specialty as $specialty) {
                $specialty->xmlSerialize(true, $sxe->addChild('specialty'));
            }
        }
        if (0 < count($this->location)) {
            foreach ($this->location as $location) {
                $location->xmlSerialize(true, $sxe->addChild('location'));
            }
        }
        if (0 < count($this->healthcareService)) {
            foreach ($this->healthcareService as $healthcareService) {
                $healthcareService->xmlSerialize(true, $sxe->addChild('healthcareService'));
            }
        }
        if (0 < count($this->telecom)) {
            foreach ($this->telecom as $telecom) {
                $telecom->xmlSerialize(true, $sxe->addChild('telecom'));
            }
        }
        if (0 < count($this->availableTime)) {
            foreach ($this->availableTime as $availableTime) {
                $availableTime->xmlSerialize(true, $sxe->addChild('availableTime'));
            }
        }
        if (0 < count($this->notAvailable)) {
            foreach ($this->notAvailable as $notAvailable) {
                $notAvailable->xmlSerialize(true, $sxe->addChild('notAvailable'));
            }
        }
        if (isset($this->availabilityExceptions)) {
            $this->availabilityExceptions->xmlSerialize(true, $sxe->addChild('availabilityExceptions'));
        }
        if (0 < count($this->endpoint)) {
            foreach ($this->endpoint as $endpoint) {
                $endpoint->xmlSerialize(true, $sxe->addChild('endpoint'));
            }
        }
        if ($returnSXE) {
            return $sxe;
        }
        return $sxe->saveXML();
    }
}
