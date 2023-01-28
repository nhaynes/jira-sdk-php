<?php

namespace JiraSdk\Model;

class SearchRequestBean
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
     * A [JQL](https://confluence.atlassian.com/x/egORLQ) expression.
     *
     * @var string
     */
    protected $jql;
    /**
     * The index of the first item to return in the page of results (page offset). The base index is `0`.
     *
     * @var int
     */
    protected $startAt;
    /**
     * The maximum number of items to return per page.
     *
     * @var int
     */
    protected $maxResults = 50;
    /**
    * A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:

    *  `*all` Returns all fields.
    *  `*navigable` Returns navigable fields.
    *  Any issue field, prefixed with a minus to exclude.

    The default is `*navigable`.

    Examples:

    *  `summary,comment` Returns the summary and comments fields only.
    *  `-description` Returns all navigable (default) fields except description.
    *  `*all,-comment` Returns all fields except comments.

    Multiple `fields` parameters can be included in a request.

    Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields.
    *
    * @var string[]
    */
    protected $fields;
    /**
    * Determines how to validate the JQL query and treat the validation results. Supported values:

    *  `strict` Returns a 400 response code if any errors are found, along with a list of all errors (and warnings).
    *  `warn` Returns all errors as warnings.
    *  `none` No validation is performed.
    *  `true` *Deprecated* A legacy synonym for `strict`.
    *  `false` *Deprecated* A legacy synonym for `warn`.

    The default is `strict`.

    Note: If the JQL is not correctly formed a 400 response code is returned, regardless of the `validateQuery` value.
    *
    * @var string
    */
    protected $validateQuery;
    /**
     * Use [expand](em>#expansion) to include additional information about issues in the response. Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a list of values. The expand options are:
     *  `renderedFields` Returns field values rendered in HTML format.
     *  `names` Returns the display name of each field.
     *  `schema` Returns the schema describing a field type.
     *  `transitions` Returns all possible transitions for the issue.
     *  `operations` Returns all possible operations for the issue.
     *  `editmeta` Returns information about how each field can be edited.
     *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.
     *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version.
     *
     * @var string[]
     */
    protected $expand;
    /**
     * A list of up to 5 issue properties to include in the results. This parameter accepts a comma-separated list.
     *
     * @var string[]
     */
    protected $properties;
    /**
     * Reference fields by their key (rather than ID). The default is `false`.
     *
     * @var bool
     */
    protected $fieldsByKeys;
    /**
     * A [JQL](https://confluence.atlassian.com/x/egORLQ) expression.
     *
     * @return string
     */
    public function getJql(): string
    {
        return $this->jql;
    }
    /**
     * A [JQL](https://confluence.atlassian.com/x/egORLQ) expression.
     *
     * @param string $jql
     *
     * @return self
     */
    public function setJql(string $jql): self
    {
        $this->initialized['jql'] = true;
        $this->jql = $jql;
        return $this;
    }
    /**
     * The index of the first item to return in the page of results (page offset). The base index is `0`.
     *
     * @return int
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }
    /**
     * The index of the first item to return in the page of results (page offset). The base index is `0`.
     *
     * @param int $startAt
     *
     * @return self
     */
    public function setStartAt(int $startAt): self
    {
        $this->initialized['startAt'] = true;
        $this->startAt = $startAt;
        return $this;
    }
    /**
     * The maximum number of items to return per page.
     *
     * @return int
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }
    /**
     * The maximum number of items to return per page.
     *
     * @param int $maxResults
     *
     * @return self
     */
    public function setMaxResults(int $maxResults): self
    {
        $this->initialized['maxResults'] = true;
        $this->maxResults = $maxResults;
        return $this;
    }
    /**
    * A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:

    *  `*all` Returns all fields.
    *  `*navigable` Returns navigable fields.
    *  Any issue field, prefixed with a minus to exclude.

    The default is `*navigable`.

    Examples:

    *  `summary,comment` Returns the summary and comments fields only.
    *  `-description` Returns all navigable (default) fields except description.
    *  `*all,-comment` Returns all fields except comments.

    Multiple `fields` parameters can be included in a request.

    Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields.
    *
    * @return string[]
    */
    public function getFields(): array
    {
        return $this->fields;
    }
    /**
    * A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:

    *  `*all` Returns all fields.
    *  `*navigable` Returns navigable fields.
    *  Any issue field, prefixed with a minus to exclude.

    The default is `*navigable`.

    Examples:

    *  `summary,comment` Returns the summary and comments fields only.
    *  `-description` Returns all navigable (default) fields except description.
    *  `*all,-comment` Returns all fields except comments.

    Multiple `fields` parameters can be included in a request.

    Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields.
    *
    * @param string[] $fields
    *
    * @return self
    */
    public function setFields(array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;
        return $this;
    }
    /**
    * Determines how to validate the JQL query and treat the validation results. Supported values:

    *  `strict` Returns a 400 response code if any errors are found, along with a list of all errors (and warnings).
    *  `warn` Returns all errors as warnings.
    *  `none` No validation is performed.
    *  `true` *Deprecated* A legacy synonym for `strict`.
    *  `false` *Deprecated* A legacy synonym for `warn`.

    The default is `strict`.

    Note: If the JQL is not correctly formed a 400 response code is returned, regardless of the `validateQuery` value.
    *
    * @return string
    */
    public function getValidateQuery(): string
    {
        return $this->validateQuery;
    }
    /**
    * Determines how to validate the JQL query and treat the validation results. Supported values:

    *  `strict` Returns a 400 response code if any errors are found, along with a list of all errors (and warnings).
    *  `warn` Returns all errors as warnings.
    *  `none` No validation is performed.
    *  `true` *Deprecated* A legacy synonym for `strict`.
    *  `false` *Deprecated* A legacy synonym for `warn`.

    The default is `strict`.

    Note: If the JQL is not correctly formed a 400 response code is returned, regardless of the `validateQuery` value.
    *
    * @param string $validateQuery
    *
    * @return self
    */
    public function setValidateQuery(string $validateQuery): self
    {
        $this->initialized['validateQuery'] = true;
        $this->validateQuery = $validateQuery;
        return $this;
    }
    /**
     * Use [expand](em>#expansion) to include additional information about issues in the response. Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a list of values. The expand options are:
     *  `renderedFields` Returns field values rendered in HTML format.
     *  `names` Returns the display name of each field.
     *  `schema` Returns the schema describing a field type.
     *  `transitions` Returns all possible transitions for the issue.
     *  `operations` Returns all possible operations for the issue.
     *  `editmeta` Returns information about how each field can be edited.
     *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.
     *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version.
     *
     * @return string[]
     */
    public function getExpand(): array
    {
        return $this->expand;
    }
    /**
     * Use [expand](em>#expansion) to include additional information about issues in the response. Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a list of values. The expand options are:
     *  `renderedFields` Returns field values rendered in HTML format.
     *  `names` Returns the display name of each field.
     *  `schema` Returns the schema describing a field type.
     *  `transitions` Returns all possible transitions for the issue.
     *  `operations` Returns all possible operations for the issue.
     *  `editmeta` Returns information about how each field can be edited.
     *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.
     *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version.
     *
     * @param string[] $expand
     *
     * @return self
     */
    public function setExpand(array $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;
        return $this;
    }
    /**
     * A list of up to 5 issue properties to include in the results. This parameter accepts a comma-separated list.
     *
     * @return string[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }
    /**
     * A list of up to 5 issue properties to include in the results. This parameter accepts a comma-separated list.
     *
     * @param string[] $properties
     *
     * @return self
     */
    public function setProperties(array $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;
        return $this;
    }
    /**
     * Reference fields by their key (rather than ID). The default is `false`.
     *
     * @return bool
     */
    public function getFieldsByKeys(): bool
    {
        return $this->fieldsByKeys;
    }
    /**
     * Reference fields by their key (rather than ID). The default is `false`.
     *
     * @param bool $fieldsByKeys
     *
     * @return self
     */
    public function setFieldsByKeys(bool $fieldsByKeys): self
    {
        $this->initialized['fieldsByKeys'] = true;
        $this->fieldsByKeys = $fieldsByKeys;
        return $this;
    }
}
