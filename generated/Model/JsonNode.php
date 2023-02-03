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

class JsonNode
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var mixed[]
     */
    protected $elements;
    /**
     * @var bool
     */
    protected $array;
    /**
     * @var mixed[]
     */
    protected $fields;
    /**
     * @var bool
     */
    protected $null;
    /**
     * @var bool
     */
    protected $floatingPointNumber;
    /**
     * @var bool
     */
    protected $valueNode;
    /**
     * @var bool
     */
    protected $containerNode;
    /**
     * @var bool
     */
    protected $missingNode;
    /**
     * @var bool
     */
    protected $object;
    /**
     * @var bool
     */
    protected $pojo;
    /**
     * @var bool
     */
    protected $number;
    /**
     * @var bool
     */
    protected $integralNumber;
    /**
     * @var bool
     */
    protected $int;
    /**
     * @var bool
     */
    protected $long;
    /**
     * @var bool
     */
    protected $double;
    /**
     * @var bool
     */
    protected $bigDecimal;
    /**
     * @var bool
     */
    protected $bigInteger;
    /**
     * @var bool
     */
    protected $textual;
    /**
     * @var bool
     */
    protected $boolean;
    /**
     * @var bool
     */
    protected $binary;
    /**
     * @var float
     */
    protected $numberValue;
    /**
     * @var string
     */
    protected $numberType;
    /**
     * @var int
     */
    protected $intValue;
    /**
     * @var int
     */
    protected $longValue;
    /**
     * @var int
     */
    protected $bigIntegerValue;
    /**
     * @var float
     */
    protected $doubleValue;
    /**
     * @var float
     */
    protected $decimalValue;
    /**
     * @var bool
     */
    protected $booleanValue;
    /**
     * @var string[]
     */
    protected $binaryValue;
    /**
     * @var int
     */
    protected $valueAsInt;
    /**
     * @var int
     */
    protected $valueAsLong;
    /**
     * @var float
     */
    protected $valueAsDouble;
    /**
     * @var bool
     */
    protected $valueAsBoolean;
    /**
     * @var string
     */
    protected $textValue;
    /**
     * @var string
     */
    protected $valueAsText;
    /**
     * @var mixed[]
     */
    protected $fieldNames;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * @return mixed[]
     */
    public function getElements(): iterable
    {
        return $this->elements;
    }

    /**
     * @param mixed[] $elements
     */
    public function setElements(iterable $elements): self
    {
        $this->initialized['elements'] = true;
        $this->elements = $elements;

        return $this;
    }

    public function getArray(): bool
    {
        return $this->array;
    }

    public function setArray(bool $array): self
    {
        $this->initialized['array'] = true;
        $this->array = $array;

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getFields(): iterable
    {
        return $this->fields;
    }

    /**
     * @param mixed[] $fields
     */
    public function setFields(iterable $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }

    public function getNull(): bool
    {
        return $this->null;
    }

    public function setNull(bool $null): self
    {
        $this->initialized['null'] = true;
        $this->null = $null;

        return $this;
    }

    public function getFloatingPointNumber(): bool
    {
        return $this->floatingPointNumber;
    }

    public function setFloatingPointNumber(bool $floatingPointNumber): self
    {
        $this->initialized['floatingPointNumber'] = true;
        $this->floatingPointNumber = $floatingPointNumber;

        return $this;
    }

    public function getValueNode(): bool
    {
        return $this->valueNode;
    }

    public function setValueNode(bool $valueNode): self
    {
        $this->initialized['valueNode'] = true;
        $this->valueNode = $valueNode;

        return $this;
    }

    public function getContainerNode(): bool
    {
        return $this->containerNode;
    }

    public function setContainerNode(bool $containerNode): self
    {
        $this->initialized['containerNode'] = true;
        $this->containerNode = $containerNode;

        return $this;
    }

    public function getMissingNode(): bool
    {
        return $this->missingNode;
    }

    public function setMissingNode(bool $missingNode): self
    {
        $this->initialized['missingNode'] = true;
        $this->missingNode = $missingNode;

        return $this;
    }

    public function getObject(): bool
    {
        return $this->object;
    }

    public function setObject(bool $object): self
    {
        $this->initialized['object'] = true;
        $this->object = $object;

        return $this;
    }

    public function getPojo(): bool
    {
        return $this->pojo;
    }

    public function setPojo(bool $pojo): self
    {
        $this->initialized['pojo'] = true;
        $this->pojo = $pojo;

        return $this;
    }

    public function getNumber(): bool
    {
        return $this->number;
    }

    public function setNumber(bool $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;

        return $this;
    }

    public function getIntegralNumber(): bool
    {
        return $this->integralNumber;
    }

    public function setIntegralNumber(bool $integralNumber): self
    {
        $this->initialized['integralNumber'] = true;
        $this->integralNumber = $integralNumber;

        return $this;
    }

    public function getInt(): bool
    {
        return $this->int;
    }

    public function setInt(bool $int): self
    {
        $this->initialized['int'] = true;
        $this->int = $int;

        return $this;
    }

    public function getLong(): bool
    {
        return $this->long;
    }

    public function setLong(bool $long): self
    {
        $this->initialized['long'] = true;
        $this->long = $long;

        return $this;
    }

    public function getDouble(): bool
    {
        return $this->double;
    }

    public function setDouble(bool $double): self
    {
        $this->initialized['double'] = true;
        $this->double = $double;

        return $this;
    }

    public function getBigDecimal(): bool
    {
        return $this->bigDecimal;
    }

    public function setBigDecimal(bool $bigDecimal): self
    {
        $this->initialized['bigDecimal'] = true;
        $this->bigDecimal = $bigDecimal;

        return $this;
    }

    public function getBigInteger(): bool
    {
        return $this->bigInteger;
    }

    public function setBigInteger(bool $bigInteger): self
    {
        $this->initialized['bigInteger'] = true;
        $this->bigInteger = $bigInteger;

        return $this;
    }

    public function getTextual(): bool
    {
        return $this->textual;
    }

    public function setTextual(bool $textual): self
    {
        $this->initialized['textual'] = true;
        $this->textual = $textual;

        return $this;
    }

    public function getBoolean(): bool
    {
        return $this->boolean;
    }

    public function setBoolean(bool $boolean): self
    {
        $this->initialized['boolean'] = true;
        $this->boolean = $boolean;

        return $this;
    }

    public function getBinary(): bool
    {
        return $this->binary;
    }

    public function setBinary(bool $binary): self
    {
        $this->initialized['binary'] = true;
        $this->binary = $binary;

        return $this;
    }

    public function getNumberValue(): float
    {
        return $this->numberValue;
    }

    public function setNumberValue(float $numberValue): self
    {
        $this->initialized['numberValue'] = true;
        $this->numberValue = $numberValue;

        return $this;
    }

    public function getNumberType(): string
    {
        return $this->numberType;
    }

    public function setNumberType(string $numberType): self
    {
        $this->initialized['numberType'] = true;
        $this->numberType = $numberType;

        return $this;
    }

    public function getIntValue(): int
    {
        return $this->intValue;
    }

    public function setIntValue(int $intValue): self
    {
        $this->initialized['intValue'] = true;
        $this->intValue = $intValue;

        return $this;
    }

    public function getLongValue(): int
    {
        return $this->longValue;
    }

    public function setLongValue(int $longValue): self
    {
        $this->initialized['longValue'] = true;
        $this->longValue = $longValue;

        return $this;
    }

    public function getBigIntegerValue(): int
    {
        return $this->bigIntegerValue;
    }

    public function setBigIntegerValue(int $bigIntegerValue): self
    {
        $this->initialized['bigIntegerValue'] = true;
        $this->bigIntegerValue = $bigIntegerValue;

        return $this;
    }

    public function getDoubleValue(): float
    {
        return $this->doubleValue;
    }

    public function setDoubleValue(float $doubleValue): self
    {
        $this->initialized['doubleValue'] = true;
        $this->doubleValue = $doubleValue;

        return $this;
    }

    public function getDecimalValue(): float
    {
        return $this->decimalValue;
    }

    public function setDecimalValue(float $decimalValue): self
    {
        $this->initialized['decimalValue'] = true;
        $this->decimalValue = $decimalValue;

        return $this;
    }

    public function getBooleanValue(): bool
    {
        return $this->booleanValue;
    }

    public function setBooleanValue(bool $booleanValue): self
    {
        $this->initialized['booleanValue'] = true;
        $this->booleanValue = $booleanValue;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getBinaryValue(): array
    {
        return $this->binaryValue;
    }

    /**
     * @param string[] $binaryValue
     */
    public function setBinaryValue(array $binaryValue): self
    {
        $this->initialized['binaryValue'] = true;
        $this->binaryValue = $binaryValue;

        return $this;
    }

    public function getValueAsInt(): int
    {
        return $this->valueAsInt;
    }

    public function setValueAsInt(int $valueAsInt): self
    {
        $this->initialized['valueAsInt'] = true;
        $this->valueAsInt = $valueAsInt;

        return $this;
    }

    public function getValueAsLong(): int
    {
        return $this->valueAsLong;
    }

    public function setValueAsLong(int $valueAsLong): self
    {
        $this->initialized['valueAsLong'] = true;
        $this->valueAsLong = $valueAsLong;

        return $this;
    }

    public function getValueAsDouble(): float
    {
        return $this->valueAsDouble;
    }

    public function setValueAsDouble(float $valueAsDouble): self
    {
        $this->initialized['valueAsDouble'] = true;
        $this->valueAsDouble = $valueAsDouble;

        return $this;
    }

    public function getValueAsBoolean(): bool
    {
        return $this->valueAsBoolean;
    }

    public function setValueAsBoolean(bool $valueAsBoolean): self
    {
        $this->initialized['valueAsBoolean'] = true;
        $this->valueAsBoolean = $valueAsBoolean;

        return $this;
    }

    public function getTextValue(): string
    {
        return $this->textValue;
    }

    public function setTextValue(string $textValue): self
    {
        $this->initialized['textValue'] = true;
        $this->textValue = $textValue;

        return $this;
    }

    public function getValueAsText(): string
    {
        return $this->valueAsText;
    }

    public function setValueAsText(string $valueAsText): self
    {
        $this->initialized['valueAsText'] = true;
        $this->valueAsText = $valueAsText;

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getFieldNames(): iterable
    {
        return $this->fieldNames;
    }

    /**
     * @param mixed[] $fieldNames
     */
    public function setFieldNames(iterable $fieldNames): self
    {
        $this->initialized['fieldNames'] = true;
        $this->fieldNames = $fieldNames;

        return $this;
    }
}
