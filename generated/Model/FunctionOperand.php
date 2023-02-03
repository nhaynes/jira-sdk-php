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

class FunctionOperand extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the function.
     */
    public function getFunction(): string
    {
        return $this->function;
    }

    /**
     * The name of the function.
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
     */
    public function setArguments(array $arguments): self
    {
        $this->initialized['arguments'] = true;
        $this->arguments = $arguments;

        return $this;
    }
}
