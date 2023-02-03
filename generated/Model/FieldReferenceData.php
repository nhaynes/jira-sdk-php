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

class FieldReferenceData
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The field identifier.
     *
     * @var string
     */
    protected $value;
    /**
     * The display name contains the following:
     *  for system fields, the field name. For example, `Summary`.
     *  for collapsed custom fields, the field name followed by a hyphen and then the field name and field type. For example, `Component - Component[Dropdown]`.
     *  for other custom fields, the field name followed by a hyphen and then the custom field ID. For example, `Component - cf[10061]`.
     *
     * @var string
     */
    protected $displayName;
    /**
     * Whether the field can be used in a query's `ORDER BY` clause.
     *
     * @var string
     */
    protected $orderable;
    /**
     * Whether the content of this field can be searched.
     *
     * @var string
     */
    protected $searchable;
    /**
     * Whether this field has been deprecated.
     *
     * @var string
     */
    protected $deprecated;
    /**
     * The searcher key of the field, only passed when the field is deprecated.
     *
     * @var string
     */
    protected $deprecatedSearcherKey;
    /**
     * Whether the field provide auto-complete suggestions.
     *
     * @var string
     */
    protected $auto;
    /**
     * If the item is a custom field, the ID of the custom field.
     *
     * @var string
     */
    protected $cfid;
    /**
     * The valid search operators for the field.
     *
     * @var string[]
     */
    protected $operators;
    /**
     * The data types of items in the field.
     *
     * @var string[]
     */
    protected $types;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The field identifier.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The field identifier.
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * The display name contains the following:
     *  for system fields, the field name. For example, `Summary`.
     *  for collapsed custom fields, the field name followed by a hyphen and then the field name and field type. For example, `Component - Component[Dropdown]`.
     *  for other custom fields, the field name followed by a hyphen and then the custom field ID. For example, `Component - cf[10061]`.
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * The display name contains the following:
     *  for system fields, the field name. For example, `Summary`.
     *  for collapsed custom fields, the field name followed by a hyphen and then the field name and field type. For example, `Component - Component[Dropdown]`.
     *  for other custom fields, the field name followed by a hyphen and then the custom field ID. For example, `Component - cf[10061]`.
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Whether the field can be used in a query's `ORDER BY` clause.
     */
    public function getOrderable(): string
    {
        return $this->orderable;
    }

    /**
     * Whether the field can be used in a query's `ORDER BY` clause.
     */
    public function setOrderable(string $orderable): self
    {
        $this->initialized['orderable'] = true;
        $this->orderable = $orderable;

        return $this;
    }

    /**
     * Whether the content of this field can be searched.
     */
    public function getSearchable(): string
    {
        return $this->searchable;
    }

    /**
     * Whether the content of this field can be searched.
     */
    public function setSearchable(string $searchable): self
    {
        $this->initialized['searchable'] = true;
        $this->searchable = $searchable;

        return $this;
    }

    /**
     * Whether this field has been deprecated.
     */
    public function getDeprecated(): string
    {
        return $this->deprecated;
    }

    /**
     * Whether this field has been deprecated.
     */
    public function setDeprecated(string $deprecated): self
    {
        $this->initialized['deprecated'] = true;
        $this->deprecated = $deprecated;

        return $this;
    }

    /**
     * The searcher key of the field, only passed when the field is deprecated.
     */
    public function getDeprecatedSearcherKey(): string
    {
        return $this->deprecatedSearcherKey;
    }

    /**
     * The searcher key of the field, only passed when the field is deprecated.
     */
    public function setDeprecatedSearcherKey(string $deprecatedSearcherKey): self
    {
        $this->initialized['deprecatedSearcherKey'] = true;
        $this->deprecatedSearcherKey = $deprecatedSearcherKey;

        return $this;
    }

    /**
     * Whether the field provide auto-complete suggestions.
     */
    public function getAuto(): string
    {
        return $this->auto;
    }

    /**
     * Whether the field provide auto-complete suggestions.
     */
    public function setAuto(string $auto): self
    {
        $this->initialized['auto'] = true;
        $this->auto = $auto;

        return $this;
    }

    /**
     * If the item is a custom field, the ID of the custom field.
     */
    public function getCfid(): string
    {
        return $this->cfid;
    }

    /**
     * If the item is a custom field, the ID of the custom field.
     */
    public function setCfid(string $cfid): self
    {
        $this->initialized['cfid'] = true;
        $this->cfid = $cfid;

        return $this;
    }

    /**
     * The valid search operators for the field.
     *
     * @return string[]
     */
    public function getOperators(): array
    {
        return $this->operators;
    }

    /**
     * The valid search operators for the field.
     *
     * @param string[] $operators
     */
    public function setOperators(array $operators): self
    {
        $this->initialized['operators'] = true;
        $this->operators = $operators;

        return $this;
    }

    /**
     * The data types of items in the field.
     *
     * @return string[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * The data types of items in the field.
     *
     * @param string[] $types
     */
    public function setTypes(array $types): self
    {
        $this->initialized['types'] = true;
        $this->types = $types;

        return $this;
    }
}
