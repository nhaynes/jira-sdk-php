<?php

namespace JiraSdk\Model;

class WebhooksExpirationDate
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
     * The expiration date of all the refreshed webhooks.
     *
     * @var int
     */
    protected $expirationDate;
    /**
     * The expiration date of all the refreshed webhooks.
     *
     * @return int
     */
    public function getExpirationDate(): int
    {
        return $this->expirationDate;
    }
    /**
     * The expiration date of all the refreshed webhooks.
     *
     * @param int $expirationDate
     *
     * @return self
     */
    public function setExpirationDate(int $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;
        return $this;
    }
}
