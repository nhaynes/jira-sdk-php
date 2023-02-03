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

class DashboardGadgetUpdateRequestPosition extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var int
     */
    protected $theRowPositionOfTheGadget;
    /**
     * @var int
     */
    protected $theColumnPositionOfTheGadget;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getTheRowPositionOfTheGadget(): int
    {
        return $this->theRowPositionOfTheGadget;
    }

    public function setTheRowPositionOfTheGadget(int $theRowPositionOfTheGadget): self
    {
        $this->initialized['theRowPositionOfTheGadget'] = true;
        $this->theRowPositionOfTheGadget = $theRowPositionOfTheGadget;

        return $this;
    }

    public function getTheColumnPositionOfTheGadget(): int
    {
        return $this->theColumnPositionOfTheGadget;
    }

    public function setTheColumnPositionOfTheGadget(int $theColumnPositionOfTheGadget): self
    {
        $this->initialized['theColumnPositionOfTheGadget'] = true;
        $this->theColumnPositionOfTheGadget = $theColumnPositionOfTheGadget;

        return $this;
    }
}
