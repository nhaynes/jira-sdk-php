<?php

namespace JiraSdk\Model;

class ScreenSchemeScreens extends \ArrayObject
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
    /**
     * The ID of the edit screen.
     *
     * @return int
     */
    public function getEdit(): int
    {
        return $this->edit;
    }
    /**
     * The ID of the edit screen.
     *
     * @param int $edit
     *
     * @return self
     */
    public function setEdit(int $edit): self
    {
        $this->initialized['edit'] = true;
        $this->edit = $edit;
        return $this;
    }
    /**
     * The ID of the create screen.
     *
     * @return int
     */
    public function getCreate(): int
    {
        return $this->create;
    }
    /**
     * The ID of the create screen.
     *
     * @param int $create
     *
     * @return self
     */
    public function setCreate(int $create): self
    {
        $this->initialized['create'] = true;
        $this->create = $create;
        return $this;
    }
    /**
     * The ID of the view screen.
     *
     * @return int
     */
    public function getView(): int
    {
        return $this->view;
    }
    /**
     * The ID of the view screen.
     *
     * @param int $view
     *
     * @return self
     */
    public function setView(int $view): self
    {
        $this->initialized['view'] = true;
        $this->view = $view;
        return $this;
    }
    /**
     * The ID of the default screen. Required when creating a screen scheme.
     *
     * @return int
     */
    public function getDefault(): int
    {
        return $this->default;
    }
    /**
     * The ID of the default screen. Required when creating a screen scheme.
     *
     * @param int $default
     *
     * @return self
     */
    public function setDefault(int $default): self
    {
        $this->initialized['default'] = true;
        $this->default = $default;
        return $this;
    }
}
