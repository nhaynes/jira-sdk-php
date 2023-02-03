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

class TimeTrackingConfiguration
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The number of hours in a working day.
     */
    public function getWorkingHoursPerDay(): float
    {
        return $this->workingHoursPerDay;
    }

    /**
     * The number of hours in a working day.
     */
    public function setWorkingHoursPerDay(float $workingHoursPerDay): self
    {
        $this->initialized['workingHoursPerDay'] = true;
        $this->workingHoursPerDay = $workingHoursPerDay;

        return $this;
    }

    /**
     * The number of days in a working week.
     */
    public function getWorkingDaysPerWeek(): float
    {
        return $this->workingDaysPerWeek;
    }

    /**
     * The number of days in a working week.
     */
    public function setWorkingDaysPerWeek(float $workingDaysPerWeek): self
    {
        $this->initialized['workingDaysPerWeek'] = true;
        $this->workingDaysPerWeek = $workingDaysPerWeek;

        return $this;
    }

    /**
     * The format that will appear on an issue's *Time Spent* field.
     */
    public function getTimeFormat(): string
    {
        return $this->timeFormat;
    }

    /**
     * The format that will appear on an issue's *Time Spent* field.
     */
    public function setTimeFormat(string $timeFormat): self
    {
        $this->initialized['timeFormat'] = true;
        $this->timeFormat = $timeFormat;

        return $this;
    }

    /**
     * The default unit of time applied to logged time.
     */
    public function getDefaultUnit(): string
    {
        return $this->defaultUnit;
    }

    /**
     * The default unit of time applied to logged time.
     */
    public function setDefaultUnit(string $defaultUnit): self
    {
        $this->initialized['defaultUnit'] = true;
        $this->defaultUnit = $defaultUnit;

        return $this;
    }
}
