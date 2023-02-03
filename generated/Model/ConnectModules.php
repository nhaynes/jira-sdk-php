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

class ConnectModules extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A list of app modules in the same format as the `modules` property in the
     * [app descriptor](https://developer.atlassian.com/cloud/jira/platform/app-descriptor/).
     *
     * @var mixed[][]
     */
    protected $modules;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A list of app modules in the same format as the `modules` property in the
     * [app descriptor](https://developer.atlassian.com/cloud/jira/platform/app-descriptor/).
     *
     * @return mixed[][]
     */
    public function getModules(): array
    {
        return $this->modules;
    }

    /**
     * A list of app modules in the same format as the `modules` property in the
     * [app descriptor](https://developer.atlassian.com/cloud/jira/platform/app-descriptor/).
     *
     * @param mixed[][] $modules
     */
    public function setModules(array $modules): self
    {
        $this->initialized['modules'] = true;
        $this->modules = $modules;

        return $this;
    }
}
