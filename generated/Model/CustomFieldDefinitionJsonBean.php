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

class CustomFieldDefinitionJsonBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the custom field, which is displayed in Jira. This is not the unique identifier.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the custom field, which is displayed in Jira.
     *
     * @var string
     */
    protected $description;
    /**
     * The type of the custom field. These built-in custom field types are available:.
     *
     *  `cascadingselect`: Enables values to be selected from two levels of select lists (value: `com.atlassian.jira.plugin.system.customfieldtypes:cascadingselect`)
     *  `datepicker`: Stores a date using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`)
     *  `datetime`: Stores a date with a time component (value: `com.atlassian.jira.plugin.system.customfieldtypes:datetime`)
     *  `float`: Stores and validates a numeric (floating point) input (value: `com.atlassian.jira.plugin.system.customfieldtypes:float`)
     *  `grouppicker`: Stores a user group using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:grouppicker`)
     *  `importid`: A read-only field that stores the ID the issue had in the system it was imported from (value: `com.atlassian.jira.plugin.system.customfieldtypes:importid`)
     *  `labels`: Stores labels (value: `com.atlassian.jira.plugin.system.customfieldtypes:labels`)
     *  `multicheckboxes`: Stores multiple values using checkboxes (value: ``)
     *  `multigrouppicker`: Stores multiple user groups using a picker control (value: ``)
     *  `multiselect`: Stores multiple values using a select list (value: `com.atlassian.jira.plugin.system.customfieldtypes:multicheckboxes`)
     *  `multiuserpicker`: Stores multiple users using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:multigrouppicker`)
     *  `multiversion`: Stores multiple versions from the versions available in a project using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:multiversion`)
     *  `project`: Stores a project from a list of projects that the user is permitted to view (value: `com.atlassian.jira.plugin.system.customfieldtypes:project`)
     *  `radiobuttons`: Stores a value using radio buttons (value: `com.atlassian.jira.plugin.system.customfieldtypes:radiobuttons`)
     *  `readonlyfield`: Stores a read-only text value, which can only be populated via the API (value: `com.atlassian.jira.plugin.system.customfieldtypes:readonlyfield`)
     *  `select`: Stores a value from a configurable list of options (value: `com.atlassian.jira.plugin.system.customfieldtypes:select`)
     *  `textarea`: Stores a long text string using a multiline text area (value: `com.atlassian.jira.plugin.system.customfieldtypes:textarea`)
     *  `textfield`: Stores a text string using a single-line text box (value: `com.atlassian.jira.plugin.system.customfieldtypes:textfield`)
     *  `url`: Stores a URL (value: `com.atlassian.jira.plugin.system.customfieldtypes:url`)
     *  `userpicker`: Stores a user using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:userpicker`)
     *  `version`: Stores a version using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:version`)
     *
     * To create a field based on a [Forge custom field type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/#jira-custom-field-type--beta-), use the ID of the Forge custom field type as the value. For example, `ari:cloud:ecosystem::extension/e62f20a2-4b61-4dbe-bfb9-9a88b5e3ac84/548c5df1-24aa-4f7c-bbbb-3038d947cb05/static/my-cf-type-key`.
     *
     * @var string
     */
    protected $type;
    /**
     * The searcher defines the way the field is searched in Jira. For example, *com.atlassian.jira.plugin.system.customfieldtypes:grouppickersearcher*.
     * The search UI (basic search and JQL search) will display different operations and values for the field, based on the field searcher. You must specify a searcher that is valid for the field type, as listed below (abbreviated values shown):.
     *
     *  `cascadingselect`: `cascadingselectsearcher`
     *  `datepicker`: `daterange`
     *  `datetime`: `datetimerange`
     *  `float`: `exactnumber` or `numberrange`
     *  `grouppicker`: `grouppickersearcher`
     *  `importid`: `exactnumber` or `numberrange`
     *  `labels`: `labelsearcher`
     *  `multicheckboxes`: `multiselectsearcher`
     *  `multigrouppicker`: `multiselectsearcher`
     *  `multiselect`: `multiselectsearcher`
     *  `multiuserpicker`: `userpickergroupsearcher`
     *  `multiversion`: `versionsearcher`
     *  `project`: `projectsearcher`
     *  `radiobuttons`: `multiselectsearcher`
     *  `readonlyfield`: `textsearcher`
     *  `select`: `multiselectsearcher`
     *  `textarea`: `textsearcher`
     *  `textfield`: `textsearcher`
     *  `url`: `exacttextsearcher`
     *  `userpicker`: `userpickergroupsearcher`
     *  `version`: `versionsearcher`
     *
     * If no searcher is provided, the field isn't searchable. However, [Forge custom fields](https://developer.atlassian.com/platform/forge/manifest-reference/modules/#jira-custom-field-type--beta-) have a searcher set automatically, so are always searchable.
     *
     * @var string
     */
    protected $searcherKey;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the custom field, which is displayed in Jira. This is not the unique identifier.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the custom field, which is displayed in Jira. This is not the unique identifier.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the custom field, which is displayed in Jira.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the custom field, which is displayed in Jira.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The type of the custom field. These built-in custom field types are available:.
     *
     *  `cascadingselect`: Enables values to be selected from two levels of select lists (value: `com.atlassian.jira.plugin.system.customfieldtypes:cascadingselect`)
     *  `datepicker`: Stores a date using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`)
     *  `datetime`: Stores a date with a time component (value: `com.atlassian.jira.plugin.system.customfieldtypes:datetime`)
     *  `float`: Stores and validates a numeric (floating point) input (value: `com.atlassian.jira.plugin.system.customfieldtypes:float`)
     *  `grouppicker`: Stores a user group using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:grouppicker`)
     *  `importid`: A read-only field that stores the ID the issue had in the system it was imported from (value: `com.atlassian.jira.plugin.system.customfieldtypes:importid`)
     *  `labels`: Stores labels (value: `com.atlassian.jira.plugin.system.customfieldtypes:labels`)
     *  `multicheckboxes`: Stores multiple values using checkboxes (value: ``)
     *  `multigrouppicker`: Stores multiple user groups using a picker control (value: ``)
     *  `multiselect`: Stores multiple values using a select list (value: `com.atlassian.jira.plugin.system.customfieldtypes:multicheckboxes`)
     *  `multiuserpicker`: Stores multiple users using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:multigrouppicker`)
     *  `multiversion`: Stores multiple versions from the versions available in a project using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:multiversion`)
     *  `project`: Stores a project from a list of projects that the user is permitted to view (value: `com.atlassian.jira.plugin.system.customfieldtypes:project`)
     *  `radiobuttons`: Stores a value using radio buttons (value: `com.atlassian.jira.plugin.system.customfieldtypes:radiobuttons`)
     *  `readonlyfield`: Stores a read-only text value, which can only be populated via the API (value: `com.atlassian.jira.plugin.system.customfieldtypes:readonlyfield`)
     *  `select`: Stores a value from a configurable list of options (value: `com.atlassian.jira.plugin.system.customfieldtypes:select`)
     *  `textarea`: Stores a long text string using a multiline text area (value: `com.atlassian.jira.plugin.system.customfieldtypes:textarea`)
     *  `textfield`: Stores a text string using a single-line text box (value: `com.atlassian.jira.plugin.system.customfieldtypes:textfield`)
     *  `url`: Stores a URL (value: `com.atlassian.jira.plugin.system.customfieldtypes:url`)
     *  `userpicker`: Stores a user using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:userpicker`)
     *  `version`: Stores a version using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:version`)
     *
     * To create a field based on a [Forge custom field type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/#jira-custom-field-type--beta-), use the ID of the Forge custom field type as the value. For example, `ari:cloud:ecosystem::extension/e62f20a2-4b61-4dbe-bfb9-9a88b5e3ac84/548c5df1-24aa-4f7c-bbbb-3038d947cb05/static/my-cf-type-key`.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of the custom field. These built-in custom field types are available:.
     *
     *  `cascadingselect`: Enables values to be selected from two levels of select lists (value: `com.atlassian.jira.plugin.system.customfieldtypes:cascadingselect`)
     *  `datepicker`: Stores a date using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`)
     *  `datetime`: Stores a date with a time component (value: `com.atlassian.jira.plugin.system.customfieldtypes:datetime`)
     *  `float`: Stores and validates a numeric (floating point) input (value: `com.atlassian.jira.plugin.system.customfieldtypes:float`)
     *  `grouppicker`: Stores a user group using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:grouppicker`)
     *  `importid`: A read-only field that stores the ID the issue had in the system it was imported from (value: `com.atlassian.jira.plugin.system.customfieldtypes:importid`)
     *  `labels`: Stores labels (value: `com.atlassian.jira.plugin.system.customfieldtypes:labels`)
     *  `multicheckboxes`: Stores multiple values using checkboxes (value: ``)
     *  `multigrouppicker`: Stores multiple user groups using a picker control (value: ``)
     *  `multiselect`: Stores multiple values using a select list (value: `com.atlassian.jira.plugin.system.customfieldtypes:multicheckboxes`)
     *  `multiuserpicker`: Stores multiple users using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:multigrouppicker`)
     *  `multiversion`: Stores multiple versions from the versions available in a project using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:multiversion`)
     *  `project`: Stores a project from a list of projects that the user is permitted to view (value: `com.atlassian.jira.plugin.system.customfieldtypes:project`)
     *  `radiobuttons`: Stores a value using radio buttons (value: `com.atlassian.jira.plugin.system.customfieldtypes:radiobuttons`)
     *  `readonlyfield`: Stores a read-only text value, which can only be populated via the API (value: `com.atlassian.jira.plugin.system.customfieldtypes:readonlyfield`)
     *  `select`: Stores a value from a configurable list of options (value: `com.atlassian.jira.plugin.system.customfieldtypes:select`)
     *  `textarea`: Stores a long text string using a multiline text area (value: `com.atlassian.jira.plugin.system.customfieldtypes:textarea`)
     *  `textfield`: Stores a text string using a single-line text box (value: `com.atlassian.jira.plugin.system.customfieldtypes:textfield`)
     *  `url`: Stores a URL (value: `com.atlassian.jira.plugin.system.customfieldtypes:url`)
     *  `userpicker`: Stores a user using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:userpicker`)
     *  `version`: Stores a version using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:version`)
     *
     * To create a field based on a [Forge custom field type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/#jira-custom-field-type--beta-), use the ID of the Forge custom field type as the value. For example, `ari:cloud:ecosystem::extension/e62f20a2-4b61-4dbe-bfb9-9a88b5e3ac84/548c5df1-24aa-4f7c-bbbb-3038d947cb05/static/my-cf-type-key`.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The searcher defines the way the field is searched in Jira. For example, *com.atlassian.jira.plugin.system.customfieldtypes:grouppickersearcher*.
     * The search UI (basic search and JQL search) will display different operations and values for the field, based on the field searcher. You must specify a searcher that is valid for the field type, as listed below (abbreviated values shown):.
     *
     *  `cascadingselect`: `cascadingselectsearcher`
     *  `datepicker`: `daterange`
     *  `datetime`: `datetimerange`
     *  `float`: `exactnumber` or `numberrange`
     *  `grouppicker`: `grouppickersearcher`
     *  `importid`: `exactnumber` or `numberrange`
     *  `labels`: `labelsearcher`
     *  `multicheckboxes`: `multiselectsearcher`
     *  `multigrouppicker`: `multiselectsearcher`
     *  `multiselect`: `multiselectsearcher`
     *  `multiuserpicker`: `userpickergroupsearcher`
     *  `multiversion`: `versionsearcher`
     *  `project`: `projectsearcher`
     *  `radiobuttons`: `multiselectsearcher`
     *  `readonlyfield`: `textsearcher`
     *  `select`: `multiselectsearcher`
     *  `textarea`: `textsearcher`
     *  `textfield`: `textsearcher`
     *  `url`: `exacttextsearcher`
     *  `userpicker`: `userpickergroupsearcher`
     *  `version`: `versionsearcher`
     *
     * If no searcher is provided, the field isn't searchable. However, [Forge custom fields](https://developer.atlassian.com/platform/forge/manifest-reference/modules/#jira-custom-field-type--beta-) have a searcher set automatically, so are always searchable.
     */
    public function getSearcherKey(): string
    {
        return $this->searcherKey;
    }

    /**
     * The searcher defines the way the field is searched in Jira. For example, *com.atlassian.jira.plugin.system.customfieldtypes:grouppickersearcher*.
     * The search UI (basic search and JQL search) will display different operations and values for the field, based on the field searcher. You must specify a searcher that is valid for the field type, as listed below (abbreviated values shown):.
     *
     *  `cascadingselect`: `cascadingselectsearcher`
     *  `datepicker`: `daterange`
     *  `datetime`: `datetimerange`
     *  `float`: `exactnumber` or `numberrange`
     *  `grouppicker`: `grouppickersearcher`
     *  `importid`: `exactnumber` or `numberrange`
     *  `labels`: `labelsearcher`
     *  `multicheckboxes`: `multiselectsearcher`
     *  `multigrouppicker`: `multiselectsearcher`
     *  `multiselect`: `multiselectsearcher`
     *  `multiuserpicker`: `userpickergroupsearcher`
     *  `multiversion`: `versionsearcher`
     *  `project`: `projectsearcher`
     *  `radiobuttons`: `multiselectsearcher`
     *  `readonlyfield`: `textsearcher`
     *  `select`: `multiselectsearcher`
     *  `textarea`: `textsearcher`
     *  `textfield`: `textsearcher`
     *  `url`: `exacttextsearcher`
     *  `userpicker`: `userpickergroupsearcher`
     *  `version`: `versionsearcher`
     *
     * If no searcher is provided, the field isn't searchable. However, [Forge custom fields](https://developer.atlassian.com/platform/forge/manifest-reference/modules/#jira-custom-field-type--beta-) have a searcher set automatically, so are always searchable.
     */
    public function setSearcherKey(string $searcherKey): self
    {
        $this->initialized['searcherKey'] = true;
        $this->searcherKey = $searcherKey;

        return $this;
    }
}
