<?php

namespace JiraSdk\Model;

class License
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
     * The applications under this license.
     *
     * @var LicensedApplication[]
     */
    protected $applications;
    /**
     * The applications under this license.
     *
     * @return LicensedApplication[]
     */
    public function getApplications(): array
    {
        return $this->applications;
    }
    /**
     * The applications under this license.
     *
     * @param LicensedApplication[] $applications
     *
     * @return self
     */
    public function setApplications(array $applications): self
    {
        $this->initialized['applications'] = true;
        $this->applications = $applications;
        return $this;
    }
}
