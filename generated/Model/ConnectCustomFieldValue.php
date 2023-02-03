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

class ConnectCustomFieldValue extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The type of custom field.
     *
     * @var string
     */
    protected $type;
    /**
     * The issue ID.
     *
     * @var int
     */
    protected $issueID;
    /**
     * The custom field ID.
     *
     * @var int
     */
    protected $fieldID;
    /**
     * The value of string type custom field when `_type` is `StringIssueField`.
     *
     * @var string
     */
    protected $string;
    /**
     * The value of number type custom field when `_type` is `NumberIssueField`.
     *
     * @var float
     */
    protected $number;
    /**
     * The value of richText type custom field when `_type` is `RichTextIssueField`.
     *
     * @var string
     */
    protected $richText;
    /**
     * The value of single select and multiselect custom field type when `_type` is `SingleSelectIssueField` or `MultiSelectIssueField`.
     *
     * @var string
     */
    protected $optionID;
    /**
     * The value of of text custom field type when `_type` is `TextIssueField`.
     *
     * @var string
     */
    protected $text;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The type of custom field.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of custom field.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The issue ID.
     */
    public function getIssueID(): int
    {
        return $this->issueID;
    }

    /**
     * The issue ID.
     */
    public function setIssueID(int $issueID): self
    {
        $this->initialized['issueID'] = true;
        $this->issueID = $issueID;

        return $this;
    }

    /**
     * The custom field ID.
     */
    public function getFieldID(): int
    {
        return $this->fieldID;
    }

    /**
     * The custom field ID.
     */
    public function setFieldID(int $fieldID): self
    {
        $this->initialized['fieldID'] = true;
        $this->fieldID = $fieldID;

        return $this;
    }

    /**
     * The value of string type custom field when `_type` is `StringIssueField`.
     */
    public function getString(): string
    {
        return $this->string;
    }

    /**
     * The value of string type custom field when `_type` is `StringIssueField`.
     */
    public function setString(string $string): self
    {
        $this->initialized['string'] = true;
        $this->string = $string;

        return $this;
    }

    /**
     * The value of number type custom field when `_type` is `NumberIssueField`.
     */
    public function getNumber(): float
    {
        return $this->number;
    }

    /**
     * The value of number type custom field when `_type` is `NumberIssueField`.
     */
    public function setNumber(float $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;

        return $this;
    }

    /**
     * The value of richText type custom field when `_type` is `RichTextIssueField`.
     */
    public function getRichText(): string
    {
        return $this->richText;
    }

    /**
     * The value of richText type custom field when `_type` is `RichTextIssueField`.
     */
    public function setRichText(string $richText): self
    {
        $this->initialized['richText'] = true;
        $this->richText = $richText;

        return $this;
    }

    /**
     * The value of single select and multiselect custom field type when `_type` is `SingleSelectIssueField` or `MultiSelectIssueField`.
     */
    public function getOptionID(): string
    {
        return $this->optionID;
    }

    /**
     * The value of single select and multiselect custom field type when `_type` is `SingleSelectIssueField` or `MultiSelectIssueField`.
     */
    public function setOptionID(string $optionID): self
    {
        $this->initialized['optionID'] = true;
        $this->optionID = $optionID;

        return $this;
    }

    /**
     * The value of of text custom field type when `_type` is `TextIssueField`.
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * The value of of text custom field type when `_type` is `TextIssueField`.
     */
    public function setText(string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;

        return $this;
    }
}
