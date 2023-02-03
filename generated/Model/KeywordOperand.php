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

class KeywordOperand extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The keyword that is the operand value.
     *
     * @var string
     */
    protected $keyword;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The keyword that is the operand value.
     */
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * The keyword that is the operand value.
     */
    public function setKeyword(string $keyword): self
    {
        $this->initialized['keyword'] = true;
        $this->keyword = $keyword;

        return $this;
    }
}
