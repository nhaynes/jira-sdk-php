<?php

namespace JiraSdk\Model;

class TaskProgressBeanObject
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
     * The URL of the task.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the task.
     *
     * @var string
     */
    protected $id;
    /**
     * The description of the task.
     *
     * @var string
     */
    protected $description;
    /**
     * The status of the task.
     *
     * @var string
     */
    protected $status;
    /**
     * Information about the progress of the task.
     *
     * @var string
     */
    protected $message;
    /**
     * The result of the task execution.
     *
     * @var mixed
     */
    protected $result;
    /**
     * The ID of the user who submitted the task.
     *
     * @var int
     */
    protected $submittedBy;
    /**
     * The progress of the task, as a percentage complete.
     *
     * @var int
     */
    protected $progress;
    /**
     * The execution time of the task, in milliseconds.
     *
     * @var int
     */
    protected $elapsedRuntime;
    /**
     * A timestamp recording when the task was submitted.
     *
     * @var int
     */
    protected $submitted;
    /**
     * A timestamp recording when the task was started.
     *
     * @var int
     */
    protected $started;
    /**
     * A timestamp recording when the task was finished.
     *
     * @var int
     */
    protected $finished;
    /**
     * A timestamp recording when the task progress was last updated.
     *
     * @var int
     */
    protected $lastUpdate;
    /**
     * The URL of the task.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the task.
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * The ID of the task.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the task.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The description of the task.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the task.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * The status of the task.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
    /**
     * The status of the task.
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus(string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * Information about the progress of the task.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    /**
     * Information about the progress of the task.
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
    /**
     * The result of the task execution.
     *
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }
    /**
     * The result of the task execution.
     *
     * @param mixed $result
     *
     * @return self
     */
    public function setResult($result): self
    {
        $this->initialized['result'] = true;
        $this->result = $result;
        return $this;
    }
    /**
     * The ID of the user who submitted the task.
     *
     * @return int
     */
    public function getSubmittedBy(): int
    {
        return $this->submittedBy;
    }
    /**
     * The ID of the user who submitted the task.
     *
     * @param int $submittedBy
     *
     * @return self
     */
    public function setSubmittedBy(int $submittedBy): self
    {
        $this->initialized['submittedBy'] = true;
        $this->submittedBy = $submittedBy;
        return $this;
    }
    /**
     * The progress of the task, as a percentage complete.
     *
     * @return int
     */
    public function getProgress(): int
    {
        return $this->progress;
    }
    /**
     * The progress of the task, as a percentage complete.
     *
     * @param int $progress
     *
     * @return self
     */
    public function setProgress(int $progress): self
    {
        $this->initialized['progress'] = true;
        $this->progress = $progress;
        return $this;
    }
    /**
     * The execution time of the task, in milliseconds.
     *
     * @return int
     */
    public function getElapsedRuntime(): int
    {
        return $this->elapsedRuntime;
    }
    /**
     * The execution time of the task, in milliseconds.
     *
     * @param int $elapsedRuntime
     *
     * @return self
     */
    public function setElapsedRuntime(int $elapsedRuntime): self
    {
        $this->initialized['elapsedRuntime'] = true;
        $this->elapsedRuntime = $elapsedRuntime;
        return $this;
    }
    /**
     * A timestamp recording when the task was submitted.
     *
     * @return int
     */
    public function getSubmitted(): int
    {
        return $this->submitted;
    }
    /**
     * A timestamp recording when the task was submitted.
     *
     * @param int $submitted
     *
     * @return self
     */
    public function setSubmitted(int $submitted): self
    {
        $this->initialized['submitted'] = true;
        $this->submitted = $submitted;
        return $this;
    }
    /**
     * A timestamp recording when the task was started.
     *
     * @return int
     */
    public function getStarted(): int
    {
        return $this->started;
    }
    /**
     * A timestamp recording when the task was started.
     *
     * @param int $started
     *
     * @return self
     */
    public function setStarted(int $started): self
    {
        $this->initialized['started'] = true;
        $this->started = $started;
        return $this;
    }
    /**
     * A timestamp recording when the task was finished.
     *
     * @return int
     */
    public function getFinished(): int
    {
        return $this->finished;
    }
    /**
     * A timestamp recording when the task was finished.
     *
     * @param int $finished
     *
     * @return self
     */
    public function setFinished(int $finished): self
    {
        $this->initialized['finished'] = true;
        $this->finished = $finished;
        return $this;
    }
    /**
     * A timestamp recording when the task progress was last updated.
     *
     * @return int
     */
    public function getLastUpdate(): int
    {
        return $this->lastUpdate;
    }
    /**
     * A timestamp recording when the task progress was last updated.
     *
     * @param int $lastUpdate
     *
     * @return self
     */
    public function setLastUpdate(int $lastUpdate): self
    {
        $this->initialized['lastUpdate'] = true;
        $this->lastUpdate = $lastUpdate;
        return $this;
    }
}
