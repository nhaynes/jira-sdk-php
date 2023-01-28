<?php

namespace JiraSdk\Model;

class AvailableDashboardGadgetsResponse
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
     * The list of available gadgets.
     *
     * @var AvailableDashboardGadget[]
     */
    protected $gadgets;
    /**
     * The list of available gadgets.
     *
     * @return AvailableDashboardGadget[]
     */
    public function getGadgets(): array
    {
        return $this->gadgets;
    }
    /**
     * The list of available gadgets.
     *
     * @param AvailableDashboardGadget[] $gadgets
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
