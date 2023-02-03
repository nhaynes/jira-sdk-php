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

class GroupLabel
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The group label name.
     *
     * @var string
     */
    protected $text;
    /**
     * The title of the group label.
     *
     * @var string
     */
    protected $title;
    /**
     * The type of the group label.
     *
     * @var string
     */
    protected $type;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The group label name.
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * The group label name.
     */
    public function setText(string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;

        return $this;
    }

    /**
     * The title of the group label.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * The title of the group label.
     */
    public function setTitle(string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

    /**
     * The type of the group label.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of the group label.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }
}
