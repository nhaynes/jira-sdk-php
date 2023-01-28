<?php

namespace JiraSdk\Model;

class FunctionOperand extends \ArrayObject
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
     * The name of the function.
     *
     * @var string
     */
    protected $function;
    /**
     * The list of function arguments.
     *
     * @var string[]
     */
    protected $arguments;
    /**
     * The name of the function.
     *
     * @return string
     */
    public function getFunction(): string
    {
        return $this->function;
    }
    /**
     * The name of the function.
     *
     * @param string $function
     *
     * @return self
     */
    public function setFunction(string $function): self
    {
        $this->initialized['function'] = true;
        $this->function = $function;
        return $this;
    }
    /**
     * The list of function arguments.
     *
     * @return string[]
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }
    /**
     * The list of function arguments.
     *
     * @param string[] $arguments
     *
     * @return self
     */
    public function setArguments(array $arguments): self
    {
        $this->initialized['arguments'] = true;
        $this->arguments = $arguments;
        return $this;
    }
}
