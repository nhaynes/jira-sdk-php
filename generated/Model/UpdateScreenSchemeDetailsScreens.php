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

class UpdateScreenSchemeDetailsScreens extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the edit screen. To remove the screen association, pass a null.
     *
     * @var string
     */
    protected $edit;
    /**
     * The ID of the create screen. To remove the screen association, pass a null.
     *
     * @var string
     */
    protected $create;
    /**
     * The ID of the view screen. To remove the screen association, pass a null.
     *
     * @var string
     */
    protected $view;
    /**
     * The ID of the default screen. When specified, must include a screen ID as a default screen is required.
     *
     * @var string
     */
    protected $default;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the edit screen. To remove the screen association, pass a null.
     */
    public function getEdit(): string
    {
        return $this->edit;
    }

    /**
     * The ID of the edit screen. To remove the screen association, pass a null.
     */
    public function setEdit(string $edit): self
    {
        $this->initialized['edit'] = true;
        $this->edit = $edit;

        return $this;
    }

    /**
     * The ID of the create screen. To remove the screen association, pass a null.
     */
    public function getCreate(): string
    {
        return $this->create;
    }

    /**
     * The ID of the create screen. To remove the screen association, pass a null.
     */
    public function setCreate(string $create): self
    {
        $this->initialized['create'] = true;
        $this->create = $create;

        return $this;
    }

    /**
     * The ID of the view screen. To remove the screen association, pass a null.
     */
    public function getView(): string
    {
        return $this->view;
    }

    /**
     * The ID of the view screen. To remove the screen association, pass a null.
     */
    public function setView(string $view): self
    {
        $this->initialized['view'] = true;
        $this->view = $view;

        return $this;
    }

    /**
     * The ID of the default screen. When specified, must include a screen ID as a default screen is required.
     */
    public function getDefault(): string
    {
        return $this->default;
    }

    /**
     * The ID of the default screen. When specified, must include a screen ID as a default screen is required.
     */
    public function setDefault(string $default): self
    {
        $this->initialized['default'] = true;
        $this->default = $default;

        return $this;
    }
}
