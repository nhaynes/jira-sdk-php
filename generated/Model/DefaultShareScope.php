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

class DefaultShareScope
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The scope of the default sharing for new filters and dashboards:
     *  `AUTHENTICATED` Shared with all logged-in users.
     *  `GLOBAL` Shared with all logged-in users. This shows as `AUTHENTICATED` in the response.
     *  `PRIVATE` Not shared with any users.
     *
     * @var string
     */
    protected $scope;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The scope of the default sharing for new filters and dashboards:
     *  `AUTHENTICATED` Shared with all logged-in users.
     *  `GLOBAL` Shared with all logged-in users. This shows as `AUTHENTICATED` in the response.
     *  `PRIVATE` Not shared with any users.
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * The scope of the default sharing for new filters and dashboards:
     *  `AUTHENTICATED` Shared with all logged-in users.
     *  `GLOBAL` Shared with all logged-in users. This shows as `AUTHENTICATED` in the response.
     *  `PRIVATE` Not shared with any users.
     */
    public function setScope(string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }
}
