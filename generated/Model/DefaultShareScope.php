<?php

namespace JiraSdk\Model;

class DefaultShareScope
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
     * The scope of the default sharing for new filters and dashboards:
     *  `AUTHENTICATED` Shared with all logged-in users.
     *  `GLOBAL` Shared with all logged-in users. This shows as `AUTHENTICATED` in the response.
     *  `PRIVATE` Not shared with any users.
     *
     * @var string
     */
    protected $scope;
    /**
     * The scope of the default sharing for new filters and dashboards:
     *  `AUTHENTICATED` Shared with all logged-in users.
     *  `GLOBAL` Shared with all logged-in users. This shows as `AUTHENTICATED` in the response.
     *  `PRIVATE` Not shared with any users.
     *
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope;
    }
    /**
     * The scope of the default sharing for new filters and dashboards:
     *  `AUTHENTICATED` Shared with all logged-in users.
     *  `GLOBAL` Shared with all logged-in users. This shows as `AUTHENTICATED` in the response.
     *  `PRIVATE` Not shared with any users.
     *
     * @param string $scope
     *
     * @return self
     */
    public function setScope(string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
}
