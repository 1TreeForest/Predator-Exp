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
 * This resource allows for the definition of various types of plans as a sharable, consumable, and executable artifact. The resource is general enough to support the description of a broad range of clinical artifacts such as clinical decision support rules, order sets and protocols.
 * If the element is present, it must have either a @value, an @id, or extensions
 */
class FHIRPlanDefinition extends FHIRDomainResource implements \JsonSerializable
{
    /**
     * An absolute URI that is used to identify this plan definition when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this plan definition is (or will be) published. The URL SHOULD include the major version of the plan definition. For more information see [Technical and Business Versions](resource.html#versions).
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRUri
     */
    public $url = null;

    /**
     * A formal identifier that is used to identify this plan definition when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier[]
     */
    public $identifier = [];

    /**
     * The identifier that is used to identify this version of the plan definition when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the plan definition author and is not expected to be globally unique. For example, it might be a timestamp (e.g. yyyymmdd) if a managed version is not available. There is also no expectation that versions can be placed in a lexicographical sequence. To provide a version consistent with the Decision Support Service specification, use the format Major.Minor.Revision (e.g. 1.0.0). For more information on versioning knowledge assets, refer to the Decision Support Service specification. Note that a version is required for non-experimental active artifacts.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $version = null;

    /**
     * A natural language name identifying the plan definition. This name should be usable as an identifier for the module by machine processing applications such as code generation.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $name = null;

    /**
     * A short, descriptive, user-friendly title for the plan definition.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $title = null;

    /**
     * The type of asset the plan definition represents, e.g. an order set, protocol, or event-condition-action rule.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept
     */
    public $type = null;

    /**
     * The status of this plan definition. Enables tracking the life-cycle of the content.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRPublicationStatus
     */
    public $status = null;

    /**
     * A boolean value to indicate that this plan definition is authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRBoolean
     */
    public $experimental = null;

    /**
     * The date  (and optionally time) when the plan definition was published. The date must change if and when the business version changes and it must change if the status code changes. In addition, it should change when the substantive content of the plan definition changes.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRDateTime
     */
    public $date = null;

    /**
     * The name of the individual or organization that published the plan definition.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $publisher = null;

    /**
     * A free text natural language description of the plan definition from a consumer's perspective.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRMarkdown
     */
    public $description = null;

    /**
     * Explaination of why this plan definition is needed and why it has been designed as it has.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRMarkdown
     */
    public $purpose = null;

    /**
     * A detailed description of how the asset is used from a clinical perspective.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public $usage = null;

    /**
     * The date on which the resource content was approved by the publisher. Approval happens once when the content is officially approved for usage.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRDate
     */
    public $approvalDate = null;

    /**
     * The date on which the resource content was last reviewed. Review happens periodically after approval, but doesn't change the original approval date.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRDate
     */
    public $lastReviewDate = null;

    /**
     * The period during which the plan definition content was or is planned to be in active use.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRPeriod
     */
    public $effectivePeriod = null;

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching for appropriate plan definition instances.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRUsageContext[]
     */
    public $useContext = [];

    /**
     * A legal or geographic region in which the plan definition is intended to be used.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public $jurisdiction = [];

    /**
     * Descriptive topics related to the content of the plan definition. Topics provide a high-level categorization of the definition that can be useful for filtering and searching.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public $topic = [];

    /**
     * A contributor to the content of the asset, including authors, editors, reviewers, and endorsers.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRContributor[]
     */
    public $contributor = [];

    /**
     * Contact details to assist a user in finding and communicating with the publisher.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRContactDetail[]
     */
    public $contact = [];

    /**
     * A copyright statement relating to the plan definition and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the plan definition.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRMarkdown
     */
    public $copyright = null;

    /**
     * Related artifacts such as additional documentation, justification, or bibliographic references.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRRelatedArtifact[]
     */
    public $relatedArtifact = [];

    /**
     * A reference to a Library resource containing any formal logic used by the plan definition.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public $library = [];

    /**
     * Goals that describe what the activities within the plan are intended to achieve. For example, weight loss, restoring an activity of daily living, obtaining herd immunity via immunization, meeting a process improvement objective, etc.
     * @var \HL7\FHIR\STU3\FHIRResource\FHIRPlanDefinition\FHIRPlanDefinitionGoal[]
     */
    public $goal = [];

