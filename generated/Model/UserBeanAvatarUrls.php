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

class UserBeanAvatarUrls
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the user's 16x16 pixel avatar.
     *
     * @var string
     */
    protected $n16x16;
    /**
     * The URL of the user's 24x24 pixel avatar.
     *
     * @var string
     */
    protected $n24x24;
    /**
     * The URL of the user's 32x32 pixel avatar.
     *
     * @var string
     */
    protected $n32x32;
    /**
     * The URL of the user's 48x48 pixel avatar.
     *
     * @var string
     */
    protected $n48x48;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the user's 16x16 pixel avatar.
     */
    public function get16x16(): string
    {
        return $this->n16x16;
    }

    /**
     * The URL of the user's 16x16 pixel avatar.
     */
    public function set16x16(string $n16x16): self
    {
        $this->initialized['n16x16'] = true;
        $this->n16x16 = $n16x16;

        return $this;
    }

    /**
     * The URL of the user's 24x24 pixel avatar.
     */
    public function get24x24(): string
    {
        return $this->n24x24;
    }

    /**
     * The URL of the user's 24x24 pixel avatar.
     */
    public function set24x24(string $n24x24): self
    {
        $this->initialized['n24x24'] = true;
        $this->n24x24 = $n24x24;

        return $this;
    }

    /**
     * The URL of the user's 32x32 pixel avatar.
     */
    public function get32x32(): string
    {
        return $this->n32x32;
    }

    /**
     * The URL of the user's 32x32 pixel avatar.
     */
    public function set32x32(string $n32x32): self
    {
        $this->initialized['n32x32'] = true;
        $this->n32x32 = $n32x32;

        return $this;
    }

    /**
     * The URL of the user's 48x48 pixel avatar.
     */
    public function get48x48(): string
    {
        return $this->n48x48;
    }

    /**
     * The URL of the user's 48x48 pixel avatar.
     */
    public function set48x48(string $n48x48): self
    {
        $this->initialized['n48x48'] = true;
        $this->n48x48 = $n48x48;

        return $this;
    }
}
