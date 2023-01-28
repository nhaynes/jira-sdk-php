<?php

namespace JiraSdk\Model;

class DashboardGadgetResponse
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
     * The list of gadgets.
     *
     * @var DashboardGadget[]
     */
    protected $gadgets;
    /**
     * The list of gadgets.
     *
     * @return DashboardGadget[]
     */
    public function getGadgets(): array
    {
        return $this->gadgets;
    }
    /**
     * The list of gadgets.
     *
     * @param DashboardGadget[] $gadgets
     *
     * @return self
     */
    public function setGadgets(array $gadgets): self
    {
        $this->initialized['gadgets'] = true;
        $this->gadgets = $gadgets;
        return $this;
    }
}
