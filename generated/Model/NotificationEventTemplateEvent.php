<?php

namespace JiraSdk\Model;

class NotificationEventTemplateEvent extends \ArrayObject
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
     * The ID of the event. The event can be a [Jira system event](https://confluence.atlassian.com/x/8YdKLg#Creatinganotificationscheme-eventsEvents) or a [custom event](https://confluence.atlassian.com/x/AIlKLg).
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the event.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the event.
     *
     * @var string
     */
    protected $description;
    /**
     * The template of the event. Only custom events configured by Jira administrators have template.
     *
     * @var NotificationEventTemplateEvent
     */
    protected $templateEvent;
    /**
     * The ID of the event. The event can be a [Jira system event](https://confluence.atlassian.com/x/8YdKLg#Creatinganotificationscheme-eventsEvents) or a [custom event](https://confluence.atlassian.com/x/AIlKLg).
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the event. The event can be a [Jira system event](https://confluence.atlassian.com/x/8YdKLg#Creatinganotificationscheme-eventsEvents) or a [custom event](https://confluence.atlassian.com/x/AIlKLg).
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
     * The name of the event.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the event.
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
     * The description of the event.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the event.
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
     * The template of the event. Only custom events configured by Jira administrators have template.
     *
     * @return NotificationEventTemplateEvent
     */
    public function getTemplateEvent(): NotificationEventTemplateEvent
    {
        return $this->templateEvent;
    }
    /**
     * The template of the event. Only custom events configured by Jira administrators have template.
     *
     * @param NotificationEventTemplateEvent $templateEvent
     *
     * @return self
     */
    public function setTemplateEvent(NotificationEventTemplateEvent $templateEvent): self
    {
        $this->initialized['templateEvent'] = true;
        $this->templateEvent = $templateEvent;
        return $this;
    }
}
