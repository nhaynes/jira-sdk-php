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

class TaskProgressBeanRemoveOptionFromIssuesResultResult extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setUnmodifiedIssues(array $unmodifiedIssues): self
    {
        $this->initialized['unmodifiedIssues'] = true;
        $this->unmodifiedIssues = $unmodifiedIssues;

        return $this;
    }

    /**
     * A collection of errors related to unchanged issues. The collection size is limited, which means not all errors may be returned.
     */
    public function getErrors(): RemoveOptionFromIssuesResultErrors
    {
        return $this->errors;
    }

    /**
     * A collection of errors related to unchanged issues. The collection size is limited, which means not all errors may be returned.
     */
    public function setErrors(RemoveOptionFromIssuesResultErrors $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;

        return $this;
    }
}
