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
 * An association between a patient and an organization / healthcare provider(s) during which time encounters may occur. The managing organization assumes a level of responsibility for the patient during this time.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIREpisodeOfCare extends FHIRDomainResource implements \JsonSerializable
{
    /**
     * The EpisodeOfCare may be known by different identifiers for different contexts of use, such as when an external agency is tracking the Episode for funding purposes.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = [];

    /**
     * planned | waitlist | active | onhold | finished | cancelled.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIREpisodeOfCareStatus
     */
    public $status = null;

    /**
     * The history of statuses that the EpisodeOfCare has been through (without requiring processing the history of the resource).
     * @var \HL7\FHIR\STU3\FHIRResource\FHIREpisodeOfCare\FHIREpisodeOfCareStatusHistory[]
     */
    public $statusHistory = [];

    /**
     * A classification of the type of episode of care; e.g. specialist referral, disease management, type of funded care.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public $type = [];

    /**
     * The list of diagnosis relevant to this episode of care.
     * @var \HL7\FHIR\STU3\FHIRResource\FHIREpisodeOfCare\FHIREpisodeOfCareDiagnosis[]
     */
    public $diagnosis = [];

    /**
     * The patient who is the focus of this episode of care.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public $patient = null;

    /**
     * The organization that has assumed the specific responsibilities for the specified duration.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public $managingOrganization = null;

    /**
     * The interval during which the managing organization assumes the defined responsibility.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRPeriod
     */
    public $period = null;

    /**
     * Referral Request(s) that are fulfilled by this EpisodeOfCare, incoming referrals.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public $referralRequest = [];

    /**
     * The practitioner that is the care manager/care co-ordinator for this patient.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public $careManager = null;

    /**
     * The list of practitioners that may be facilitating this episode of care for specific purposes.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public $team = [];

    /**
     * The set of accounts that may be used for billing for this EpisodeOfCare.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public $account = [];

    /**
     * @var string
     */
    private $_fhirElementName = 'EpisodeOfCare';

    /**
     * The EpisodeOfCare may be known by different identifiers for different contexts of use, such as when an external agency is tracking the Episode for funding purposes.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * The EpisodeOfCare may be known by different identifiers for different contexts of use, such as when an external agency is tracking the Episode for funding purposes.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * planned | waitlist | active | onhold | finished | cancelled.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIREpisodeOfCareStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * planned | waitlist | active | onhold | finished | cancelled.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIREpisodeOfCareStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * The history of statuses that the EpisodeOfCare has been through (without requiring processing the history of the resource).
     * @return \HL7\FHIR\STU3\FHIRResource\FHIREpisodeOfCare\FHIREpisodeOfCareStatusHistory[]
     */
    public function getStatusHistory()
    {
        return $this->statusHistory;
    }

    /**
     * The history of statuses that the EpisodeOfCare has been through (without requiring processing the history of the resource).
     * @param \HL7\FHIR\STU3\FHIRResource\FHIREpisodeOfCare\FHIREpisodeOfCareStatusHistory $statusHistory
     * @return $this
     */
    public function addStatusHistory($statusHistory)
    {
        $this->statusHistory[] = $statusHistory;
        return $this;
    }

    /**
     * A classification of the type of episode of care; e.g. specialist referral, disease management, type of funded care.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * A classification of the type of episode of care; e.g. specialist referral, disease management, type of funded care.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept $type
     * @return $this
     */
    public function addType($type)
    {
        $this->type[] = $type;
        return $this;
    }

    /**
     * The list of diagnosis relevant to this episode of care.
     * @return \HL7\FHIR\STU3\FHIRResource\FHIREpisodeOfCare\FHIREpisodeOfCareDiagnosis[]
     */
    public function getDiagnosis()
    {
        return $this->diagnosis;
    }

    /**
     * The list of diagnosis relevant to this episode of care.
     * @param \HL7\FHIR\STU3\FHIRResource\FHIREpisodeOfCare\FHIREpisodeOfCareDiagnosis $diagnosis
     * @return $this
     */
    public function addDiagnosis($diagnosis)
    {
        $this->diagnosis[] = $diagnosis;
        return $this;
    }

    /**
     * The patient who is the focus of this episode of care.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * The patient who is the focus of this episode of care.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * The organization that has assumed the specific responsibilities for the specified duration.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public function getManagingOrganization()
    {
        return $this->managingOrganization;
    }

    /**
     * The organization that has assumed the specific responsibilities for the specified duration.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $managingOrganization
     * @return $this
     */
    public function setManagingOrganization($managingOrganization)
    {
        $this->managingOrganization = $managingOrganization;
        return $this;
    }

    /**
     * The interval during which the managing organization assumes the defined responsibility.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRPeriod
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * The interval during which the managing organization assumes the defined responsibility.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRPeriod $period
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * Referral Request(s) that are fulfilled by this EpisodeOfCare, incoming referrals.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public function getReferralRequest()
    {
        return $this->referralRequest;
    }

    /**
     * Referral Request(s) that are fulfilled by this EpisodeOfCare, incoming referrals.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $referralRequest
     * @return $this
     */
    public function addReferralRequest($referralRequest)
    {
        $this->referralRequest[] = $referralRequest;
        return $this;
    }

    /**
     * The practitioner that is the care manager/care co-ordinator for this patient.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference
     */
    public function getCareManager()
    {
        return $this->careManager;
    }

    /**
     * The practitioner that is the care manager/care co-ordinator for this patient.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $careManager
     * @return $this
     */
    public function setCareManager($careManager)
    {
        $this->careManager = $careManager;
        return $this;
    }

    /**
     * The list of practitioners that may be facilitating this episode of care for specific purposes.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * The list of practitioners that may be facilitating this episode of care for specific purposes.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $team
     * @return $this
     */
    public function addTeam($team)
    {
        $this->team[] = $team;
        return $this;
    }

    /**
     * The set of accounts that may be used for billing for this EpisodeOfCare.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * The set of accounts that may be used for billing for this EpisodeOfCare.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $account
     * @return $this
     */
    public function addAccount($account)
    {
        $this->account[] = $account;
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
            if (isset($data['status'])) {
                $this->setStatus($data['status']);
            }
            if (isset($data['statusHistory'])) {
                if (is_array($data['statusHistory'])) {
                    foreach ($data['statusHistory'] as $d) {
                        $this->addStatusHistory($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"statusHistory" must be array of objects or null, '.gettype($data['statusHistory']).' seen.');
                }
            }
            if (isset($data['type'])) {
                if (is_array($data['type'])) {
                    foreach ($data['type'] as $d) {
                        $this->addType($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"type" must be array of objects or null, '.gettype($data['type']).' seen.');
                }
            }
            if (isset($data['diagnosis'])) {
                if (is_array($data['diagnosis'])) {
                    foreach ($data['diagnosis'] as $d) {
                        $this->addDiagnosis($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"diagnosis" must be array of objects or null, '.gettype($data['diagnosis']).' seen.');
                }
            }
            if (isset($data['patient'])) {
                $this->setPatient($data['patient']);
            }
            if (isset($data['managingOrganization'])) {
                $this->setManagingOrganization($data['managingOrganization']);
            }
            if (isset($data['period'])) {
                $this->setPeriod($data['period']);
            }
            if (isset($data['referralRequest'])) {
                if (is_array($data['referralRequest'])) {
                    foreach ($data['referralRequest'] as $d) {
                        $this->addReferralRequest($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"referralRequest" must be array of objects or null, '.gettype($data['referralRequest']).' seen.');
                }
            }
            if (isset($data['careManager'])) {
                $this->setCareManager($data['careManager']);
            }
            if (isset($data['team'])) {
                if (is_array($data['team'])) {
                    foreach ($data['team'] as $d) {
                        $this->addTeam($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"team" must be array of objects or null, '.gettype($data['team']).' seen.');
                }
            }
            if (isset($data['account'])) {
                if (is_array($data['account'])) {
                    foreach ($data['account'] as $d) {
                        $this->addAccount($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"account" must be array of objects or null, '.gettype($data['account']).' seen.');
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
        if (isset($this->status)) {
            $json['status'] = $this->status;
        }
        if (0 < count($this->statusHistory)) {
            $json['statusHistory'] = [];
            foreach ($this->statusHistory as $statusHistory) {
                $json['statusHistory'][] = $statusHistory;
            }
        }
        if (0 < count($this->type)) {
            $json['type'] = [];
            foreach ($this->type as $type) {
                $json['type'][] = $type;
            }
        }
        if (0 < count($this->diagnosis)) {
            $json['diagnosis'] = [];
            foreach ($this->diagnosis as $diagnosis) {
                $json['diagnosis'][] = $diagnosis;
            }
        }
        if (isset($this->patient)) {
            $json['patient'] = $this->patient;
        }
        if (isset($this->managingOrganization)) {
            $json['managingOrganization'] = $this->managingOrganization;
        }
        if (isset($this->period)) {
            $json['period'] = $this->period;
        }
        if (0 < count($this->referralRequest)) {
            $json['referralRequest'] = [];
            foreach ($this->referralRequest as $referralRequest) {
                $json['referralRequest'][] = $referralRequest;
            }
        }
        if (isset($this->careManager)) {
            $json['careManager'] = $this->careManager;
        }
        if (0 < count($this->team)) {
            $json['team'] = [];
            foreach ($this->team as $team) {
                $json['team'][] = $team;
            }
        }
        if (0 < count($this->account)) {
            $json['account'] = [];
            foreach ($this->account as $account) {
                $json['account'][] = $account;
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
            $sxe = new \SimpleXMLElement('<EpisodeOfCare xmlns="http://hl7.org/fhir"></EpisodeOfCare>');
        }
        parent::xmlSerialize(true, $sxe);
        if (0 < count($this->identifier)) {
            foreach ($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (isset($this->status)) {
            $this->status->xmlSerialize(true, $sxe->addChild('status'));
        }
        if (0 < count($this->statusHistory)) {
            foreach ($this->statusHistory as $statusHistory) {
                $statusHistory->xmlSerialize(true, $sxe->addChild('statusHistory'));
            }
        }
        if (0 < count($this->type)) {
            foreach ($this->type as $type) {
                $type->xmlSerialize(true, $sxe->addChild('type'));
            }
        }
        if (0 < count($this->diagnosis)) {
            foreach ($this->diagnosis as $diagnosis) {
                $diagnosis->xmlSerialize(true, $sxe->addChild('diagnosis'));
            }
        }
        if (isset($this->patient)) {
            $this->patient->xmlSerialize(true, $sxe->addChild('patient'));
        }
        if (isset($this->managingOrganization)) {
            $this->managingOrganization->xmlSerialize(true, $sxe->addChild('managingOrganization'));
        }
        if (isset($this->period)) {
            $this->period->xmlSerialize(true, $sxe->addChild('period'));
        }
        if (0 < count($this->referralRequest)) {
            foreach ($this->referralRequest as $referralRequest) {
                $referralRequest->xmlSerialize(true, $sxe->addChild('referralRequest'));
            }
        }
        if (isset($this->careManager)) {
            $this->careManager->xmlSerialize(true, $sxe->addChild('careManager'));
        }
        if (0 < count($this->team)) {
            foreach ($this->team as $team) {
                $team->xmlSerialize(true, $sxe->addChild('team'));
            }
        }
        if (0 < count($this->account)) {
            foreach ($this->account as $account) {
                $account->xmlSerialize(true, $sxe->addChild('account'));
            }
        }
        if ($returnSXE) {
            return $sxe;
        }
        return $sxe->saveXML();
    }
}
