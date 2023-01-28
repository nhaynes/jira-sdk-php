<?php

namespace JiraSdk\Model;

class LicensedApplication
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
    /**
     * The ID of the application.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the application.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The licensing plan.
     *
     * @return string
     */
    public function getPlan(): string
    {
        return $this->plan;
    }
    /**
     * The licensing plan.
     *
     * @param string $plan
     *
     * @return self
     */
    public function setPlan(string $plan): self
    {
        $this->initialized['plan'] = true;
        $this->plan = $plan;
        return $this;
    }
}