    /**
     * An action to be taken as part of the plan.
     * @var \HL7\FHIR\STU3\FHIRResource\FHIRPlanDefinition\FHIRPlanDefinitionAction[]
     */
    public $action = [];

    /**
     * @var string
     */
    private $_fhirElementName = 'PlanDefinition';

    /**
     * An absolute URI that is used to identify this plan definition when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this plan definition is (or will be) published. The URL SHOULD include the major version of the plan definition. For more information see [Technical and Business Versions](resource.html#versions).
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRUri
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * An absolute URI that is used to identify this plan definition when it is referenced in a specification, model, design or an instance. This SHALL be a URL, SHOULD be globally unique, and SHOULD be an address at which this plan definition is (or will be) published. The URL SHOULD include the major version of the plan definition. For more information see [Technical and Business Versions](resource.html#versions).
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRUri $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * A formal identifier that is used to identify this plan definition when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier[]
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * A formal identifier that is used to identify this plan definition when it is represented in other formats, or referenced in a specification, model, design or an instance.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRIdentifier $identifier
     * @return $this
     */
    public function addIdentifier($identifier)
    {
        $this->identifier[] = $identifier;
        return $this;
    }

    /**
     * The identifier that is used to identify this version of the plan definition when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the plan definition author and is not expected to be globally unique. For example, it might be a timestamp (e.g. yyyymmdd) if a managed version is not available. There is also no expectation that versions can be placed in a lexicographical sequence. To provide a version consistent with the Decision Support Service specification, use the format Major.Minor.Revision (e.g. 1.0.0). For more information on versioning knowledge assets, refer to the Decision Support Service specification. Note that a version is required for non-experimental active artifacts.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * The identifier that is used to identify this version of the plan definition when it is referenced in a specification, model, design or instance. This is an arbitrary value managed by the plan definition author and is not expected to be globally unique. For example, it might be a timestamp (e.g. yyyymmdd) if a managed version is not available. There is also no expectation that versions can be placed in a lexicographical sequence. To provide a version consistent with the Decision Support Service specification, use the format Major.Minor.Revision (e.g. 1.0.0). For more information on versioning knowledge assets, refer to the Decision Support Service specification. Note that a version is required for non-experimental active artifacts.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * A natural language name identifying the plan definition. This name should be usable as an identifier for the module by machine processing applications such as code generation.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A natural language name identifying the plan definition. This name should be usable as an identifier for the module by machine processing applications such as code generation.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * A short, descriptive, user-friendly title for the plan definition.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * A short, descriptive, user-friendly title for the plan definition.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * The type of asset the plan definition represents, e.g. an order set, protocol, or event-condition-action rule.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of asset the plan definition represents, e.g. an order set, protocol, or event-condition-action rule.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The status of this plan definition. Enables tracking the life-cycle of the content.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRPublicationStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of this plan definition. Enables tracking the life-cycle of the content.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRPublicationStatus $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * A boolean value to indicate that this plan definition is authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRBoolean
     */
    public function getExperimental()
    {
        return $this->experimental;
    }

    /**
     * A boolean value to indicate that this plan definition is authored for testing purposes (or education/evaluation/marketing), and is not intended to be used for genuine usage.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRBoolean $experimental
     * @return $this
     */
    public function setExperimental($experimental)
    {
        $this->experimental = $experimental;
        return $this;
    }

    /**
     * The date  (and optionally time) when the plan definition was published. The date must change if and when the business version changes and it must change if the status code changes. In addition, it should change when the substantive content of the plan definition changes.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRDateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date  (and optionally time) when the plan definition was published. The date must change if and when the business version changes and it must change if the status code changes. In addition, it should change when the substantive content of the plan definition changes.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRDateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * The name of the individual or organization that published the plan definition.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * The name of the individual or organization that published the plan definition.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $publisher
     * @return $this
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * A free text natural language description of the plan definition from a consumer's perspective.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRMarkdown
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * A free text natural language description of the plan definition from a consumer's perspective.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRMarkdown $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Explaination of why this plan definition is needed and why it has been designed as it has.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRMarkdown
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * Explaination of why this plan definition is needed and why it has been designed as it has.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRMarkdown $purpose
     * @return $this
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;
        return $this;
    }

    /**
     * A detailed description of how the asset is used from a clinical perspective.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRString
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * A detailed description of how the asset is used from a clinical perspective.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRString $usage
     * @return $this
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
        return $this;
    }

    /**
     * The date on which the resource content was approved by the publisher. Approval happens once when the content is officially approved for usage.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRDate
     */
    public function getApprovalDate()
    {
        return $this->approvalDate;
    }

