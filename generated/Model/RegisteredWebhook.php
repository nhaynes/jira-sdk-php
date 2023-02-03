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

class RegisteredWebhook
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the webhook. Returned if the webhook is created.
     */
    public function getCreatedWebhookId(): int
    {
        return $this->createdWebhookId;
    }

    /**
     * The ID of the webhook. Returned if the webhook is created.
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
     */
    public function setErrors(array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;

        return $this;
    }
}
