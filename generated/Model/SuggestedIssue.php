<?php

namespace JiraSdk\Model;

class SuggestedIssue
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
     * The ID of the issue.
     *
     * @var int
     */
    protected $id;
    /**
     * The key of the issue.
     *
     * @var string
     */
    protected $key;
    /**
     * The key of the issue in HTML format.
     *
     * @var string
     */
    protected $keyHtml;
    /**
     * The URL of the issue type's avatar.
     *
     * @var string
     */
    protected $img;
    /**
     * The phrase containing the query string in HTML format, with the string highlighted with HTML bold tags.
     *
     * @var string
     */
    protected $summary;
    /**
     * The phrase containing the query string, as plain text.
     *
     * @var string
     */
    protected $summaryText;
    /**
     * The ID of the issue.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the issue.
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
     * The key of the issue.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the issue.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The key of the issue in HTML format.
     *
     * @return string
     */
    public function getKeyHtml(): string
    {
        return $this->keyHtml;
    }
    /**
     * The key of the issue in HTML format.
     *
     * @param string $keyHtml
     *
     * @return self
     */
    public function setKeyHtml(string $keyHtml): self
    {
        $this->initialized['keyHtml'] = true;
        $this->keyHtml = $keyHtml;
        return $this;
    }
    /**
     * The URL of the issue type's avatar.
     *
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }
    /**
     * The URL of the issue type's avatar.
     *
     * @param string $img
     *
     * @return self
     */
    public function setImg(string $img): self
    {
        $this->initialized['img'] = true;
        $this->img = $img;
        return $this;
    }
    /**
     * The phrase containing the query string in HTML format, with the string highlighted with HTML bold tags.
     *
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }
    /**
     * The phrase containing the query string in HTML format, with the string highlighted with HTML bold tags.
     *
     * @param string $summary
     *
     * @return self
     */
    public function setSummary(string $summary): self
    {
        $this->initialized['summary'] = true;
        $this->summary = $summary;
        return $this;
    }
    /**
     * The phrase containing the query string, as plain text.
     *
     * @return string
     */
    public function getSummaryText(): string
    {
        return $this->summaryText;
    }
    /**
     * The phrase containing the query string, as plain text.
     *
     * @param string $summaryText
     *
     * @return self
     */
    public function setSummaryText(string $summaryText): self
    {
        $this->initialized['summaryText'] = true;
        $this->summaryText = $summaryText;
        return $this;
    }
}
