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

class NotificationSchemeNotificationDetails extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The notification type, e.g `CurrentAssignee`, `Group`, `EmailAddress`.
     *
     * @var string
     */
    protected $notificationType;
    /**
     * The value corresponding to the specified notification type.
     *
     * @var string
     */
    protected $parameter;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The notification type, e.g `CurrentAssignee`, `Group`, `EmailAddress`.
     */
    public function getNotificationType(): string
    {
        return $this->notificationType;
    }

    /**
     * The notification type, e.g `CurrentAssignee`, `Group`, `EmailAddress`.
     */
    public function setNotificationType(string $notificationType): self
    {
        $this->initialized['notificationType'] = true;
        $this->notificationType = $notificationType;

        return $this;
    }

    /**
     * The value corresponding to the specified notification type.
     */
    public function getParameter(): string
    {
        return $this->parameter;
    }

    /**
     * The value corresponding to the specified notification type.
     */
    public function setParameter(string $parameter): self
    {
        $this->initialized['parameter'] = true;
        $this->parameter = $parameter;

        return $this;
    }
}
