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

class IssueMatchesForJQL
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setErrors(array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;

        return $this;
    }
}
