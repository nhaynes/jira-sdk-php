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

class UpdateCustomFieldDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the custom field. It doesn't have to be unique. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the custom field. The maximum length is 40000 characters.
     *
     * @var string
     */
    protected $description;
    /**
     * The searcher that defines the way the field is searched in Jira. It can be set to `null`, otherwise you must specify the valid searcher for the field type, as listed below (abbreviated values shown):
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
     *  `version`: `versionsearcher`.
     *
     * @var string
     */
    protected $searcherKey;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the custom field. It doesn't have to be unique. The maximum length is 255 characters.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the custom field. It doesn't have to be unique. The maximum length is 255 characters.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the custom field. The maximum length is 40000 characters.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the custom field. The maximum length is 40000 characters.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The searcher that defines the way the field is searched in Jira. It can be set to `null`, otherwise you must specify the valid searcher for the field type, as listed below (abbreviated values shown):
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
     *  `version`: `versionsearcher`.
     */
    public function getSearcherKey(): string
    {
        return $this->searcherKey;
    }

    /**
     * The searcher that defines the way the field is searched in Jira. It can be set to `null`, otherwise you must specify the valid searcher for the field type, as listed below (abbreviated values shown):
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
     *  `version`: `versionsearcher`.
     */
    public function setSearcherKey(string $searcherKey): self
    {
        $this->initialized['searcherKey'] = true;
        $this->searcherKey = $searcherKey;

        return $this;
    }
}
