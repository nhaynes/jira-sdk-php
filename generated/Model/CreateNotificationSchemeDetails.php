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

class CreateNotificationSchemeDetails extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The name of the notification scheme. Must be unique (case-insensitive).
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the notification scheme.
     *
     * @var string
     */
    protected $description;
    /**
     * The list of notifications which should be added to the notification scheme.
     *
     * @var NotificationSchemeEventDetails[]
     */
    protected $notificationSchemeEvents;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the notification scheme. Must be unique (case-insensitive).
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the notification scheme. Must be unique (case-insensitive).
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the notification scheme.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the notification scheme.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The list of notifications which should be added to the notification scheme.
     *
     * @return NotificationSchemeEventDetails[]
     */
    public function getNotificationSchemeEvents(): array
    {
        return $this->notificationSchemeEvents;
    }

    /**
     * The list of notifications which should be added to the notification scheme.
     *
     * @param NotificationSchemeEventDetails[] $notificationSchemeEvents
     */
    public function setNotificationSchemeEvents(array $notificationSchemeEvents): self
    {
        $this->initialized['notificationSchemeEvents'] = true;
        $this->notificationSchemeEvents = $notificationSchemeEvents;

        return $this;
    }
}
