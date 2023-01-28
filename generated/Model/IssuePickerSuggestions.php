<?php

namespace JiraSdk\Model;

class IssuePickerSuggestions
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
     * A list of issues for an issue type suggested for use in auto-completion.
     *
     * @var IssuePickerSuggestionsIssueType[]
     */
    protected $sections;
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
     *
     * @return self
     */
    public function setSections(array $sections): self
    {
        $this->initialized['sections'] = true;
        $this->sections = $sections;
        return $this;
    }
}
