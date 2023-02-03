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

class AnnouncementBannerConfiguration
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The text on the announcement banner.
     *
     * @var string
     */
    protected $message;
    /**
     * Flag indicating if the announcement banner can be dismissed by the user.
     *
     * @var bool
     */
    protected $isDismissible;
    /**
     * Flag indicating if the announcement banner is enabled or not.
     *
     * @var bool
     */
    protected $isEnabled;
    /**
     * Hash of the banner data. The client detects updates by comparing hash IDs.
     *
     * @var string
     */
    protected $hashId;
    /**
     * Visibility of the announcement banner.
     *
     * @var string
     */
    protected $visibility;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The text on the announcement banner.
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * The text on the announcement banner.
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;

        return $this;
    }

    /**
     * Flag indicating if the announcement banner can be dismissed by the user.
     */
    public function getIsDismissible(): bool
    {
        return $this->isDismissible;
    }

    /**
     * Flag indicating if the announcement banner can be dismissed by the user.
     */
    public function setIsDismissible(bool $isDismissible): self
    {
        $this->initialized['isDismissible'] = true;
        $this->isDismissible = $isDismissible;

        return $this;
    }

    /**
     * Flag indicating if the announcement banner is enabled or not.
     */
    public function getIsEnabled(): bool
    {
        return $this->isEnabled;
    }

    /**
     * Flag indicating if the announcement banner is enabled or not.
     */
    public function setIsEnabled(bool $isEnabled): self
    {
        $this->initialized['isEnabled'] = true;
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * Hash of the banner data. The client detects updates by comparing hash IDs.
     */
    public function getHashId(): string
    {
        return $this->hashId;
    }

    /**
     * Hash of the banner data. The client detects updates by comparing hash IDs.
     */
    public function setHashId(string $hashId): self
    {
        $this->initialized['hashId'] = true;
        $this->hashId = $hashId;

        return $this;
    }

    /**
     * Visibility of the announcement banner.
     */
    public function getVisibility(): string
    {
        return $this->visibility;
    }

    /**
     * Visibility of the announcement banner.
     */
    public function setVisibility(string $visibility): self
    {
        $this->initialized['visibility'] = true;
        $this->visibility = $visibility;

        return $this;
    }
}
