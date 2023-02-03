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

class AttachmentSettings
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Whether the ability to add attachments is enabled.
     *
     * @var bool
     */
    protected $enabled;
    /**
     * The maximum size of attachments permitted, in bytes.
     *
     * @var int
     */
    protected $uploadLimit;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Whether the ability to add attachments is enabled.
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * Whether the ability to add attachments is enabled.
     */
    public function setEnabled(bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * The maximum size of attachments permitted, in bytes.
     */
    public function getUploadLimit(): int
    {
        return $this->uploadLimit;
    }

    /**
     * The maximum size of attachments permitted, in bytes.
     */
    public function setUploadLimit(int $uploadLimit): self
    {
        $this->initialized['uploadLimit'] = true;
        $this->uploadLimit = $uploadLimit;

        return $this;
    }
}
