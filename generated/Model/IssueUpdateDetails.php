<?php

namespace JiraSdk\Model;

class IssueUpdateDetails extends \ArrayObject
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
     * Details of a transition. Required when performing a transition, optional when creating or editing an issue.
     *
     * @var IssueUpdateDetailsTransition
     */
    protected $transition;
    /**
     * List of issue screen fields to update, specifying the sub-field to update and its value for each field. This field provides a straightforward option when setting a sub-field. When multiple sub-fields or other operations are required, use `update`. Fields included in here cannot be included in `update`.
     *
     * @var mixed[]
     */
    protected $fields;
    /**
     * A Map containing the field field name and a list of operations to perform on the issue screen field. Note that fields included in here cannot be included in `fields`.
     *
     * @var FieldUpdateOperation[][]
     */
    protected $update;
    /**
     * Additional issue history details.
     *
     * @var IssueUpdateDetailsHistoryMetadata
     */
    protected $historyMetadata;
    /**
     * Details of issue properties to be add or update.
     *
     * @var EntityProperty[]
     */
    protected $properties;
    /**
     * Details of a transition. Required when performing a transition, optional when creating or editing an issue.
     *
     * @return IssueUpdateDetailsTransition
     */
    public function getTransition(): IssueUpdateDetailsTransition
    {
        return $this->transition;
    }
    /**
     * Details of a transition. Required when performing a transition, optional when creating or editing an issue.
     *
     * @param IssueUpdateDetailsTransition $transition
     *
     * @return self
     */
    public function setTransition(IssueUpdateDetailsTransition $transition): self
    {
        $this->initialized['transition'] = true;
        $this->transition = $transition;
        return $this;
    }
    /**
     * List of issue screen fields to update, specifying the sub-field to update and its value for each field. This field provides a straightforward option when setting a sub-field. When multiple sub-fields or other operations are required, use `update`. Fields included in here cannot be included in `update`.
     *
     * @return mixed[]
     */
    public function getFields(): iterable
    {
        return $this->fields;
    }
    /**
     * List of issue screen fields to update, specifying the sub-field to update and its value for each field. This field provides a straightforward option when setting a sub-field. When multiple sub-fields or other operations are required, use `update`. Fields included in here cannot be included in `update`.
     *
     * @param mixed[] $fields
     *
     * @return self
     */
    public function setFields(iterable $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;
        return $this;
    }
    /**
     * A Map containing the field field name and a list of operations to perform on the issue screen field. Note that fields included in here cannot be included in `fields`.
     *
     * @return FieldUpdateOperation[][]
     */
    public function getUpdate(): iterable
    {
        return $this->update;
    }
    /**
     * A Map containing the field field name and a list of operations to perform on the issue screen field. Note that fields included in here cannot be included in `fields`.
     *
     * @param FieldUpdateOperation[][] $update
     *
     * @return self
     */
    public function setUpdate(iterable $update): self
    {
        $this->initialized['update'] = true;
        $this->update = $update;
        return $this;
    }
    /**
     * Additional issue history details.
     *
     * @return IssueUpdateDetailsHistoryMetadata
     */
    public function getHistoryMetadata(): IssueUpdateDetailsHistoryMetadata
    {
        return $this->historyMetadata;
    }
    /**
     * Additional issue history details.
     *
     * @param IssueUpdateDetailsHistoryMetadata $historyMetadata
     *
     * @return self
     */
    public function setHistoryMetadata(IssueUpdateDetailsHistoryMetadata $historyMetadata): self
    {
        $this->initialized['historyMetadata'] = true;
        $this->historyMetadata = $historyMetadata;
        return $this;
    }
    /**
     * Details of issue properties to be add or update.
     *
     * @return EntityProperty[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }
    /**
     * Details of issue properties to be add or update.
     *
     * @param EntityProperty[] $properties
     *
     * @return self
     */
    public function setProperties(array $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;
        return $this;
    }
}
