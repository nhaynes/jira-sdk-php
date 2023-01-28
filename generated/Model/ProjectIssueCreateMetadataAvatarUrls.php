<?php

namespace JiraSdk\Model;

class ProjectIssueCreateMetadataAvatarUrls extends \ArrayObject
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
     * The URL of the item's 16x16 pixel avatar.
     *
     * @var string
     */
    protected $n16x16;
    /**
     * The URL of the item's 24x24 pixel avatar.
     *
     * @var string
     */
    protected $n24x24;
    /**
     * The URL of the item's 32x32 pixel avatar.
     *
     * @var string
     */
    protected $n32x32;
    /**
     * The URL of the item's 48x48 pixel avatar.
     *
     * @var string
     */
    protected $n48x48;
    /**
     * The URL of the item's 16x16 pixel avatar.
     *
     * @return string
     */
    public function get16x16(): string
    {
        return $this->n16x16;
    }
    /**
     * The URL of the item's 16x16 pixel avatar.
     *
     * @param string $n16x16
     *
     * @return self
     */
    public function set16x16(string $n16x16): self
    {
        $this->initialized['n16x16'] = true;
        $this->n16x16 = $n16x16;
        return $this;
    }
    /**
     * The URL of the item's 24x24 pixel avatar.
     *
     * @return string
     */
    public function get24x24(): string
    {
        return $this->n24x24;
    }
    /**
     * The URL of the item's 24x24 pixel avatar.
     *
     * @param string $n24x24
     *
     * @return self
     */
    public function set24x24(string $n24x24): self
    {
        $this->initialized['n24x24'] = true;
        $this->n24x24 = $n24x24;
        return $this;
    }
    /**
     * The URL of the item's 32x32 pixel avatar.
     *
     * @return string
     */
    public function get32x32(): string
    {
        return $this->n32x32;
    }
    /**
     * The URL of the item's 32x32 pixel avatar.
     *
     * @param string $n32x32
     *
     * @return self
     */
    public function set32x32(string $n32x32): self
    {
        $this->initialized['n32x32'] = true;
        $this->n32x32 = $n32x32;
        return $this;
    }
    /**
     * The URL of the item's 48x48 pixel avatar.
     *
     * @return string
     */
    public function get48x48(): string
    {
        return $this->n48x48;
    }
    /**
     * The URL of the item's 48x48 pixel avatar.
     *
     * @param string $n48x48
     *
     * @return self
     */
    public function set48x48(string $n48x48): self
    {
        $this->initialized['n48x48'] = true;
        $this->n48x48 = $n48x48;
        return $this;
    }
}
