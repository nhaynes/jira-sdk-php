<?php

namespace JiraSdk\Model;

class VersionIssuesStatus extends \ArrayObject
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
    /**
     * Count of issues with a status other than *to do*, *in progress*, and *done*.
     *
     * @return int
     */
    public function getUnmapped(): int
    {
        return $this->unmapped;
    }
    /**
     * Count of issues with a status other than *to do*, *in progress*, and *done*.
     *
     * @param int $unmapped
     *
     * @return self
     */
    public function setUnmapped(int $unmapped): self
    {
        $this->initialized['unmapped'] = true;
        $this->unmapped = $unmapped;
        return $this;
    }
    /**
     * Count of issues with status *to do*.
     *
     * @return int
     */
    public function getToDo(): int
    {
        return $this->toDo;
    }
    /**
     * Count of issues with status *to do*.
     *
     * @param int $toDo
     *
     * @return self
     */
    public function setToDo(int $toDo): self
    {
        $this->initialized['toDo'] = true;
        $this->toDo = $toDo;
        return $this;
    }
    /**
     * Count of issues with status *in progress*.
     *
     * @return int
     */
    public function getInProgress(): int
    {
        return $this->inProgress;
    }
    /**
     * Count of issues with status *in progress*.
     *
     * @param int $inProgress
     *
     * @return self
     */
    public function setInProgress(int $inProgress): self
    {
        $this->initialized['inProgress'] = true;
        $this->inProgress = $inProgress;
        return $this;
    }
    /**
     * Count of issues with status *done*.
     *
     * @return int
     */
    public function getDone(): int
    {
        return $this->done;
    }
    /**
     * Count of issues with status *done*.
     *
     * @param int $done
     *
     * @return self
     */
    public function setDone(int $done): self
    {
        $this->initialized['done'] = true;
        $this->done = $done;
        return $this;
    }
}
