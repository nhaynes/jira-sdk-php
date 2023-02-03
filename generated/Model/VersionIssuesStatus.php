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

class VersionIssuesStatus extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Count of issues with a status other than *to do*, *in progress*, and *done*.
     *
     * @var int
     */
    protected $unmapped;
    /**
     * Count of issues with status *to do*.
     *
     * @var int
     */
    protected $toDo;
    /**
     * Count of issues with status *in progress*.
     *
     * @var int
     */
    protected $inProgress;
    /**
     * Count of issues with status *done*.
     *
     * @var int
     */
    protected $done;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Count of issues with a status other than *to do*, *in progress*, and *done*.
     */
    public function getUnmapped(): int
    {
        return $this->unmapped;
    }

    /**
     * Count of issues with a status other than *to do*, *in progress*, and *done*.
     */
    public function setUnmapped(int $unmapped): self
    {
        $this->initialized['unmapped'] = true;
        $this->unmapped = $unmapped;

        return $this;
    }

    /**
     * Count of issues with status *to do*.
     */
    public function getToDo(): int
    {
        return $this->toDo;
    }

    /**
     * Count of issues with status *to do*.
     */
    public function setToDo(int $toDo): self
    {
        $this->initialized['toDo'] = true;
        $this->toDo = $toDo;

        return $this;
    }

    /**
     * Count of issues with status *in progress*.
     */
    public function getInProgress(): int
    {
        return $this->inProgress;
    }

    /**
     * Count of issues with status *in progress*.
     */
    public function setInProgress(int $inProgress): self
    {
        $this->initialized['inProgress'] = true;
        $this->inProgress = $inProgress;

        return $this;
    }

    /**
     * Count of issues with status *done*.
     */
    public function getDone(): int
    {
        return $this->done;
    }

    /**
     * Count of issues with status *done*.
     */
    public function setDone(int $done): self
    {
        $this->initialized['done'] = true;
        $this->done = $done;

        return $this;
    }
}
