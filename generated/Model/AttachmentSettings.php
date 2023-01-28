<?php

namespace JiraSdk\Model;

class AttachmentSettings
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
    /**
     * Whether the ability to add attachments is enabled.
     *
     * @return bool
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }
    /**
     * Whether the ability to add attachments is enabled.
     *
     * @param bool $enabled
     *
     * @return self
     */
    public function setEnabled(bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;
        return $this;
    }
    /**
     * The maximum size of attachments permitted, in bytes.
     *
     * @return int
     */
    public function getUploadLimit(): int
    {
        return $this->uploadLimit;
    }
    /**
     * The maximum size of attachments permitted, in bytes.
     *
     * @param int $uploadLimit
     *
     * @return self
     */
    public function setUploadLimit(int $uploadLimit): self
    {
        $this->initialized['uploadLimit'] = true;
        $this->uploadLimit = $uploadLimit;
        return $this;
    }
}
