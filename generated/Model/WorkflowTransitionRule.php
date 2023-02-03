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

class WorkflowTransitionRule
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The type of the transition rule.
     *
     * @var string
     */
    protected $type;
    /**
     * EXPERIMENTAL. The configuration of the transition rule.
     *
     * @var mixed
     */
    protected $configuration;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The type of the transition rule.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of the transition rule.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * EXPERIMENTAL. The configuration of the transition rule.
     *
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * EXPERIMENTAL. The configuration of the transition rule.
     *
     * @param mixed $configuration
     */
    public function setConfiguration($configuration): self
    {
        $this->initialized['configuration'] = true;
        $this->configuration = $configuration;

        return $this;
    }
}
