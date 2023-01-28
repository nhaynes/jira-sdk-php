<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueTextField extends \ArrayObject
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
     * The default text. The maximum length is 254 characters.
     *
     * @var string
     */
    protected $text;
    /**
     *
     *
     * @var string
     */
    protected $type;
    /**
     * The default text. The maximum length is 254 characters.
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
    /**
     * The default text. The maximum length is 254 characters.
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
     *
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     *
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
