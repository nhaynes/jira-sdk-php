<?php

namespace JiraSdk\Model;

class KeywordOperand extends \ArrayObject
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
     * The keyword that is the operand value.
     *
     * @var string
     */
    protected $keyword;
    /**
     * The keyword that is the operand value.
     *
     * @return string
     */
    public function getKeyword(): string
    {
        return $this->keyword;
    }
    /**
     * The keyword that is the operand value.
     *
     * @param string $keyword
     *
     * @return self
     */
    public function setKeyword(string $keyword): self
    {
        $this->initialized['keyword'] = true;
        $this->keyword = $keyword;
        return $this;
    }
}
