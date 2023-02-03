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

class FieldUpdateOperation
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setCopy($copy): self
    {
        $this->initialized['copy'] = true;
        $this->copy = $copy;

        return $this;
    }
}
