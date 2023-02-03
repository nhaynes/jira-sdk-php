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

class License
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The applications under this license.
     *
     * @var LicensedApplication[]
     */
    protected $applications;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The applications under this license.
     *
     * @return LicensedApplication[]
     */
    public function getApplications(): array
    {
        return $this->applications;
    }

    /**
     * The applications under this license.
     *
     * @param LicensedApplication[] $applications
     */
    public function setApplications(array $applications): self
    {
        $this->initialized['applications'] = true;
        $this->applications = $applications;

        return $this;
    }
}