    /**
     * The date on which the resource content was approved by the publisher. Approval happens once when the content is officially approved for usage.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRDate $approvalDate
     * @return $this
     */
    public function setApprovalDate($approvalDate)
    {
        $this->approvalDate = $approvalDate;
        return $this;
    }

    /**
     * The date on which the resource content was last reviewed. Review happens periodically after approval, but doesn't change the original approval date.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRDate
     */
    public function getLastReviewDate()
    {
        return $this->lastReviewDate;
    }

    /**
     * The date on which the resource content was last reviewed. Review happens periodically after approval, but doesn't change the original approval date.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRDate $lastReviewDate
     * @return $this
     */
    public function setLastReviewDate($lastReviewDate)
    {
        $this->lastReviewDate = $lastReviewDate;
        return $this;
    }

    /**
     * The period during which the plan definition content was or is planned to be in active use.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRPeriod
     */
    public function getEffectivePeriod()
    {
        return $this->effectivePeriod;
    }

    /**
     * The period during which the plan definition content was or is planned to be in active use.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRPeriod $effectivePeriod
     * @return $this
     */
    public function setEffectivePeriod($effectivePeriod)
    {
        $this->effectivePeriod = $effectivePeriod;
        return $this;
    }

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching for appropriate plan definition instances.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRUsageContext[]
     */
    public function getUseContext()
    {
        return $this->useContext;
    }

    /**
     * The content was developed with a focus and intent of supporting the contexts that are listed. These terms may be used to assist with indexing and searching for appropriate plan definition instances.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRUsageContext $useContext
     * @return $this
     */
    public function addUseContext($useContext)
    {
        $this->useContext[] = $useContext;
        return $this;
    }

    /**
     * A legal or geographic region in which the plan definition is intended to be used.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public function getJurisdiction()
    {
        return $this->jurisdiction;
    }

    /**
     * A legal or geographic region in which the plan definition is intended to be used.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept $jurisdiction
     * @return $this
     */
    public function addJurisdiction($jurisdiction)
    {
        $this->jurisdiction[] = $jurisdiction;
        return $this;
    }

    /**
     * Descriptive topics related to the content of the plan definition. Topics provide a high-level categorization of the definition that can be useful for filtering and searching.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept[]
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Descriptive topics related to the content of the plan definition. Topics provide a high-level categorization of the definition that can be useful for filtering and searching.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept $topic
     * @return $this
     */
    public function addTopic($topic)
    {
        $this->topic[] = $topic;
        return $this;
    }

    /**
     * A contributor to the content of the asset, including authors, editors, reviewers, and endorsers.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRContributor[]
     */
    public function getContributor()
    {
        return $this->contributor;
    }

    /**
     * A contributor to the content of the asset, including authors, editors, reviewers, and endorsers.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRContributor $contributor
     * @return $this
     */
    public function addContributor($contributor)
    {
        $this->contributor[] = $contributor;
        return $this;
    }

    /**
     * Contact details to assist a user in finding and communicating with the publisher.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRContactDetail[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contact details to assist a user in finding and communicating with the publisher.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRContactDetail $contact
     * @return $this
     */
    public function addContact($contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * A copyright statement relating to the plan definition and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the plan definition.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRMarkdown
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * A copyright statement relating to the plan definition and/or its contents. Copyright statements are generally legal restrictions on the use and publishing of the plan definition.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRMarkdown $copyright
     * @return $this
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }

    /**
     * Related artifacts such as additional documentation, justification, or bibliographic references.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRRelatedArtifact[]
     */
    public function getRelatedArtifact()
    {
        return $this->relatedArtifact;
    }

