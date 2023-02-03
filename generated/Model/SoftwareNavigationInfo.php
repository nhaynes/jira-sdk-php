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

class SoftwareNavigationInfo extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var int
     */
    protected $boardId;
    /**
     * @var string
     */
    protected $boardName;
    /**
     * @var int
     */
    protected $totalBoardsInProject;
    /**
     * @var bool
     */
    protected $simpleBoard;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getBoardId(): int
    {
        return $this->boardId;
    }

    public function setBoardId(int $boardId): self
    {
        $this->initialized['boardId'] = true;
        $this->boardId = $boardId;

        return $this;
    }

    public function getBoardName(): string
    {
        return $this->boardName;
    }

    public function setBoardName(string $boardName): self
    {
        $this->initialized['boardName'] = true;
        $this->boardName = $boardName;

        return $this;
    }

    public function getTotalBoardsInProject(): int
    {
        return $this->totalBoardsInProject;
    }

    public function setTotalBoardsInProject(int $totalBoardsInProject): self
    {
        $this->initialized['totalBoardsInProject'] = true;
        $this->totalBoardsInProject = $totalBoardsInProject;

        return $this;
    }

    public function getSimpleBoard(): bool
    {
        return $this->simpleBoard;
    }

    public function setSimpleBoard(bool $simpleBoard): self
    {
        $this->initialized['simpleBoard'] = true;
        $this->simpleBoard = $simpleBoard;

        return $this;
    }
}
