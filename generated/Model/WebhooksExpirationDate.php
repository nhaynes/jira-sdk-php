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

class WebhooksExpirationDate
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The expiration date of all the refreshed webhooks.
     *
     * @var int
     */
    protected $expirationDate;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The expiration date of all the refreshed webhooks.
     */
    public function getExpirationDate(): int
    {
        return $this->expirationDate;
    }

    /**
     * The expiration date of all the refreshed webhooks.
     */
    public function setExpirationDate(int $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;

        return $this;
    }
}
