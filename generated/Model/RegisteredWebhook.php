<?php

namespace JiraSdk\Model;

class RegisteredWebhook
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
     * The ID of the webhook. Returned if the webhook is created.
     *
     * @var int
     */
    protected $createdWebhookId;
    /**
     * Error messages specifying why the webhook creation failed.
     *
     * @var string[]
     */
    protected $errors;
    /**
     * The ID of the webhook. Returned if the webhook is created.
     *
     * @return int
     */
    public function getCreatedWebhookId(): int
    {
        return $this->createdWebhookId;
    }
    /**
     * The ID of the webhook. Returned if the webhook is created.
     *
     * @param int $createdWebhookId
     *
     * @return self
     */
    public function setCreatedWebhookId(int $createdWebhookId): self
    {
        $this->initialized['createdWebhookId'] = true;
        $this->createdWebhookId = $createdWebhookId;
        return $this;
    }
    /**
     * Error messages specifying why the webhook creation failed.
     *
     * @return string[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    /**
     * Error messages specifying why the webhook creation failed.
     *
     * @param string[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
}
