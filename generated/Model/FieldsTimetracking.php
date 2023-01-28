<?php

namespace JiraSdk\Model;

class FieldsTimetracking extends \ArrayObject
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
    /**
     * The original estimate of time needed for this issue in readable format.
     *
     * @return string
     */
    public function getOriginalEstimate(): string
    {
        return $this->originalEstimate;
    }
    /**
     * The original estimate of time needed for this issue in readable format.
     *
     * @param string $originalEstimate
     *
     * @return self
     */
    public function setOriginalEstimate(string $originalEstimate): self
    {
        $this->initialized['originalEstimate'] = true;
        $this->originalEstimate = $originalEstimate;
        return $this;
    }
    /**
     * The remaining estimate of time needed for this issue in readable format.
     *
     * @return string
     */
    public function getRemainingEstimate(): string
    {
        return $this->remainingEstimate;
    }
    /**
     * The remaining estimate of time needed for this issue in readable format.
     *
     * @param string $remainingEstimate
     *
     * @return self
     */
    public function setRemainingEstimate(string $remainingEstimate): self
    {
        $this->initialized['remainingEstimate'] = true;
        $this->remainingEstimate = $remainingEstimate;
        return $this;
    }
    /**
     * Time worked on this issue in readable format.
     *
     * @return string
     */
    public function getTimeSpent(): string
    {
        return $this->timeSpent;
    }
    /**
     * Time worked on this issue in readable format.
     *
     * @param string $timeSpent
     *
     * @return self
     */
    public function setTimeSpent(string $timeSpent): self
    {
        $this->initialized['timeSpent'] = true;
        $this->timeSpent = $timeSpent;
        return $this;
    }
    /**
     * The original estimate of time needed for this issue in seconds.
     *
     * @return int
     */
    public function getOriginalEstimateSeconds(): int
    {
        return $this->originalEstimateSeconds;
    }
    /**
     * The original estimate of time needed for this issue in seconds.
     *
     * @param int $originalEstimateSeconds
     *
     * @return self
     */
    public function setOriginalEstimateSeconds(int $originalEstimateSeconds): self
    {
        $this->initialized['originalEstimateSeconds'] = true;
        $this->originalEstimateSeconds = $originalEstimateSeconds;
        return $this;
    }
    /**
     * The remaining estimate of time needed for this issue in seconds.
     *
     * @return int
     */
    public function getRemainingEstimateSeconds(): int
    {
        return $this->remainingEstimateSeconds;
    }
    /**
     * The remaining estimate of time needed for this issue in seconds.
     *
     * @param int $remainingEstimateSeconds
     *
     * @return self
     */
    public function setRemainingEstimateSeconds(int $remainingEstimateSeconds): self
    {
        $this->initialized['remainingEstimateSeconds'] = true;
        $this->remainingEstimateSeconds = $remainingEstimateSeconds;
        return $this;
    }
    /**
     * Time worked on this issue in seconds.
     *
     * @return int
     */
    public function getTimeSpentSeconds(): int
    {
        return $this->timeSpentSeconds;
    }
    /**
     * Time worked on this issue in seconds.
     *
     * @param int $timeSpentSeconds
     *
     * @return self
     */
    public function setTimeSpentSeconds(int $timeSpentSeconds): self
    {
        $this->initialized['timeSpentSeconds'] = true;
        $this->timeSpentSeconds = $timeSpentSeconds;
        return $this;
    }
}
