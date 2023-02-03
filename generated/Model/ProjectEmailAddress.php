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

class ProjectEmailAddress
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The email address.
     *
     * @var string
     */
    protected $emailAddress;
    /**
     * When using a custom domain, the status of the email address.
     *
     * @var string[]
     */
    protected $emailAddressStatus;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The email address.
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    /**
     * The email address.
     */
    public function setEmailAddress(string $emailAddress): self
    {
        $this->initialized['emailAddress'] = true;
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * When using a custom domain, the status of the email address.
     *
     * @return string[]
     */
    public function getEmailAddressStatus(): array
    {
        return $this->emailAddressStatus;
    }

    /**
     * When using a custom domain, the status of the email address.
     *
     * @param string[] $emailAddressStatus
     */
    public function setEmailAddressStatus(array $emailAddressStatus): self
    {
        $this->initialized['emailAddressStatus'] = true;
        $this->emailAddressStatus = $emailAddressStatus;

        return $this;
    }
}
