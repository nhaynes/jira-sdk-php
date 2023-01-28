<?php

namespace JiraSdk\Model;

class CustomFieldValueUpdate
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
     * The list of issue IDs.
     *
     * @var int[]
     */
    protected $issueIds;
    /**
    * The value for the custom field. The value must be compatible with the [custom field type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#data-types) as follows:

    *  `string` the value must be a string.
    *  `number` the value must be a number.
    *  `datetime` the value must be a string that represents a date in the ISO format or the simplified extended ISO format. For example, `"2023-01-18T12:00:00-03:00"` or `"2023-01-18T12:00:00.000Z"`. However, the milliseconds part is ignored.
    *  `user` the value must be an object that contains the `accountId` field.
    *  `group` the value must be an object that contains the group `name` or `groupId` field. Because group names can change, we recommend using `groupId`.

    A list of appropriate values must be provided if the field is of the `list` [collection type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#collection-types).
    *
    * @var mixed
    */
    protected $value;
    /**
     * The list of issue IDs.
     *
     * @return int[]
     */
    public function getIssueIds(): array
    {
        return $this->issueIds;
    }
    /**
     * The list of issue IDs.
     *
     * @param int[] $issueIds
     *
     * @return self
     */
    public function setIssueIds(array $issueIds): self
    {
        $this->initialized['issueIds'] = true;
        $this->issueIds = $issueIds;
        return $this;
    }
    /**
    * The value for the custom field. The value must be compatible with the [custom field type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#data-types) as follows:

    *  `string` the value must be a string.
    *  `number` the value must be a number.
    *  `datetime` the value must be a string that represents a date in the ISO format or the simplified extended ISO format. For example, `"2023-01-18T12:00:00-03:00"` or `"2023-01-18T12:00:00.000Z"`. However, the milliseconds part is ignored.
    *  `user` the value must be an object that contains the `accountId` field.
    *  `group` the value must be an object that contains the group `name` or `groupId` field. Because group names can change, we recommend using `groupId`.

    A list of appropriate values must be provided if the field is of the `list` [collection type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#collection-types).
    *
    * @return mixed
    */
    public function getValue()
    {
        return $this->value;
    }
    /**
    * The value for the custom field. The value must be compatible with the [custom field type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#data-types) as follows:

    *  `string` the value must be a string.
    *  `number` the value must be a number.
    *  `datetime` the value must be a string that represents a date in the ISO format or the simplified extended ISO format. For example, `"2023-01-18T12:00:00-03:00"` or `"2023-01-18T12:00:00.000Z"`. However, the milliseconds part is ignored.
    *  `user` the value must be an object that contains the `accountId` field.
    *  `group` the value must be an object that contains the group `name` or `groupId` field. Because group names can change, we recommend using `groupId`.

    A list of appropriate values must be provided if the field is of the `list` [collection type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#collection-types).
    *
    * @param mixed $value
    *
    * @return self
    */
    public function setValue($value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}
