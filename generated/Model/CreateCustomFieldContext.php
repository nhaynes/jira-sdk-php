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

class CreateCustomFieldContext
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the context.
     *
     * @var string
     */
    protected $id;
    /**
     * The name of the context.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the context.
     *
     * @var string
     */
    protected $description;
    /**
     * The list of project IDs associated with the context. If the list is empty, the context is global.
     *
     * @var string[]
     */
    protected $projectIds;
    /**
     * The list of issue types IDs for the context. If the list is empty, the context refers to all issue types.
     *
     * @var string[]
     */
    protected $issueTypeIds;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the context.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the context.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the context.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the context.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the context.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the context.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The list of project IDs associated with the context. If the list is empty, the context is global.
     *
     * @return string[]
     */
    public function getProjectIds(): array
    {
        return $this->projectIds;
    }

    /**
     * The list of project IDs associated with the context. If the list is empty, the context is global.
     *
     * @param string[] $projectIds
     */
    public function setProjectIds(array $projectIds): self
    {
        $this->initialized['projectIds'] = true;
        $this->projectIds = $projectIds;

        return $this;
    }

    /**
     * The list of issue types IDs for the context. If the list is empty, the context refers to all issue types.
     *
     * @return string[]
     */
    public function getIssueTypeIds(): array
    {
        return $this->issueTypeIds;
    }

    /**
     * The list of issue types IDs for the context. If the list is empty, the context refers to all issue types.
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
