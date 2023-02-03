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

class IssueTypeSchemeDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the issue type scheme. The name must be unique. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the issue type scheme. The maximum length is 4000 characters.
     *
     * @var string
     */
    protected $description;
    /**
     * The ID of the default issue type of the issue type scheme. This ID must be included in `issueTypeIds`.
     *
     * @var string
     */
    protected $defaultIssueTypeId;
    /**
     * The list of issue types IDs of the issue type scheme. At least one standard issue type ID is required.
     *
     * @var string[]
     */
    protected $issueTypeIds;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the issue type scheme. The name must be unique. The maximum length is 255 characters.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue type scheme. The name must be unique. The maximum length is 255 characters.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the issue type scheme. The maximum length is 4000 characters.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the issue type scheme. The maximum length is 4000 characters.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The ID of the default issue type of the issue type scheme. This ID must be included in `issueTypeIds`.
     */
    public function getDefaultIssueTypeId(): string
    {
        return $this->defaultIssueTypeId;
    }

    /**
     * The ID of the default issue type of the issue type scheme. This ID must be included in `issueTypeIds`.
     */
    public function setDefaultIssueTypeId(string $defaultIssueTypeId): self
    {
        $this->initialized['defaultIssueTypeId'] = true;
        $this->defaultIssueTypeId = $defaultIssueTypeId;

        return $this;
    }

    /**
     * The list of issue types IDs of the issue type scheme. At least one standard issue type ID is required.
     *
     * @return string[]
     */
    public function getIssueTypeIds(): array
    {
        return $this->issueTypeIds;
    }

    /**
     * The list of issue types IDs of the issue type scheme. At least one standard issue type ID is required.
     *
     * @param string[] $issueTypeIds
     */
    public function setIssueTypeIds(array $issueTypeIds): self
    {
        $this->initialized['issueTypeIds'] = true;
        $this->issueTypeIds = $issueTypeIds;

        return $this;
    }
}
