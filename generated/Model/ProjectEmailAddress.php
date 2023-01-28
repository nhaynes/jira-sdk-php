<?php

namespace JiraSdk\Model;

class ProjectEmailAddress
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
    /**
     * The email address.
     *
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }
    /**
     * The email address.
     *
     * @param string $emailAddress
     *
     * @return self
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
     *
     * @return self
     */
    public function setEmailAddressStatus(array $emailAddressStatus): self
    {
        $this->initialized['emailAddressStatus'] = true;
        $this->emailAddressStatus = $emailAddressStatus;
        return $this;
    }
}
