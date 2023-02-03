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

class Transitions
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Expand options that include additional transitions details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * List of issue transitions.
     *
     * @var IssueTransition[]
     */
    protected $transitions;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Expand options that include additional transitions details in the response.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Expand options that include additional transitions details in the response.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }

    /**
     * List of issue transitions.
     *
     * @return IssueTransition[]
     */
    public function getTransitions(): array
    {
        return $this->transitions;
    }

    /**
     * List of issue transitions.
     *
     * @param IssueTransition[] $transitions
     */
    public function setTransitions(array $transitions): self
    {
        $this->initialized['transitions'] = true;
        $this->transitions = $transitions;

        return $this;
    }
}
