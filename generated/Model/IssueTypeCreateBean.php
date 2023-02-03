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

class IssueTypeCreateBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The unique name for the issue type. The maximum length is 60 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the issue type.
     *
     * @var string
     */
    protected $description;
    /**
     * Deprecated. Use `hierarchyLevel` instead. See the [deprecation notice](https://community.developer.atlassian.com/t/deprecation-of-the-epic-link-parent-link-and-other-related-fields-in-rest-apis-and-webhooks/54048) for details.
     *
     * Whether the issue type is `subtype` or `standard`. Defaults to `standard`.
     *
     * @var string
     */
    protected $type;
    /**
     * The hierarchy level of the issue type. Use:.
     *
     *  `-1` for Subtask.
     *  `0` for Base.
     *
     * Defaults to `0`.
     *
     * @var int
     */
    protected $hierarchyLevel;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The unique name for the issue type. The maximum length is 60 characters.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The unique name for the issue type. The maximum length is 60 characters.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the issue type.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the issue type.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * Deprecated. Use `hierarchyLevel` instead. See the [deprecation notice](https://community.developer.atlassian.com/t/deprecation-of-the-epic-link-parent-link-and-other-related-fields-in-rest-apis-and-webhooks/54048) for details.
     *
     * Whether the issue type is `subtype` or `standard`. Defaults to `standard`.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Deprecated. Use `hierarchyLevel` instead. See the [deprecation notice](https://community.developer.atlassian.com/t/deprecation-of-the-epic-link-parent-link-and-other-related-fields-in-rest-apis-and-webhooks/54048) for details.
     *
     * Whether the issue type is `subtype` or `standard`. Defaults to `standard`.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The hierarchy level of the issue type. Use:.
     *
     *  `-1` for Subtask.
     *  `0` for Base.
     *
     * Defaults to `0`.
     */
    public function getHierarchyLevel(): int
    {
        return $this->hierarchyLevel;
    }

    /**
     * The hierarchy level of the issue type. Use:.
     *
     *  `-1` for Subtask.
     *  `0` for Base.
     *
     * Defaults to `0`.
     */
    public function setHierarchyLevel(int $hierarchyLevel): self
    {
        $this->initialized['hierarchyLevel'] = true;
        $this->hierarchyLevel = $hierarchyLevel;

        return $this;
    }
}
