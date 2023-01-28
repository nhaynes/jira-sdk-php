<?php

namespace JiraSdk\Model;

class DeleteAndReplaceVersionBean
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
     * The ID of the version to update `fixVersion` to when the field contains the deleted version.
     *
     * @var int
     */
    protected $moveFixIssuesTo;
    /**
     * The ID of the version to update `affectedVersion` to when the field contains the deleted version.
     *
     * @var int
     */
    protected $moveAffectedIssuesTo;
    /**
     * An array of custom field IDs (`customFieldId`) and version IDs (`moveTo`) to update when the fields contain the deleted version.
     *
     * @var CustomFieldReplacement[]
     */
    protected $customFieldReplacementList;
    /**
     * The ID of the version to update `fixVersion` to when the field contains the deleted version.
     *
     * @return int
     */
    public function getMoveFixIssuesTo(): int
    {
        return $this->moveFixIssuesTo;
    }
    /**
     * The ID of the version to update `fixVersion` to when the field contains the deleted version.
     *
     * @param int $moveFixIssuesTo
     *
     * @return self
     */
    public function setMoveFixIssuesTo(int $moveFixIssuesTo): self
    {
        $this->initialized['moveFixIssuesTo'] = true;
        $this->moveFixIssuesTo = $moveFixIssuesTo;
        return $this;
    }
    /**
     * The ID of the version to update `affectedVersion` to when the field contains the deleted version.
     *
     * @return int
     */
    public function getMoveAffectedIssuesTo(): int
    {
        return $this->moveAffectedIssuesTo;
    }
    /**
     * The ID of the version to update `affectedVersion` to when the field contains the deleted version.
     *
     * @param int $moveAffectedIssuesTo
     *
     * @return self
     */
    public function setMoveAffectedIssuesTo(int $moveAffectedIssuesTo): self
    {
        $this->initialized['moveAffectedIssuesTo'] = true;
        $this->moveAffectedIssuesTo = $moveAffectedIssuesTo;
        return $this;
    }
    /**
     * An array of custom field IDs (`customFieldId`) and version IDs (`moveTo`) to update when the fields contain the deleted version.
     *
     * @return CustomFieldReplacement[]
     */
    public function getCustomFieldReplacementList(): array
    {
        return $this->customFieldReplacementList;
    }
    /**
     * An array of custom field IDs (`customFieldId`) and version IDs (`moveTo`) to update when the fields contain the deleted version.
     *
     * @param CustomFieldReplacement[] $customFieldReplacementList
     *
     * @return self
     */
    public function setCustomFieldReplacementList(array $customFieldReplacementList): self
    {
        $this->initialized['customFieldReplacementList'] = true;
        $this->customFieldReplacementList = $customFieldReplacementList;
        return $this;
    }
}
