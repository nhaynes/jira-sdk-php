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

class LicensedApplication
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the application.
     *
     * @var string
     */
    protected $id;
    /**
     * The licensing plan.
     *
     * @var string
     */
    protected $plan;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the application.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the application.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The licensing plan.
     */
    public function getPlan(): string
    {
        return $this->plan;
    }

    /**
     * The licensing plan.
     */
    public function setPlan(string $plan): self
    {
        $this->initialized['plan'] = true;
        $this->plan = $plan;

        return $this;
    }
}
