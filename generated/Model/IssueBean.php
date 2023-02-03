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

class IssueBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Expand options that include additional issue details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * The ID of the issue.
     *
     * @var string
     */
    protected $id;
    /**
     * The URL of the issue details.
     *
     * @var string
     */
    protected $self;
    /**
     * The key of the issue.
     *
     * @var string
     */
    protected $key;
    /**
     * The rendered value of each field present on the issue.
     *
     * @var mixed[]
     */
    protected $renderedFields;
    /**
     * Details of the issue properties identified in the request.
     *
     * @var mixed[]
     */
    protected $properties;
    /**
     * The ID and name of each field present on the issue.
     *
     * @var string[]
     */
    protected $names;
    /**
     * The schema describing each field present on the issue.
     *
     * @var JsonTypeBean[]
     */
    protected $schema;
    /**
     * The transitions that can be performed on the issue.
     *
     * @var IssueTransition[]
     */
    protected $transitions;
    /**
     * The operations that can be performed on the issue.
     *
     * @var IssueBeanOperations
     */
    protected $operations;
    /**
     * The metadata for the fields on the issue that can be amended.
     *
     * @var IssueBeanEditmeta
     */
    protected $editmeta;
    /**
     * Details of changelogs associated with the issue.
     *
     * @var IssueBeanChangelog
     */
    protected $changelog;
    /**
     * The versions of each field on the issue.
     *
     * @var mixed[][]
     */
    protected $versionedRepresentations;
    /**
     * @var IncludedFields
     */
    protected $fieldsToInclude;
    /**
     * @var mixed[]
     */
    protected $fields;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Expand options that include additional issue details in the response.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Expand options that include additional issue details in the response.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }

    /**
     * The ID of the issue.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the issue.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The URL of the issue details.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the issue details.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The key of the issue.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the issue.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The rendered value of each field present on the issue.
     *
     * @return mixed[]
     */
    public function getRenderedFields(): iterable
    {
        return $this->renderedFields;
    }

    /**
     * The rendered value of each field present on the issue.
     *
     * @param mixed[] $renderedFields
     */
    public function setRenderedFields(iterable $renderedFields): self
    {
        $this->initialized['renderedFields'] = true;
        $this->renderedFields = $renderedFields;

        return $this;
    }

    /**
     * Details of the issue properties identified in the request.
     *
     * @return mixed[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }

    /**
     * Details of the issue properties identified in the request.
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
     * The ID and name of each field present on the issue.
     *
     * @return string[]
     */
    public function getNames(): iterable
    {
        return $this->names;
    }

    /**
     * The ID and name of each field present on the issue.
     *
     * @param string[] $names
     */
    public function setNames(iterable $names): self
    {
        $this->initialized['names'] = true;
        $this->names = $names;

        return $this;
    }

    /**
     * The schema describing each field present on the issue.
     *
     * @return JsonTypeBean[]
     */
    public function getSchema(): iterable
    {
        return $this->schema;
    }

    /**
     * The schema describing each field present on the issue.
     *
     * @param JsonTypeBean[] $schema
     */
    public function setSchema(iterable $schema): self
    {
        $this->initialized['schema'] = true;
        $this->schema = $schema;

        return $this;
    }

    /**
     * The transitions that can be performed on the issue.
     *
     * @return IssueTransition[]
     */
    public function getTransitions(): array
    {
        return $this->transitions;
    }

    /**
     * The transitions that can be performed on the issue.
     *
     * @param IssueTransition[] $transitions
     */
    public function setTransitions(array $transitions): self
    {
        $this->initialized['transitions'] = true;
        $this->transitions = $transitions;

        return $this;
    }

    /**
     * The operations that can be performed on the issue.
     */
    public function getOperations(): IssueBeanOperations
    {
        return $this->operations;
    }

    /**
     * The operations that can be performed on the issue.
     */
    public function setOperations(IssueBeanOperations $operations): self
    {
        $this->initialized['operations'] = true;
        $this->operations = $operations;

        return $this;
    }

    /**
     * The metadata for the fields on the issue that can be amended.
     */
    public function getEditmeta(): IssueBeanEditmeta
    {
        return $this->editmeta;
    }

    /**
     * The metadata for the fields on the issue that can be amended.
     */
    public function setEditmeta(IssueBeanEditmeta $editmeta): self
    {
        $this->initialized['editmeta'] = true;
        $this->editmeta = $editmeta;

        return $this;
    }

    /**
     * Details of changelogs associated with the issue.
     */
    public function getChangelog(): IssueBeanChangelog
    {
        return $this->changelog;
    }

    /**
     * Details of changelogs associated with the issue.
     */
    public function setChangelog(IssueBeanChangelog $changelog): self
    {
        $this->initialized['changelog'] = true;
        $this->changelog = $changelog;

        return $this;
    }

    /**
     * The versions of each field on the issue.
     *
     * @return mixed[][]
     */
    public function getVersionedRepresentations(): iterable
    {
        return $this->versionedRepresentations;
    }

    /**
     * The versions of each field on the issue.
     *
     * @param mixed[][] $versionedRepresentations
     */
    public function setVersionedRepresentations(iterable $versionedRepresentations): self
    {
        $this->initialized['versionedRepresentations'] = true;
        $this->versionedRepresentations = $versionedRepresentations;

        return $this;
    }

    public function getFieldsToInclude(): IncludedFields
    {
        return $this->fieldsToInclude;
    }

    public function setFieldsToInclude(IncludedFields $fieldsToInclude): self
    {
        $this->initialized['fieldsToInclude'] = true;
        $this->fieldsToInclude = $fieldsToInclude;

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getFields(): iterable
    {
        return $this->fields;
    }

    /**
     * @param mixed[] $fields
     */
    public function setFields(iterable $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }
}
