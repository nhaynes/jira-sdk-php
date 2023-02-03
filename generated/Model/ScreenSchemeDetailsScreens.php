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

class ScreenSchemeDetailsScreens extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the edit screen.
     *
     * @var int
     */
    protected $edit;
    /**
     * The ID of the create screen.
     *
     * @var int
     */
    protected $create;
    /**
     * The ID of the view screen.
     *
     * @var int
     */
    protected $view;
    /**
     * The ID of the default screen. Required when creating a screen scheme.
     *
     * @var int
     */
    protected $default;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the edit screen.
     */
    public function getEdit(): int
    {
        return $this->edit;
    }

    /**
     * The ID of the edit screen.
     */
    public function setEdit(int $edit): self
    {
        $this->initialized['edit'] = true;
        $this->edit = $edit;

        return $this;
    }

    /**
     * The ID of the create screen.
     */
    public function getCreate(): int
    {
        return $this->create;
    }

    /**
     * The ID of the create screen.
     */
    public function setCreate(int $create): self
    {
        $this->initialized['create'] = true;
        $this->create = $create;

        return $this;
    }

    /**
     * The ID of the view screen.
     */
    public function getView(): int
    {
        return $this->view;
    }

    /**
     * The ID of the view screen.
     */
    public function setView(int $view): self
    {
        $this->initialized['view'] = true;
        $this->view = $view;

        return $this;
    }

    /**
     * The ID of the default screen. Required when creating a screen scheme.
     */
    public function getDefault(): int
    {
        return $this->default;
    }

    /**
     * The ID of the default screen. Required when creating a screen scheme.
     */
    public function setDefault(int $default): self
    {
        $this->initialized['default'] = true;
        $this->default = $default;

        return $this;
    }
}
