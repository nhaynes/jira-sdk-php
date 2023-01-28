<?php

namespace JiraSdk\Model;

class IssuePickerSuggestionsIssueType
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
     * The label of the type of issues suggested for use in auto-completion.
     *
     * @var string
     */
    protected $label;
    /**
     * If issue suggestions are found, returns a message indicating the number of issues suggestions found and returned.
     *
     * @var string
     */
    protected $sub;
    /**
     * The ID of the type of issues suggested for use in auto-completion.
     *
     * @var string
     */
    protected $id;
    /**
     * If no issue suggestions are found, returns a message indicating no suggestions were found,
     *
     * @var string
     */
    protected $msg;
    /**
     * A list of issues suggested for use in auto-completion.
     *
     * @var SuggestedIssue[]
     */
    protected $issues;
    /**
     * The label of the type of issues suggested for use in auto-completion.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }
    /**
     * The label of the type of issues suggested for use in auto-completion.
     *
     * @param string $label
     *
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
        return $this;
    }
    /**
     * If issue suggestions are found, returns a message indicating the number of issues suggestions found and returned.
     *
     * @return string
     */
    public function getSub(): string
    {
        return $this->sub;
    }
    /**
     * If issue suggestions are found, returns a message indicating the number of issues suggestions found and returned.
     *
     * @param string $sub
     *
     * @return self
     */
    public function setSub(string $sub): self
    {
        $this->initialized['sub'] = true;
        $this->sub = $sub;
        return $this;
    }
    /**
     * The ID of the type of issues suggested for use in auto-completion.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the type of issues suggested for use in auto-completion.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * If no issue suggestions are found, returns a message indicating no suggestions were found,
     *
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }
    /**
     * If no issue suggestions are found, returns a message indicating no suggestions were found,
     *
     * @param string $msg
     *
     * @return self
     */
    public function setMsg(string $msg): self
    {
        $this->initialized['msg'] = true;
        $this->msg = $msg;
        return $this;
    }
    /**
     * A list of issues suggested for use in auto-completion.
     *
     * @return SuggestedIssue[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }
    /**
     * A list of issues suggested for use in auto-completion.
     *
     * @param SuggestedIssue[] $issues
     *
     * @return self
     */
    public function setIssues(array $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;
        return $this;
    }
}
