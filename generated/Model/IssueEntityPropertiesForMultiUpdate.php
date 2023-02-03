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

class IssueEntityPropertiesForMultiUpdate
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue.
     *
     * @var int
     */
    protected $issueID;
    /**
     * Entity properties to set on the issue. The maximum length of an issue property value is 32768 characters.
     *
     * @var JsonNode[]
     */
    protected $properties;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue.
     */
    public function getIssueID(): int
    {
        return $this->issueID;
    }

    /**
     * The ID of the issue.
     */
    public function setIssueID(int $issueID): self
    {
        $this->initialized['issueID'] = true;
        $this->issueID = $issueID;

        return $this;
    }

    /**
     * Entity properties to set on the issue. The maximum length of an issue property value is 32768 characters.
     *
     * @return JsonNode[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }

    /**
     * Entity properties to set on the issue. The maximum length of an issue property value is 32768 characters.
     *
     * @param JsonNode[] $properties
     */
    public function setProperties(iterable $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;

        return $this;
    }
}
