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

class FieldsTimetracking extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The original estimate of time needed for this issue in readable format.
     *
     * @var string
     */
    protected $originalEstimate;
    /**
     * The remaining estimate of time needed for this issue in readable format.
     *
     * @var string
     */
    protected $remainingEstimate;
    /**
     * Time worked on this issue in readable format.
     *
     * @var string
     */
    protected $timeSpent;
    /**
     * The original estimate of time needed for this issue in seconds.
     *
     * @var int
     */
    protected $originalEstimateSeconds;
    /**
     * The remaining estimate of time needed for this issue in seconds.
     *
     * @var int
     */
    protected $remainingEstimateSeconds;
    /**
     * Time worked on this issue in seconds.
     *
     * @var int
     */
    protected $timeSpentSeconds;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The original estimate of time needed for this issue in readable format.
     */
    public function getOriginalEstimate(): string
    {
        return $this->originalEstimate;
    }

    /**
     * The original estimate of time needed for this issue in readable format.
     */
    public function setOriginalEstimate(string $originalEstimate): self
    {
        $this->initialized['originalEstimate'] = true;
        $this->originalEstimate = $originalEstimate;

        return $this;
    }

    /**
     * The remaining estimate of time needed for this issue in readable format.
     */
    public function getRemainingEstimate(): string
    {
        return $this->remainingEstimate;
    }

    /**
     * The remaining estimate of time needed for this issue in readable format.
     */
    public function setRemainingEstimate(string $remainingEstimate): self
    {
        $this->initialized['remainingEstimate'] = true;
        $this->remainingEstimate = $remainingEstimate;

        return $this;
    }

    /**
     * Time worked on this issue in readable format.
     */
    public function getTimeSpent(): string
    {
        return $this->timeSpent;
    }

    /**
     * Time worked on this issue in readable format.
     */
    public function setTimeSpent(string $timeSpent): self
    {
        $this->initialized['timeSpent'] = true;
        $this->timeSpent = $timeSpent;

        return $this;
    }

    /**
     * The original estimate of time needed for this issue in seconds.
     */
    public function getOriginalEstimateSeconds(): int
    {
        return $this->originalEstimateSeconds;
    }

    /**
     * The original estimate of time needed for this issue in seconds.
     */
    public function setOriginalEstimateSeconds(int $originalEstimateSeconds): self
    {
        $this->initialized['originalEstimateSeconds'] = true;
        $this->originalEstimateSeconds = $originalEstimateSeconds;

        return $this;
    }

    /**
     * The remaining estimate of time needed for this issue in seconds.
     */
    public function getRemainingEstimateSeconds(): int
    {
        return $this->remainingEstimateSeconds;
    }

    /**
     * The remaining estimate of time needed for this issue in seconds.
     */
    public function setRemainingEstimateSeconds(int $remainingEstimateSeconds): self
    {
        $this->initialized['remainingEstimateSeconds'] = true;
        $this->remainingEstimateSeconds = $remainingEstimateSeconds;

        return $this;
    }

    /**
     * Time worked on this issue in seconds.
     */
    public function getTimeSpentSeconds(): int
    {
        return $this->timeSpentSeconds;
    }

    /**
     * Time worked on this issue in seconds.
     */
    public function setTimeSpentSeconds(int $timeSpentSeconds): self
    {
        $this->initialized['timeSpentSeconds'] = true;
        $this->timeSpentSeconds = $timeSpentSeconds;

        return $this;
    }
}
