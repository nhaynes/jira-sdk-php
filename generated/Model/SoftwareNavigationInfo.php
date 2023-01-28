<?php

namespace JiraSdk\Model;

class SoftwareNavigationInfo extends \ArrayObject
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
     *
     *
     * @var int
     */
    protected $boardId;
    /**
     *
     *
     * @var string
     */
    protected $boardName;
    /**
     *
     *
     * @var int
     */
    protected $totalBoardsInProject;
    /**
     *
     *
     * @var bool
     */
    protected $simpleBoard;
    /**
     *
     *
     * @return int
     */
    public function getBoardId(): int
    {
        return $this->boardId;
    }
    /**
     *
     *
     * @param int $boardId
     *
     * @return self
     */
    public function setBoardId(int $boardId): self
    {
        $this->initialized['boardId'] = true;
        $this->boardId = $boardId;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getBoardName(): string
    {
        return $this->boardName;
    }
    /**
     *
     *
     * @param string $boardName
     *
     * @return self
     */
    public function setBoardName(string $boardName): self
    {
        $this->initialized['boardName'] = true;
        $this->boardName = $boardName;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getTotalBoardsInProject(): int
    {
        return $this->totalBoardsInProject;
    }
    /**
     *
     *
     * @param int $totalBoardsInProject
     *
     * @return self
     */
    public function setTotalBoardsInProject(int $totalBoardsInProject): self
    {
        $this->initialized['totalBoardsInProject'] = true;
        $this->totalBoardsInProject = $totalBoardsInProject;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getSimpleBoard(): bool
    {
        return $this->simpleBoard;
    }
    /**
     *
     *
     * @param bool $simpleBoard
     *
     * @return self
     */
    public function setSimpleBoard(bool $simpleBoard): self
    {
        $this->initialized['simpleBoard'] = true;
        $this->simpleBoard = $simpleBoard;
        return $this;
    }
}
