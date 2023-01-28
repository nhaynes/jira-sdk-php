<?php

namespace JiraSdk\Model;

class DashboardGadgetPosition
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
     *
     *
     * @var int
     */
    protected $theRowPositionOfTheGadget;
    /**
     *
     *
     * @var int
     */
    protected $theColumnPositionOfTheGadget;
    /**
     *
     *
     * @return int
     */
    public function getTheRowPositionOfTheGadget(): int
    {
        return $this->theRowPositionOfTheGadget;
    }
    /**
     *
     *
     * @param int $theRowPositionOfTheGadget
     *
     * @return self
     */
    public function setTheRowPositionOfTheGadget(int $theRowPositionOfTheGadget): self
    {
        $this->initialized['theRowPositionOfTheGadget'] = true;
        $this->theRowPositionOfTheGadget = $theRowPositionOfTheGadget;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getTheColumnPositionOfTheGadget(): int
    {
        return $this->theColumnPositionOfTheGadget;
    }
    /**
     *
     *
     * @param int $theColumnPositionOfTheGadget
     *
     * @return self
     */
    public function setTheColumnPositionOfTheGadget(int $theColumnPositionOfTheGadget): self
    {
        $this->initialized['theColumnPositionOfTheGadget'] = true;
        $this->theColumnPositionOfTheGadget = $theColumnPositionOfTheGadget;
        return $this;
    }
}