    /**
     * Related artifacts such as additional documentation, justification, or bibliographic references.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRRelatedArtifact $relatedArtifact
     * @return $this
     */
    public function addRelatedArtifact($relatedArtifact)
    {
        $this->relatedArtifact[] = $relatedArtifact;
        return $this;
    }

    /**
     * A reference to a Library resource containing any formal logic used by the plan definition.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRReference[]
     */
    public function getLibrary()
    {
        return $this->library;
    }

    /**
     * A reference to a Library resource containing any formal logic used by the plan definition.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRReference $library
     * @return $this
     */
    public function addLibrary($library)
    {
        $this->library[] = $library;
        return $this;
    }

    /**
     * Goals that describe what the activities within the plan are intended to achieve. For example, weight loss, restoring an activity of daily living, obtaining herd immunity via immunization, meeting a process improvement objective, etc.
     * @return \HL7\FHIR\STU3\FHIRResource\FHIRPlanDefinition\FHIRPlanDefinitionGoal[]
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * Goals that describe what the activities within the plan are intended to achieve. For example, weight loss, restoring an activity of daily living, obtaining herd immunity via immunization, meeting a process improvement objective, etc.
     * @param \HL7\FHIR\STU3\FHIRResource\FHIRPlanDefinition\FHIRPlanDefinitionGoal $goal
     * @return $this
     */
    public function addGoal($goal)
    {
        $this->goal[] = $goal;
        return $this;
    }

