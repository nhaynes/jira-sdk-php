<?php

namespace JiraSdk\Model;

class IssueMatchesForJQL
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
     * A list of issue IDs.
     *
     * @var int[]
     */
    protected $matchedIssues;
    /**
     * A list of errors.
     *
     * @var string[]
     */
    protected $errors;
    /**
     * A list of issue IDs.
     *
     * @return int[]
     */
    public function getMatchedIssues(): array
    {
        return $this->matchedIssues;
    }
    /**
     * A list of issue IDs.
     *
     * @param int[] $matchedIssues
     *
     * @return self
     */
    public function setMatchedIssues(array $matchedIssues): self
    {
        $this->initialized['matchedIssues'] = true;
        $this->matchedIssues = $matchedIssues;
        return $this;
    }
    /**
     * A list of errors.
     *
     * @return string[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    /**
     * A list of errors.
     *
     * @param string[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
}
