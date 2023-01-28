<?php

namespace JiraSdk\Model;

class AnnouncementBannerConfigurationUpdate
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
     * Visibility of the announcement banner. Can be public or private.
     *
     * @var string
     */
    protected $visibility;
    /**
     * The text on the announcement banner.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    /**
     * The text on the announcement banner.
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
    /**
     * Flag indicating if the announcement banner can be dismissed by the user.
     *
     * @return bool
     */
    public function getIsDismissible(): bool
    {
        return $this->isDismissible;
    }
    /**
     * Flag indicating if the announcement banner can be dismissed by the user.
     *
     * @param bool $isDismissible
     *
     * @return self
     */
    public function setIsDismissible(bool $isDismissible): self
    {
        $this->initialized['isDismissible'] = true;
        $this->isDismissible = $isDismissible;
        return $this;
    }
    /**
     * Flag indicating if the announcement banner is enabled or not.
     *
     * @return bool
     */
    public function getIsEnabled(): bool
    {
        return $this->isEnabled;
    }
    /**
     * Flag indicating if the announcement banner is enabled or not.
     *
     * @param bool $isEnabled
     *
     * @return self
     */
    public function setIsEnabled(bool $isEnabled): self
    {
        $this->initialized['isEnabled'] = true;
        $this->isEnabled = $isEnabled;
        return $this;
    }
    /**
     * Visibility of the announcement banner. Can be public or private.
     *
     * @return string
     */
    public function getVisibility(): string
    {
        return $this->visibility;
    }
    /**
     * Visibility of the announcement banner. Can be public or private.
     *
     * @param string $visibility
     *
     * @return self
     */
    public function setVisibility(string $visibility): self
    {
        $this->initialized['visibility'] = true;
        $this->visibility = $visibility;
        return $this;
    }
}
