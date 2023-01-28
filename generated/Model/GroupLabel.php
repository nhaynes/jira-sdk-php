<?php

namespace JiraSdk\Model;

class GroupLabel
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
    /**
     * The group label name.
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
    /**
     * The group label name.
     *
     * @param string $text
     *
     * @return self
     */
    public function setText(string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * The title of the group label.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * The title of the group label.
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * The type of the group label.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The type of the group label.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
