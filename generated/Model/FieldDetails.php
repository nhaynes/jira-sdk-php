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

class FieldDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the field.
     *
     * @var string
     */
    protected $id;
    /**
     * The key of the field.
     *
     * @var string
     */
    protected $key;
    /**
     * The name of the field.
     *
     * @var string
     */
    protected $name;
    /**
     * Whether the field is a custom field.
     *
     * @var bool
     */
    protected $custom;
    /**
     * Whether the content of the field can be used to order lists.
     *
     * @var bool
     */
    protected $orderable;
    /**
     * Whether the field can be used as a column on the issue navigator.
     *
     * @var bool
     */
    protected $navigable;
    /**
     * Whether the content of the field can be searched.
     *
     * @var bool
     */
    protected $searchable;
    /**
     * The names that can be used to reference the field in an advanced search. For more information, see [Advanced searching - fields reference](https://confluence.atlassian.com/x/gwORLQ).
     *
     * @var string[]
     */
    protected $clauseNames;
    /**
     * The scope of the field.
     *
     * @var FieldDetailsScope
     */
    protected $scope;
    /**
     * The data schema for the field.
     *
     * @var FieldDetailsSchema
     */
    protected $schema;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the field.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the field.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The key of the field.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the field.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The name of the field.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the field.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Whether the field is a custom field.
     */
    public function getCustom(): bool
    {
        return $this->custom;
    }

    /**
     * Whether the field is a custom field.
     */
    public function setCustom(bool $custom): self
    {
        $this->initialized['custom'] = true;
        $this->custom = $custom;

        return $this;
    }

    /**
     * Whether the content of the field can be used to order lists.
     */
    public function getOrderable(): bool
    {
        return $this->orderable;
    }

    /**
     * Whether the content of the field can be used to order lists.
     */
    public function setOrderable(bool $orderable): self
    {
        $this->initialized['orderable'] = true;
        $this->orderable = $orderable;

        return $this;
    }

    /**
     * Whether the field can be used as a column on the issue navigator.
     */
    public function getNavigable(): bool
    {
        return $this->navigable;
    }

    /**
     * Whether the field can be used as a column on the issue navigator.
     */
    public function setNavigable(bool $navigable): self
    {
        $this->initialized['navigable'] = true;
        $this->navigable = $navigable;

        return $this;
    }

    /**
     * Whether the content of the field can be searched.
     */
    public function getSearchable(): bool
    {
        return $this->searchable;
    }

    /**
     * Whether the content of the field can be searched.
     */
    public function setSearchable(bool $searchable): self
    {
        $this->initialized['searchable'] = true;
        $this->searchable = $searchable;

        return $this;
    }

    /**
     * The names that can be used to reference the field in an advanced search. For more information, see [Advanced searching - fields reference](https://confluence.atlassian.com/x/gwORLQ).
     *
     * @return string[]
     */
    public function getClauseNames(): array
    {
        return $this->clauseNames;
    }

    /**
     * The names that can be used to reference the field in an advanced search. For more information, see [Advanced searching - fields reference](https://confluence.atlassian.com/x/gwORLQ).
     *
     * @param string[] $clauseNames
     */
    public function setClauseNames(array $clauseNames): self
    {
        $this->initialized['clauseNames'] = true;
        $this->clauseNames = $clauseNames;

        return $this;
    }

    /**
     * The scope of the field.
     */
    public function getScope(): FieldDetailsScope
    {
        return $this->scope;
    }

    /**
     * The scope of the field.
     */
    public function setScope(FieldDetailsScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * The data schema for the field.
     */
    public function getSchema(): FieldDetailsSchema
    {
        return $this->schema;
    }

    /**
     * The data schema for the field.
     */
    public function setSchema(FieldDetailsSchema $schema): self
    {
        $this->initialized['schema'] = true;
        $this->schema = $schema;

        return $this;
    }
}