    /**
     * An action to be taken as part of the plan.
     * @return \HL7\FHIR\STU3\FHIRResource\FHIRPlanDefinition\FHIRPlanDefinitionAction[]
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * An action to be taken as part of the plan.
     * @param \HL7\FHIR\STU3\FHIRResource\FHIRPlanDefinition\FHIRPlanDefinitionAction $action
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
            if (isset($data['url'])) {
                $this->setUrl($data['url']);
            }
            if (isset($data['identifier'])) {
                if (is_array($data['identifier'])) {
                    foreach ($data['identifier'] as $d) {
                        $this->addIdentifier($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"identifier" must be array of objects or null, '.gettype($data['identifier']).' seen.');
                }
            }
            if (isset($data['version'])) {
                $this->setVersion($data['version']);
            }
            if (isset($data['name'])) {
                $this->setName($data['name']);
            }
            if (isset($data['title'])) {
                $this->setTitle($data['title']);
            }
            if (isset($data['type'])) {
                $this->setType($data['type']);
            }
            if (isset($data['status'])) {
                $this->setStatus($data['status']);
            }
            if (isset($data['experimental'])) {
                $this->setExperimental($data['experimental']);
            }
            if (isset($data['date'])) {
                $this->setDate($data['date']);
            }
            if (isset($data['publisher'])) {
                $this->setPublisher($data['publisher']);
            }
            if (isset($data['description'])) {
                $this->setDescription($data['description']);
            }
            if (isset($data['purpose'])) {
                $this->setPurpose($data['purpose']);
            }
            if (isset($data['usage'])) {
                $this->setUsage($data['usage']);
            }
            if (isset($data['approvalDate'])) {
                $this->setApprovalDate($data['approvalDate']);
            }
            if (isset($data['lastReviewDate'])) {
                $this->setLastReviewDate($data['lastReviewDate']);
            }
            if (isset($data['effectivePeriod'])) {
                $this->setEffectivePeriod($data['effectivePeriod']);
            }
            if (isset($data['useContext'])) {
                if (is_array($data['useContext'])) {
                    foreach ($data['useContext'] as $d) {
                        $this->addUseContext($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"useContext" must be array of objects or null, '.gettype($data['useContext']).' seen.');
                }
            }
            if (isset($data['jurisdiction'])) {
                if (is_array($data['jurisdiction'])) {
                    foreach ($data['jurisdiction'] as $d) {
                        $this->addJurisdiction($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"jurisdiction" must be array of objects or null, '.gettype($data['jurisdiction']).' seen.');
                }
            }
            if (isset($data['topic'])) {
                if (is_array($data['topic'])) {
                    foreach ($data['topic'] as $d) {
                        $this->addTopic($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"topic" must be array of objects or null, '.gettype($data['topic']).' seen.');
                }
            }
            if (isset($data['contributor'])) {
                if (is_array($data['contributor'])) {
                    foreach ($data['contributor'] as $d) {
                        $this->addContributor($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"contributor" must be array of objects or null, '.gettype($data['contributor']).' seen.');
                }
            }
            if (isset($data['contact'])) {
                if (is_array($data['contact'])) {
                    foreach ($data['contact'] as $d) {
                        $this->addContact($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"contact" must be array of objects or null, '.gettype($data['contact']).' seen.');
                }
            }
            if (isset($data['copyright'])) {
                $this->setCopyright($data['copyright']);
            }
            if (isset($data['relatedArtifact'])) {
                if (is_array($data['relatedArtifact'])) {
                    foreach ($data['relatedArtifact'] as $d) {
                        $this->addRelatedArtifact($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"relatedArtifact" must be array of objects or null, '.gettype($data['relatedArtifact']).' seen.');
                }
            }
            if (isset($data['library'])) {
                if (is_array($data['library'])) {
                    foreach ($data['library'] as $d) {
                        $this->addLibrary($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"library" must be array of objects or null, '.gettype($data['library']).' seen.');
                }
            }
            if (isset($data['goal'])) {
                if (is_array($data['goal'])) {
                    foreach ($data['goal'] as $d) {
                        $this->addGoal($d);
                    }
                } else {
                    throw new \InvalidArgumentException('"goal" must be array of objects or null, '.gettype($data['goal']).' seen.');
                }
            }
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
        $json['resourceType'] = $this->_fhirElementName;
        if (isset($this->url)) {
            $json['url'] = $this->url;
        }
        if (0 < count($this->identifier)) {
            $json['identifier'] = [];
            foreach ($this->identifier as $identifier) {
                $json['identifier'][] = $identifier;
            }
        }
        if (isset($this->version)) {
            $json['version'] = $this->version;
        }
        if (isset($this->name)) {
            $json['name'] = $this->name;
        }
        if (isset($this->title)) {
            $json['title'] = $this->title;
        }
        if (isset($this->type)) {
            $json['type'] = $this->type;
        }
        if (isset($this->status)) {
            $json['status'] = $this->status;
        }
        if (isset($this->experimental)) {
            $json['experimental'] = $this->experimental;
        }
        if (isset($this->date)) {
            $json['date'] = $this->date;
        }
        if (isset($this->publisher)) {
            $json['publisher'] = $this->publisher;
        }
        if (isset($this->description)) {
            $json['description'] = $this->description;
        }
        if (isset($this->purpose)) {
            $json['purpose'] = $this->purpose;
        }
        if (isset($this->usage)) {
            $json['usage'] = $this->usage;
        }
        if (isset($this->approvalDate)) {
            $json['approvalDate'] = $this->approvalDate;
        }
        if (isset($this->lastReviewDate)) {
            $json['lastReviewDate'] = $this->lastReviewDate;
        }
        if (isset($this->effectivePeriod)) {
            $json['effectivePeriod'] = $this->effectivePeriod;
        }
        if (0 < count($this->useContext)) {
            $json['useContext'] = [];
            foreach ($this->useContext as $useContext) {
                $json['useContext'][] = $useContext;
            }
        }
        if (0 < count($this->jurisdiction)) {
            $json['jurisdiction'] = [];
            foreach ($this->jurisdiction as $jurisdiction) {
                $json['jurisdiction'][] = $jurisdiction;
            }
        }
        if (0 < count($this->topic)) {
            $json['topic'] = [];
            foreach ($this->topic as $topic) {
                $json['topic'][] = $topic;
            }
        }
        if (0 < count($this->contributor)) {
            $json['contributor'] = [];
            foreach ($this->contributor as $contributor) {
                $json['contributor'][] = $contributor;
            }
        }
        if (0 < count($this->contact)) {
            $json['contact'] = [];
            foreach ($this->contact as $contact) {
                $json['contact'][] = $contact;
            }
        }
        if (isset($this->copyright)) {
            $json['copyright'] = $this->copyright;
        }
        if (0 < count($this->relatedArtifact)) {
            $json['relatedArtifact'] = [];
            foreach ($this->relatedArtifact as $relatedArtifact) {
                $json['relatedArtifact'][] = $relatedArtifact;
            }
        }
        if (0 < count($this->library)) {
            $json['library'] = [];
            foreach ($this->library as $library) {
                $json['library'][] = $library;
            }
        }
        if (0 < count($this->goal)) {
            $json['goal'] = [];
            foreach ($this->goal as $goal) {
                $json['goal'][] = $goal;
            }
        }
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
            $sxe = new \SimpleXMLElement('<PlanDefinition xmlns="http://hl7.org/fhir"></PlanDefinition>');
        }
        parent::xmlSerialize(true, $sxe);
        if (isset($this->url)) {
            $this->url->xmlSerialize(true, $sxe->addChild('url'));
        }
        if (0 < count($this->identifier)) {
            foreach ($this->identifier as $identifier) {
                $identifier->xmlSerialize(true, $sxe->addChild('identifier'));
            }
        }
        if (isset($this->version)) {
            $this->version->xmlSerialize(true, $sxe->addChild('version'));
        }
        if (isset($this->name)) {
            $this->name->xmlSerialize(true, $sxe->addChild('name'));
        }
        if (isset($this->title)) {
            $this->title->xmlSerialize(true, $sxe->addChild('title'));
        }
        if (isset($this->type)) {
            $this->type->xmlSerialize(true, $sxe->addChild('type'));
        }
        if (isset($this->status)) {
            $this->status->xmlSerialize(true, $sxe->addChild('status'));
        }
        if (isset($this->experimental)) {
            $this->experimental->xmlSerialize(true, $sxe->addChild('experimental'));
        }
        if (isset($this->date)) {
            $this->date->xmlSerialize(true, $sxe->addChild('date'));
        }
        if (isset($this->publisher)) {
            $this->publisher->xmlSerialize(true, $sxe->addChild('publisher'));
        }
        if (isset($this->description)) {
            $this->description->xmlSerialize(true, $sxe->addChild('description'));
        }
        if (isset($this->purpose)) {
            $this->purpose->xmlSerialize(true, $sxe->addChild('purpose'));
        }
        if (isset($this->usage)) {
            $this->usage->xmlSerialize(true, $sxe->addChild('usage'));
        }
        if (isset($this->approvalDate)) {
            $this->approvalDate->xmlSerialize(true, $sxe->addChild('approvalDate'));
        }
        if (isset($this->lastReviewDate)) {
            $this->lastReviewDate->xmlSerialize(true, $sxe->addChild('lastReviewDate'));
        }
        if (isset($this->effectivePeriod)) {
            $this->effectivePeriod->xmlSerialize(true, $sxe->addChild('effectivePeriod'));
        }
        if (0 < count($this->useContext)) {
            foreach ($this->useContext as $useContext) {
                $useContext->xmlSerialize(true, $sxe->addChild('useContext'));
            }
        }
        if (0 < count($this->jurisdiction)) {
            foreach ($this->jurisdiction as $jurisdiction) {
                $jurisdiction->xmlSerialize(true, $sxe->addChild('jurisdiction'));
            }
        }
        if (0 < count($this->topic)) {
            foreach ($this->topic as $topic) {
                $topic->xmlSerialize(true, $sxe->addChild('topic'));
            }
        }
        if (0 < count($this->contributor)) {
            foreach ($this->contributor as $contributor) {
                $contributor->xmlSerialize(true, $sxe->addChild('contributor'));
            }
        }
        if (0 < count($this->contact)) {
            foreach ($this->contact as $contact) {
                $contact->xmlSerialize(true, $sxe->addChild('contact'));
            }
        }
        if (isset($this->copyright)) {
            $this->copyright->xmlSerialize(true, $sxe->addChild('copyright'));
        }
        if (0 < count($this->relatedArtifact)) {
            foreach ($this->relatedArtifact as $relatedArtifact) {
                $relatedArtifact->xmlSerialize(true, $sxe->addChild('relatedArtifact'));
            }
        }
        if (0 < count($this->library)) {
            foreach ($this->library as $library) {
                $library->xmlSerialize(true, $sxe->addChild('library'));
            }
        }
        if (0 < count($this->goal)) {
            foreach ($this->goal as $goal) {
                $goal->xmlSerialize(true, $sxe->addChild('goal'));
            }
        }
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
