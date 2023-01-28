<?php

namespace JiraSdk\Model;

class HistoryMetadata extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * The type of the history record.
     *
     * @var string
     */
    protected $type;
    /**
     * The description of the history record.
     *
     * @var string
     */
    protected $description;
    /**
     * The description key of the history record.
     *
     * @var string
     */
    protected $descriptionKey;
    /**
     * The activity described in the history record.
     *
     * @var string
     */
    protected $activityDescription;
    /**
     * The key of the activity described in the history record.
     *
     * @var string
     */
    protected $activityDescriptionKey;
    /**
     * The description of the email address associated the history record.
     *
     * @var string
     */
    protected $emailDescription;
    /**
     * The description key of the email address associated the history record.
     *
     * @var string
     */
    protected $emailDescriptionKey;
    /**
     * Details of the user whose action created the history record.
     *
     * @var HistoryMetadataActor
     */
    protected $actor;
    /**
     * Details of the system that generated the history record.
     *
     * @var HistoryMetadataGenerator
     */
    protected $generator;
    /**
     * Details of the cause that triggered the creation the history record.
     *
     * @var HistoryMetadataCause
     */
    protected $cause;
    /**
     * Additional arbitrary information about the history record.
     *
     * @var string[]
     */
    protected $extraData;
    /**
     * The type of the history record.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The type of the history record.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * The description of the history record.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the history record.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * The description key of the history record.
     *
     * @return string
     */
    public function getDescriptionKey(): string
    {
        return $this->descriptionKey;
    }
    /**
     * The description key of the history record.
     *
     * @param string $descriptionKey
     *
     * @return self
     */
    public function setDescriptionKey(string $descriptionKey): self
    {
        $this->initialized['descriptionKey'] = true;
        $this->descriptionKey = $descriptionKey;
        return $this;
    }
    /**
     * The activity described in the history record.
     *
     * @return string
     */
    public function getActivityDescription(): string
    {
        return $this->activityDescription;
    }
    /**
     * The activity described in the history record.
     *
     * @param string $activityDescription
     *
     * @return self
     */
    public function setActivityDescription(string $activityDescription): self
    {
        $this->initialized['activityDescription'] = true;
        $this->activityDescription = $activityDescription;
        return $this;
    }
    /**
     * The key of the activity described in the history record.
     *
     * @return string
     */
    public function getActivityDescriptionKey(): string
    {
        return $this->activityDescriptionKey;
    }
    /**
     * The key of the activity described in the history record.
     *
     * @param string $activityDescriptionKey
     *
     * @return self
     */
    public function setActivityDescriptionKey(string $activityDescriptionKey): self
    {
        $this->initialized['activityDescriptionKey'] = true;
        $this->activityDescriptionKey = $activityDescriptionKey;
        return $this;
    }
    /**
     * The description of the email address associated the history record.
     *
     * @return string
     */
    public function getEmailDescription(): string
    {
        return $this->emailDescription;
    }
    /**
     * The description of the email address associated the history record.
     *
     * @param string $emailDescription
     *
     * @return self
     */
    public function setEmailDescription(string $emailDescription): self
    {
        $this->initialized['emailDescription'] = true;
        $this->emailDescription = $emailDescription;
        return $this;
    }
    /**
     * The description key of the email address associated the history record.
     *
     * @return string
     */
    public function getEmailDescriptionKey(): string
    {
        return $this->emailDescriptionKey;
    }
    /**
     * The description key of the email address associated the history record.
     *
     * @param string $emailDescriptionKey
     *
     * @return self
     */
    public function setEmailDescriptionKey(string $emailDescriptionKey): self
    {
        $this->initialized['emailDescriptionKey'] = true;
        $this->emailDescriptionKey = $emailDescriptionKey;
        return $this;
    }
    /**
     * Details of the user whose action created the history record.
     *
     * @return HistoryMetadataActor
     */
    public function getActor(): HistoryMetadataActor
    {
        return $this->actor;
    }
    /**
     * Details of the user whose action created the history record.
     *
     * @param HistoryMetadataActor $actor
     *
     * @return self
     */
    public function setActor(HistoryMetadataActor $actor): self
    {
        $this->initialized['actor'] = true;
        $this->actor = $actor;
        return $this;
    }
    /**
     * Details of the system that generated the history record.
     *
     * @return HistoryMetadataGenerator
     */
    public function getGenerator(): HistoryMetadataGenerator
    {
        return $this->generator;
    }
    /**
     * Details of the system that generated the history record.
     *
     * @param HistoryMetadataGenerator $generator
     *
     * @return self
     */
    public function setGenerator(HistoryMetadataGenerator $generator): self
    {
        $this->initialized['generator'] = true;
        $this->generator = $generator;
        return $this;
    }
    /**
     * Details of the cause that triggered the creation the history record.
     *
     * @return HistoryMetadataCause
     */
    public function getCause(): HistoryMetadataCause
    {
        return $this->cause;
    }
    /**
     * Details of the cause that triggered the creation the history record.
     *
     * @param HistoryMetadataCause $cause
     *
     * @return self
     */
    public function setCause(HistoryMetadataCause $cause): self
    {
        $this->initialized['cause'] = true;
        $this->cause = $cause;
        return $this;
    }
    /**
     * Additional arbitrary information about the history record.
     *
     * @return string[]
     */
    public function getExtraData(): iterable
    {
        return $this->extraData;
    }
    /**
     * Additional arbitrary information about the history record.
     *
     * @param string[] $extraData
     *
     * @return self
     */
    public function setExtraData(iterable $extraData): self
    {
        $this->initialized['extraData'] = true;
        $this->extraData = $extraData;
        return $this;
    }
}
