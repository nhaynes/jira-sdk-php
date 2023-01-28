<?php

namespace JiraSdk\Model;

class IssueTypeCreateBean
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

    Whether the issue type is `subtype` or `standard`. Defaults to `standard`.
    *
    * @var string
    */
    protected $type;
    /**
    * The hierarchy level of the issue type. Use:

    *  `-1` for Subtask.
    *  `0` for Base.

    Defaults to `0`.
    *
    * @var int
    */
    protected $hierarchyLevel;
    /**
     * The unique name for the issue type. The maximum length is 60 characters.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The unique name for the issue type. The maximum length is 60 characters.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The description of the issue type.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the issue type.
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
    * Deprecated. Use `hierarchyLevel` instead. See the [deprecation notice](https://community.developer.atlassian.com/t/deprecation-of-the-epic-link-parent-link-and-other-related-fields-in-rest-apis-and-webhooks/54048) for details.

    Whether the issue type is `subtype` or `standard`. Defaults to `standard`.
    *
    * @return string
    */
    public function getType(): string
    {
        return $this->type;
    }
    /**
    * Deprecated. Use `hierarchyLevel` instead. See the [deprecation notice](https://community.developer.atlassian.com/t/deprecation-of-the-epic-link-parent-link-and-other-related-fields-in-rest-apis-and-webhooks/54048) for details.

    Whether the issue type is `subtype` or `standard`. Defaults to `standard`.
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
    * The hierarchy level of the issue type. Use:

    *  `-1` for Subtask.
    *  `0` for Base.

    Defaults to `0`.
    *
    * @return int
    */
    public function getHierarchyLevel(): int
    {
        return $this->hierarchyLevel;
    }
    /**
    * The hierarchy level of the issue type. Use:

    *  `-1` for Subtask.
    *  `0` for Base.

    Defaults to `0`.
    *
    * @param int $hierarchyLevel
    *
    * @return self
    */
    public function setHierarchyLevel(int $hierarchyLevel): self
    {
        $this->initialized['hierarchyLevel'] = true;
        $this->hierarchyLevel = $hierarchyLevel;
        return $this;
    }
}
