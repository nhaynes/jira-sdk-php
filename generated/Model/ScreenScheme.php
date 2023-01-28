<?php

namespace JiraSdk\Model;

class ScreenScheme
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
     * The ID of the screen scheme.
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the screen scheme.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the screen scheme.
     *
     * @var string
     */
    protected $description;
    /**
     * The IDs of the screens for the screen types of the screen scheme.
     *
     * @var ScreenSchemeScreens
     */
    protected $screens;
    /**
     * Details of the issue type screen schemes associated with the screen scheme.
     *
     * @var ScreenSchemeIssueTypeScreenSchemes
     */
    protected $issueTypeScreenSchemes;
    /**
     * The ID of the screen scheme.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the screen scheme.
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The name of the screen scheme.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the screen scheme.
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
     * The description of the screen scheme.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the screen scheme.
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
     * The IDs of the screens for the screen types of the screen scheme.
     *
     * @return ScreenSchemeScreens
     */
    public function getScreens(): ScreenSchemeScreens
    {
        return $this->screens;
    }
    /**
     * The IDs of the screens for the screen types of the screen scheme.
     *
     * @param ScreenSchemeScreens $screens
     *
     * @return self
     */
    public function setScreens(ScreenSchemeScreens $screens): self
    {
        $this->initialized['screens'] = true;
        $this->screens = $screens;
        return $this;
    }
    /**
     * Details of the issue type screen schemes associated with the screen scheme.
     *
     * @return ScreenSchemeIssueTypeScreenSchemes
     */
    public function getIssueTypeScreenSchemes(): ScreenSchemeIssueTypeScreenSchemes
    {
        return $this->issueTypeScreenSchemes;
    }
    /**
     * Details of the issue type screen schemes associated with the screen scheme.
     *
     * @param ScreenSchemeIssueTypeScreenSchemes $issueTypeScreenSchemes
     *
     * @return self
     */
    public function setIssueTypeScreenSchemes(ScreenSchemeIssueTypeScreenSchemes $issueTypeScreenSchemes): self
    {
        $this->initialized['issueTypeScreenSchemes'] = true;
        $this->issueTypeScreenSchemes = $issueTypeScreenSchemes;
        return $this;
    }
}
