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

class IssuePickerSuggestions
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of issues for an issue type suggested for use in auto-completion.
     *
     * @var IssuePickerSuggestionsIssueType[]
     */
    protected $sections;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of issues for an issue type suggested for use in auto-completion.
     *
     * @return IssuePickerSuggestionsIssueType[]
     */
    public function getSections(): array
    {
        return $this->sections;
    }

    /**
     * A list of issues for an issue type suggested for use in auto-completion.
     *
     * @param IssuePickerSuggestionsIssueType[] $sections
     */
    public function setSections(array $sections): self
    {
        $this->initialized['sections'] = true;
        $this->sections = $sections;

        return $this;
    }
}
