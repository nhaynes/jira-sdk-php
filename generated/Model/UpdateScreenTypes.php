<?php

namespace JiraSdk\Model;

class UpdateScreenTypes
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
    /**
     * The ID of the edit screen. To remove the screen association, pass a null.
     *
     * @return string
     */
    public function getEdit(): string
    {
        return $this->edit;
    }
    /**
     * The ID of the edit screen. To remove the screen association, pass a null.
     *
     * @param string $edit
     *
     * @return self
     */
    public function setEdit(string $edit): self
    {
        $this->initialized['edit'] = true;
        $this->edit = $edit;
        return $this;
    }
    /**
     * The ID of the create screen. To remove the screen association, pass a null.
     *
     * @return string
     */
    public function getCreate(): string
    {
        return $this->create;
    }
    /**
     * The ID of the create screen. To remove the screen association, pass a null.
     *
     * @param string $create
     *
     * @return self
     */
    public function setCreate(string $create): self
    {
        $this->initialized['create'] = true;
        $this->create = $create;
        return $this;
    }
    /**
     * The ID of the view screen. To remove the screen association, pass a null.
     *
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }
    /**
     * The ID of the view screen. To remove the screen association, pass a null.
     *
     * @param string $view
     *
     * @return self
     */
    public function setView(string $view): self
    {
        $this->initialized['view'] = true;
        $this->view = $view;
        return $this;
    }
    /**
     * The ID of the default screen. When specified, must include a screen ID as a default screen is required.
     *
     * @return string
     */
    public function getDefault(): string
    {
        return $this->default;
    }
    /**
     * The ID of the default screen. When specified, must include a screen ID as a default screen is required.
     *
     * @param string $default
     *
     * @return self
     */
    public function setDefault(string $default): self
    {
        $this->initialized['default'] = true;
        $this->default = $default;
        return $this;
    }
}
