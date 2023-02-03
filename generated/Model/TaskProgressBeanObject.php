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

class TaskProgressBeanObject
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the task.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the task.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The ID of the task.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the task.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The description of the task.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the task.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The status of the task.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * The status of the task.
     */
    public function setStatus(string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Information about the progress of the task.
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Information about the progress of the task.
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
     */
    public function setResult($result): self
    {
        $this->initialized['result'] = true;
        $this->result = $result;

        return $this;
    }

    /**
     * The ID of the user who submitted the task.
     */
    public function getSubmittedBy(): int
    {
        return $this->submittedBy;
    }

    /**
     * The ID of the user who submitted the task.
     */
    public function setSubmittedBy(int $submittedBy): self
    {
        $this->initialized['submittedBy'] = true;
        $this->submittedBy = $submittedBy;

        return $this;
    }

    /**
     * The progress of the task, as a percentage complete.
     */
    public function getProgress(): int
    {
        return $this->progress;
    }

    /**
     * The progress of the task, as a percentage complete.
     */
    public function setProgress(int $progress): self
    {
        $this->initialized['progress'] = true;
        $this->progress = $progress;

        return $this;
    }

    /**
     * The execution time of the task, in milliseconds.
     */
    public function getElapsedRuntime(): int
    {
        return $this->elapsedRuntime;
    }

    /**
     * The execution time of the task, in milliseconds.
     */
    public function setElapsedRuntime(int $elapsedRuntime): self
    {
        $this->initialized['elapsedRuntime'] = true;
        $this->elapsedRuntime = $elapsedRuntime;

        return $this;
    }

    /**
     * A timestamp recording when the task was submitted.
     */
    public function getSubmitted(): int
    {
        return $this->submitted;
    }

    /**
     * A timestamp recording when the task was submitted.
     */
    public function setSubmitted(int $submitted): self
    {
        $this->initialized['submitted'] = true;
        $this->submitted = $submitted;

        return $this;
    }

    /**
     * A timestamp recording when the task was started.
     */
    public function getStarted(): int
    {
        return $this->started;
    }

    /**
     * A timestamp recording when the task was started.
     */
    public function setStarted(int $started): self
    {
        $this->initialized['started'] = true;
        $this->started = $started;

        return $this;
    }

    /**
     * A timestamp recording when the task was finished.
     */
    public function getFinished(): int
    {
        return $this->finished;
    }

    /**
     * A timestamp recording when the task was finished.
     */
    public function setFinished(int $finished): self
    {
        $this->initialized['finished'] = true;
        $this->finished = $finished;

        return $this;
    }

    /**
     * A timestamp recording when the task progress was last updated.
     */
    public function getLastUpdate(): int
    {
        return $this->lastUpdate;
    }

    /**
     * A timestamp recording when the task progress was last updated.
     */
    public function setLastUpdate(int $lastUpdate): self
    {
        $this->initialized['lastUpdate'] = true;
        $this->lastUpdate = $lastUpdate;

        return $this;
    }
}
