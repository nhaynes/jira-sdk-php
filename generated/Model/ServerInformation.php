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

class ServerInformation
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The base URL of the Jira instance.
     *
     * @var string
     */
    protected $baseUrl;
    /**
     * The version of Jira.
     *
     * @var string
     */
    protected $version;
    /**
     * The major, minor, and revision version numbers of the Jira version.
     *
     * @var int[]
     */
    protected $versionNumbers;
    /**
     * The type of server deployment. This is always returned as *Cloud*.
     *
     * @var string
     */
    protected $deploymentType;
    /**
     * The build number of the Jira version.
     *
     * @var int
     */
    protected $buildNumber;
    /**
     * The timestamp when the Jira version was built.
     *
     * @var \DateTime
     */
    protected $buildDate;
    /**
     * The time in Jira when this request was responded to.
     *
     * @var \DateTime
     */
    protected $serverTime;
    /**
     * The unique identifier of the Jira version.
     *
     * @var string
     */
    protected $scmInfo;
    /**
     * The name of the Jira instance.
     *
     * @var string
     */
    protected $serverTitle;
    /**
     * Jira instance health check results. Deprecated and no longer returned.
     *
     * @var HealthCheckResult[]
     */
    protected $healthChecks;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The base URL of the Jira instance.
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * The base URL of the Jira instance.
     */
    public function setBaseUrl(string $baseUrl): self
    {
        $this->initialized['baseUrl'] = true;
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * The version of Jira.
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * The version of Jira.
     */
    public function setVersion(string $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;

        return $this;
    }

    /**
     * The major, minor, and revision version numbers of the Jira version.
     *
     * @return int[]
     */
    public function getVersionNumbers(): array
    {
        return $this->versionNumbers;
    }

    /**
     * The major, minor, and revision version numbers of the Jira version.
     *
     * @param int[] $versionNumbers
     */
    public function setVersionNumbers(array $versionNumbers): self
    {
        $this->initialized['versionNumbers'] = true;
        $this->versionNumbers = $versionNumbers;

        return $this;
    }

    /**
     * The type of server deployment. This is always returned as *Cloud*.
     */
    public function getDeploymentType(): string
    {
        return $this->deploymentType;
    }

    /**
     * The type of server deployment. This is always returned as *Cloud*.
     */
    public function setDeploymentType(string $deploymentType): self
    {
        $this->initialized['deploymentType'] = true;
        $this->deploymentType = $deploymentType;

        return $this;
    }

    /**
     * The build number of the Jira version.
     */
    public function getBuildNumber(): int
    {
        return $this->buildNumber;
    }

    /**
     * The build number of the Jira version.
     */
    public function setBuildNumber(int $buildNumber): self
    {
        $this->initialized['buildNumber'] = true;
        $this->buildNumber = $buildNumber;

        return $this;
    }

    /**
     * The timestamp when the Jira version was built.
     */
    public function getBuildDate(): \DateTime
    {
        return $this->buildDate;
    }

    /**
     * The timestamp when the Jira version was built.
     */
    public function setBuildDate(\DateTime $buildDate): self
    {
        $this->initialized['buildDate'] = true;
        $this->buildDate = $buildDate;

        return $this;
    }

    /**
     * The time in Jira when this request was responded to.
     */
    public function getServerTime(): \DateTime
    {
        return $this->serverTime;
    }

    /**
     * The time in Jira when this request was responded to.
     */
    public function setServerTime(\DateTime $serverTime): self
    {
        $this->initialized['serverTime'] = true;
        $this->serverTime = $serverTime;

        return $this;
    }

    /**
     * The unique identifier of the Jira version.
     */
    public function getScmInfo(): string
    {
        return $this->scmInfo;
    }

    /**
     * The unique identifier of the Jira version.
     */
    public function setScmInfo(string $scmInfo): self
    {
        $this->initialized['scmInfo'] = true;
        $this->scmInfo = $scmInfo;

        return $this;
    }

    /**
     * The name of the Jira instance.
     */
    public function getServerTitle(): string
    {
        return $this->serverTitle;
    }

    /**
     * The name of the Jira instance.
     */
    public function setServerTitle(string $serverTitle): self
    {
        $this->initialized['serverTitle'] = true;
        $this->serverTitle = $serverTitle;

        return $this;
    }

    /**
     * Jira instance health check results. Deprecated and no longer returned.
     *
     * @return HealthCheckResult[]
     */
    public function getHealthChecks(): array
    {
        return $this->healthChecks;
    }

    /**
     * Jira instance health check results. Deprecated and no longer returned.
     *
     * @param HealthCheckResult[] $healthChecks
     */
    public function setHealthChecks(array $healthChecks): self
    {
        $this->initialized['healthChecks'] = true;
        $this->healthChecks = $healthChecks;

        return $this;
    }
}
