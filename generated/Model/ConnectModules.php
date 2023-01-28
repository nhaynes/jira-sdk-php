<?php

namespace JiraSdk\Model;

class ConnectModules extends \ArrayObject
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
    * A list of app modules in the same format as the `modules` property in the
    [app descriptor](https://developer.atlassian.com/cloud/jira/platform/app-descriptor/).
    *
    * @var mixed[][]
    */
    protected $modules;
    /**
    * A list of app modules in the same format as the `modules` property in the
    [app descriptor](https://developer.atlassian.com/cloud/jira/platform/app-descriptor/).
    *
    * @return mixed[][]
    */
    public function getModules(): array
    {
        return $this->modules;
    }
    /**
    * A list of app modules in the same format as the `modules` property in the
    [app descriptor](https://developer.atlassian.com/cloud/jira/platform/app-descriptor/).
    *
    * @param mixed[][] $modules
    *
    * @return self
    */
    public function setModules(array $modules): self
    {
        $this->initialized['modules'] = true;
        $this->modules = $modules;
        return $this;
    }
}
