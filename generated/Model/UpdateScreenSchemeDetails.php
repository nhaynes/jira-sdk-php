<?php

namespace JiraSdk\Model;

class UpdateScreenSchemeDetails
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
     * The name of the screen scheme. The name must be unique. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the screen scheme. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $description;
    /**
     * The IDs of the screens for the screen types of the screen scheme. Only screens used in classic projects are accepted.
     *
     * @var UpdateScreenSchemeDetailsScreens
     */
    protected $screens;
    /**
     * The name of the screen scheme. The name must be unique. The maximum length is 255 characters.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the screen scheme. The name must be unique. The maximum length is 255 characters.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The description of the screen scheme. The maximum length is 255 characters.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the screen scheme. The maximum length is 255 characters.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * The IDs of the screens for the screen types of the screen scheme. Only screens used in classic projects are accepted.
     *
     * @return UpdateScreenSchemeDetailsScreens
     */
    public function getScreens(): UpdateScreenSchemeDetailsScreens
    {
        return $this->screens;
    }
    /**
     * The IDs of the screens for the screen types of the screen scheme. Only screens used in classic projects are accepted.
     *
     * @param UpdateScreenSchemeDetailsScreens $screens
     *
     * @return self
     */
    public function setScreens(UpdateScreenSchemeDetailsScreens $screens): self
    {
        $this->initialized['screens'] = true;
        $this->screens = $screens;
        return $this;
    }
}
