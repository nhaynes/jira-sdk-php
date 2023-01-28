<?php

namespace JiraSdk\Model;

class FieldUpdateOperation
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
     * The value to add to the field.
     *
     * @var mixed
     */
    protected $add;
    /**
     * The value to set in the field.
     *
     * @var mixed
     */
    protected $set;
    /**
     * The value to removed from the field.
     *
     * @var mixed
     */
    protected $remove;
    /**
     * The value to edit in the field.
     *
     * @var mixed
     */
    protected $edit;
    /**
     * The field value to copy from another issue.
     *
     * @var mixed
     */
    protected $copy;
    /**
     * The value to add to the field.
     *
     * @return mixed
     */
    public function getAdd()
    {
        return $this->add;
    }
    /**
     * The value to add to the field.
     *
     * @param mixed $add
     *
     * @return self
     */
    public function setAdd($add): self
    {
        $this->initialized['add'] = true;
        $this->add = $add;
        return $this;
    }
    /**
     * The value to set in the field.
     *
     * @return mixed
     */
    public function getSet()
    {
        return $this->set;
    }
    /**
     * The value to set in the field.
     *
     * @param mixed $set
     *
     * @return self
     */
    public function setSet($set): self
    {
        $this->initialized['set'] = true;
        $this->set = $set;
        return $this;
    }
    /**
     * The value to removed from the field.
     *
     * @return mixed
     */
    public function getRemove()
    {
        return $this->remove;
    }
    /**
     * The value to removed from the field.
     *
     * @param mixed $remove
     *
     * @return self
     */
    public function setRemove($remove): self
    {
        $this->initialized['remove'] = true;
        $this->remove = $remove;
        return $this;
    }
    /**
     * The value to edit in the field.
     *
     * @return mixed
     */
    public function getEdit()
    {
        return $this->edit;
    }
    /**
     * The value to edit in the field.
     *
     * @param mixed $edit
     *
     * @return self
     */
    public function setEdit($edit): self
    {
        $this->initialized['edit'] = true;
        $this->edit = $edit;
        return $this;
    }
    /**
     * The field value to copy from another issue.
     *
     * @return mixed
     */
    public function getCopy()
    {
        return $this->copy;
    }
    /**
     * The field value to copy from another issue.
     *
     * @param mixed $copy
     *
     * @return self
     */
    public function setCopy($copy): self
    {
        $this->initialized['copy'] = true;
        $this->copy = $copy;
        return $this;
    }
}
