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

class IssueFieldOption
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The unique identifier for the option. This is only unique within the select field's set of options.
     *
     * @var int
     */
    protected $id;
    /**
     * The option's name, which is displayed in Jira.
     *
     * @var string
     */
    protected $value;
    /**
     * The properties of the object, as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see [Issue Field Option Property Index](https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/)) are defined in the descriptor for the issue field module.
     *
     * @var mixed[]
     */
    protected $properties;
    /**
     * Details of the projects the option is available in.
     *
     * @var IssueFieldOptionConfiguration
     */
    protected $config;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The unique identifier for the option. This is only unique within the select field's set of options.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The unique identifier for the option. This is only unique within the select field's set of options.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The option's name, which is displayed in Jira.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The option's name, which is displayed in Jira.
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * The properties of the object, as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see [Issue Field Option Property Index](https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/)) are defined in the descriptor for the issue field module.
     *
     * @return mixed[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }

    /**
     * The properties of the object, as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see [Issue Field Option Property Index](https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/)) are defined in the descriptor for the issue field module.
     *
     * @param mixed[] $properties
     */
    public function setProperties(iterable $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;

        return $this;
    }

    /**
     * Details of the projects the option is available in.
     */
    public function getConfig(): IssueFieldOptionConfiguration
    {
        return $this->config;
    }

    /**
     * Details of the projects the option is available in.
     */
    public function setConfig(IssueFieldOptionConfiguration $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }
}
