<?php

namespace JiraSdk\Model;

class ConfigurationTimeTrackingConfiguration extends \ArrayObject
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
     * The number of hours in a working day.
     *
     * @var float
     */
    protected $workingHoursPerDay;
    /**
     * The number of days in a working week.
     *
     * @var float
     */
    protected $workingDaysPerWeek;
    /**
     * The format that will appear on an issue's *Time Spent* field.
     *
     * @var string
     */
    protected $timeFormat;
    /**
     * The default unit of time applied to logged time.
     *
     * @var string
     */
    protected $defaultUnit;
    /**
     * The number of hours in a working day.
     *
     * @return float
     */
    public function getWorkingHoursPerDay(): float
    {
        return $this->workingHoursPerDay;
    }
    /**
     * The number of hours in a working day.
     *
     * @param float $workingHoursPerDay
     *
     * @return self
     */
    public function setWorkingHoursPerDay(float $workingHoursPerDay): self
    {
        $this->initialized['workingHoursPerDay'] = true;
        $this->workingHoursPerDay = $workingHoursPerDay;
        return $this;
    }
    /**
     * The number of days in a working week.
     *
     * @return float
     */
    public function getWorkingDaysPerWeek(): float
    {
        return $this->workingDaysPerWeek;
    }
    /**
     * The number of days in a working week.
     *
     * @param float $workingDaysPerWeek
     *
     * @return self
     */
    public function setWorkingDaysPerWeek(float $workingDaysPerWeek): self
    {
        $this->initialized['workingDaysPerWeek'] = true;
        $this->workingDaysPerWeek = $workingDaysPerWeek;
        return $this;
    }
    /**
     * The format that will appear on an issue's *Time Spent* field.
     *
     * @return string
     */
    public function getTimeFormat(): string
    {
        return $this->timeFormat;
    }
    /**
     * The format that will appear on an issue's *Time Spent* field.
     *
     * @param string $timeFormat
     *
     * @return self
     */
    public function setTimeFormat(string $timeFormat): self
    {
        $this->initialized['timeFormat'] = true;
        $this->timeFormat = $timeFormat;
        return $this;
    }
    /**
     * The default unit of time applied to logged time.
     *
     * @return string
     */
    public function getDefaultUnit(): string
    {
        return $this->defaultUnit;
    }
    /**
     * The default unit of time applied to logged time.
     *
     * @param string $defaultUnit
     *
     * @return self
     */
    public function setDefaultUnit(string $defaultUnit): self
    {
        $this->initialized['defaultUnit'] = true;
        $this->defaultUnit = $defaultUnit;
        return $this;
    }
}
