<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class DeleteAndReplaceVersionBean
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the version to update `fixVersion` to when the field contains the deleted version.
     */
    public function getMoveFixIssuesTo(): int
    {
        return $this->moveFixIssuesTo;
    }

    /**
     * The ID of the version to update `fixVersion` to when the field contains the deleted version.
     */
    public function setMoveFixIssuesTo(int $moveFixIssuesTo): self
    {
        $this->initialized['moveFixIssuesTo'] = true;
        $this->moveFixIssuesTo = $moveFixIssuesTo;

        return $this;
    }

    /**
     * The ID of the version to update `affectedVersion` to when the field contains the deleted version.
     */
    public function getMoveAffectedIssuesTo(): int
    {
        return $this->moveAffectedIssuesTo;
    }

    /**
     * The ID of the version to update `affectedVersion` to when the field contains the deleted version.
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
     */
    public function setCustomFieldReplacementList(array $customFieldReplacementList): self
    {
        $this->initialized['customFieldReplacementList'] = true;
        $this->customFieldReplacementList = $customFieldReplacementList;

        return $this;
    }
}
