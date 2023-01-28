<?php

namespace JiraSdk\Model;

class RemoveOptionFromIssuesResult
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
     * The IDs of the modified issues.
     *
     * @var int[]
     */
    protected $modifiedIssues;
    /**
     * The IDs of the unchanged issues, those issues where errors prevent modification.
     *
     * @var int[]
     */
    protected $unmodifiedIssues;
    /**
     * A collection of errors related to unchanged issues. The collection size is limited, which means not all errors may be returned.
     *
     * @var RemoveOptionFromIssuesResultErrors
     */
    protected $errors;
    /**
     * The IDs of the modified issues.
     *
     * @return int[]
     */
    public function getModifiedIssues(): array
    {
        return $this->modifiedIssues;
    }
    /**
     * The IDs of the modified issues.
     *
     * @param int[] $modifiedIssues
     *
     * @return self
     */
    public function setModifiedIssues(array $modifiedIssues): self
    {
        $this->initialized['modifiedIssues'] = true;
        $this->modifiedIssues = $modifiedIssues;
        return $this;
    }
    /**
     * The IDs of the unchanged issues, those issues where errors prevent modification.
     *
     * @return int[]
     */
    public function getUnmodifiedIssues(): array
    {
        return $this->unmodifiedIssues;
    }
    /**
     * The IDs of the unchanged issues, those issues where errors prevent modification.
     *
     * @param int[] $unmodifiedIssues
     *
     * @return self
     */
    public function setUnmodifiedIssues(array $unmodifiedIssues): self
    {
        $this->initialized['unmodifiedIssues'] = true;
        $this->unmodifiedIssues = $unmodifiedIssues;
        return $this;
    }
    /**
     * A collection of errors related to unchanged issues. The collection size is limited, which means not all errors may be returned.
     *
     * @return RemoveOptionFromIssuesResultErrors
     */
    public function getErrors(): RemoveOptionFromIssuesResultErrors
    {
        return $this->errors;
    }
    /**
     * A collection of errors related to unchanged issues. The collection size is limited, which means not all errors may be returned.
     *
     * @param RemoveOptionFromIssuesResultErrors $errors
     *
     * @return self
     */
    public function setErrors(RemoveOptionFromIssuesResultErrors $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
}
