<?php

namespace JiraSdk\Model;

class JsonNode
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
     *
     *
     * @var mixed[]
     */
    protected $elements;
    /**
     *
     *
     * @var bool
     */
    protected $array;
    /**
     *
     *
     * @var mixed[]
     */
    protected $fields;
    /**
     *
     *
     * @var bool
     */
    protected $null;
    /**
     *
     *
     * @var bool
     */
    protected $floatingPointNumber;
    /**
     *
     *
     * @var bool
     */
    protected $valueNode;
    /**
     *
     *
     * @var bool
     */
    protected $containerNode;
    /**
     *
     *
     * @var bool
     */
    protected $missingNode;
    /**
     *
     *
     * @var bool
     */
    protected $object;
    /**
     *
     *
     * @var bool
     */
    protected $pojo;
    /**
     *
     *
     * @var bool
     */
    protected $number;
    /**
     *
     *
     * @var bool
     */
    protected $integralNumber;
    /**
     *
     *
     * @var bool
     */
    protected $int;
    /**
     *
     *
     * @var bool
     */
    protected $long;
    /**
     *
     *
     * @var bool
     */
    protected $double;
    /**
     *
     *
     * @var bool
     */
    protected $bigDecimal;
    /**
     *
     *
     * @var bool
     */
    protected $bigInteger;
    /**
     *
     *
     * @var bool
     */
    protected $textual;
    /**
     *
     *
     * @var bool
     */
    protected $boolean;
    /**
     *
     *
     * @var bool
     */
    protected $binary;
    /**
     *
     *
     * @var float
     */
    protected $numberValue;
    /**
     *
     *
     * @var string
     */
    protected $numberType;
    /**
     *
     *
     * @var int
     */
    protected $intValue;
    /**
     *
     *
     * @var int
     */
    protected $longValue;
    /**
     *
     *
     * @var int
     */
    protected $bigIntegerValue;
    /**
     *
     *
     * @var float
     */
    protected $doubleValue;
    /**
     *
     *
     * @var float
     */
    protected $decimalValue;
    /**
     *
     *
     * @var bool
     */
    protected $booleanValue;
    /**
     *
     *
     * @var string[]
     */
    protected $binaryValue;
    /**
     *
     *
     * @var int
     */
    protected $valueAsInt;
    /**
     *
     *
     * @var int
     */
    protected $valueAsLong;
    /**
     *
     *
     * @var float
     */
    protected $valueAsDouble;
    /**
     *
     *
     * @var bool
     */
    protected $valueAsBoolean;
    /**
     *
     *
     * @var string
     */
    protected $textValue;
    /**
     *
     *
     * @var string
     */
    protected $valueAsText;
    /**
     *
     *
     * @var mixed[]
     */
    protected $fieldNames;
    /**
     *
     *
     * @return mixed[]
     */
    public function getElements(): iterable
    {
        return $this->elements;
    }
    /**
     *
     *
     * @param mixed[] $elements
     *
     * @return self
     */
    public function setElements(iterable $elements): self
    {
        $this->initialized['elements'] = true;
        $this->elements = $elements;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getArray(): bool
    {
        return $this->array;
    }
    /**
     *
     *
     * @param bool $array
     *
     * @return self
     */
    public function setArray(bool $array): self
    {
        $this->initialized['array'] = true;
        $this->array = $array;
        return $this;
    }
    /**
     *
     *
     * @return mixed[]
     */
    public function getFields(): iterable
    {
        return $this->fields;
    }
    /**
     *
     *
     * @param mixed[] $fields
     *
     * @return self
     */
    public function setFields(iterable $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getNull(): bool
    {
        return $this->null;
    }
    /**
     *
     *
     * @param bool $null
     *
     * @return self
     */
    public function setNull(bool $null): self
    {
        $this->initialized['null'] = true;
        $this->null = $null;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getFloatingPointNumber(): bool
    {
        return $this->floatingPointNumber;
    }
    /**
     *
     *
     * @param bool $floatingPointNumber
     *
     * @return self
     */
    public function setFloatingPointNumber(bool $floatingPointNumber): self
    {
        $this->initialized['floatingPointNumber'] = true;
        $this->floatingPointNumber = $floatingPointNumber;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getValueNode(): bool
    {
        return $this->valueNode;
    }
    /**
     *
     *
     * @param bool $valueNode
     *
     * @return self
     */
    public function setValueNode(bool $valueNode): self
    {
        $this->initialized['valueNode'] = true;
        $this->valueNode = $valueNode;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getContainerNode(): bool
    {
        return $this->containerNode;
    }
    /**
     *
     *
     * @param bool $containerNode
     *
     * @return self
     */
    public function setContainerNode(bool $containerNode): self
    {
        $this->initialized['containerNode'] = true;
        $this->containerNode = $containerNode;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getMissingNode(): bool
    {
        return $this->missingNode;
    }
    /**
     *
     *
     * @param bool $missingNode
     *
     * @return self
     */
    public function setMissingNode(bool $missingNode): self
    {
        $this->initialized['missingNode'] = true;
        $this->missingNode = $missingNode;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getObject(): bool
    {
        return $this->object;
    }
    /**
     *
     *
     * @param bool $object
     *
     * @return self
     */
    public function setObject(bool $object): self
    {
        $this->initialized['object'] = true;
        $this->object = $object;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getPojo(): bool
    {
        return $this->pojo;
    }
    /**
     *
     *
     * @param bool $pojo
     *
     * @return self
     */
    public function setPojo(bool $pojo): self
    {
        $this->initialized['pojo'] = true;
        $this->pojo = $pojo;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getNumber(): bool
    {
        return $this->number;
    }
    /**
     *
     *
     * @param bool $number
     *
     * @return self
     */
    public function setNumber(bool $number): self
    {
        $this->initialized['number'] = true;
        $this->number = $number;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getIntegralNumber(): bool
    {
        return $this->integralNumber;
    }
    /**
     *
     *
     * @param bool $integralNumber
     *
     * @return self
     */
    public function setIntegralNumber(bool $integralNumber): self
    {
        $this->initialized['integralNumber'] = true;
        $this->integralNumber = $integralNumber;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getInt(): bool
    {
        return $this->int;
    }
    /**
     *
     *
     * @param bool $int
     *
     * @return self
     */
    public function setInt(bool $int): self
    {
        $this->initialized['int'] = true;
        $this->int = $int;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getLong(): bool
    {
        return $this->long;
    }
    /**
     *
     *
     * @param bool $long
     *
     * @return self
     */
    public function setLong(bool $long): self
    {
        $this->initialized['long'] = true;
        $this->long = $long;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getDouble(): bool
    {
        return $this->double;
    }
    /**
     *
     *
     * @param bool $double
     *
     * @return self
     */
    public function setDouble(bool $double): self
    {
        $this->initialized['double'] = true;
        $this->double = $double;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getBigDecimal(): bool
    {
        return $this->bigDecimal;
    }
    /**
     *
     *
     * @param bool $bigDecimal
     *
     * @return self
     */
    public function setBigDecimal(bool $bigDecimal): self
    {
        $this->initialized['bigDecimal'] = true;
        $this->bigDecimal = $bigDecimal;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getBigInteger(): bool
    {
        return $this->bigInteger;
    }
    /**
     *
     *
     * @param bool $bigInteger
     *
     * @return self
     */
    public function setBigInteger(bool $bigInteger): self
    {
        $this->initialized['bigInteger'] = true;
        $this->bigInteger = $bigInteger;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getTextual(): bool
    {
        return $this->textual;
    }
    /**
     *
     *
     * @param bool $textual
     *
     * @return self
     */
    public function setTextual(bool $textual): self
    {
        $this->initialized['textual'] = true;
        $this->textual = $textual;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getBoolean(): bool
    {
        return $this->boolean;
    }
    /**
     *
     *
     * @param bool $boolean
     *
     * @return self
     */
    public function setBoolean(bool $boolean): self
    {
        $this->initialized['boolean'] = true;
        $this->boolean = $boolean;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getBinary(): bool
    {
        return $this->binary;
    }
    /**
     *
     *
     * @param bool $binary
     *
     * @return self
     */
    public function setBinary(bool $binary): self
    {
        $this->initialized['binary'] = true;
        $this->binary = $binary;
        return $this;
    }
    /**
     *
     *
     * @return float
     */
    public function getNumberValue(): float
    {
        return $this->numberValue;
    }
    /**
     *
     *
     * @param float $numberValue
     *
     * @return self
     */
    public function setNumberValue(float $numberValue): self
    {
        $this->initialized['numberValue'] = true;
        $this->numberValue = $numberValue;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getNumberType(): string
    {
        return $this->numberType;
    }
    /**
     *
     *
     * @param string $numberType
     *
     * @return self
     */
    public function setNumberType(string $numberType): self
    {
        $this->initialized['numberType'] = true;
        $this->numberType = $numberType;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getIntValue(): int
    {
        return $this->intValue;
    }
    /**
     *
     *
     * @param int $intValue
     *
     * @return self
     */
    public function setIntValue(int $intValue): self
    {
        $this->initialized['intValue'] = true;
        $this->intValue = $intValue;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getLongValue(): int
    {
        return $this->longValue;
    }
    /**
     *
     *
     * @param int $longValue
     *
     * @return self
     */
    public function setLongValue(int $longValue): self
    {
        $this->initialized['longValue'] = true;
        $this->longValue = $longValue;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getBigIntegerValue(): int
    {
        return $this->bigIntegerValue;
    }
    /**
     *
     *
     * @param int $bigIntegerValue
     *
     * @return self
     */
    public function setBigIntegerValue(int $bigIntegerValue): self
    {
        $this->initialized['bigIntegerValue'] = true;
        $this->bigIntegerValue = $bigIntegerValue;
        return $this;
    }
    /**
     *
     *
     * @return float
     */
    public function getDoubleValue(): float
    {
        return $this->doubleValue;
    }
    /**
     *
     *
     * @param float $doubleValue
     *
     * @return self
     */
    public function setDoubleValue(float $doubleValue): self
    {
        $this->initialized['doubleValue'] = true;
        $this->doubleValue = $doubleValue;
        return $this;
    }
    /**
     *
     *
     * @return float
     */
    public function getDecimalValue(): float
    {
        return $this->decimalValue;
    }
    /**
     *
     *
     * @param float $decimalValue
     *
     * @return self
     */
    public function setDecimalValue(float $decimalValue): self
    {
        $this->initialized['decimalValue'] = true;
        $this->decimalValue = $decimalValue;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getBooleanValue(): bool
    {
        return $this->booleanValue;
    }
    /**
     *
     *
     * @param bool $booleanValue
     *
     * @return self
     */
    public function setBooleanValue(bool $booleanValue): self
    {
        $this->initialized['booleanValue'] = true;
        $this->booleanValue = $booleanValue;
        return $this;
    }
    /**
     *
     *
     * @return string[]
     */
    public function getBinaryValue(): array
    {
        return $this->binaryValue;
    }
    /**
     *
     *
     * @param string[] $binaryValue
     *
     * @return self
     */
    public function setBinaryValue(array $binaryValue): self
    {
        $this->initialized['binaryValue'] = true;
        $this->binaryValue = $binaryValue;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getValueAsInt(): int
    {
        return $this->valueAsInt;
    }
    /**
     *
     *
     * @param int $valueAsInt
     *
     * @return self
     */
    public function setValueAsInt(int $valueAsInt): self
    {
        $this->initialized['valueAsInt'] = true;
        $this->valueAsInt = $valueAsInt;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getValueAsLong(): int
    {
        return $this->valueAsLong;
    }
    /**
     *
     *
     * @param int $valueAsLong
     *
     * @return self
     */
    public function setValueAsLong(int $valueAsLong): self
    {
        $this->initialized['valueAsLong'] = true;
        $this->valueAsLong = $valueAsLong;
        return $this;
    }
    /**
     *
     *
     * @return float
     */
    public function getValueAsDouble(): float
    {
        return $this->valueAsDouble;
    }
    /**
     *
     *
     * @param float $valueAsDouble
     *
     * @return self
     */
    public function setValueAsDouble(float $valueAsDouble): self
    {
        $this->initialized['valueAsDouble'] = true;
        $this->valueAsDouble = $valueAsDouble;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getValueAsBoolean(): bool
    {
        return $this->valueAsBoolean;
    }
    /**
     *
     *
     * @param bool $valueAsBoolean
     *
     * @return self
     */
    public function setValueAsBoolean(bool $valueAsBoolean): self
    {
        $this->initialized['valueAsBoolean'] = true;
        $this->valueAsBoolean = $valueAsBoolean;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getTextValue(): string
    {
        return $this->textValue;
    }
    /**
     *
     *
     * @param string $textValue
     *
     * @return self
     */
    public function setTextValue(string $textValue): self
    {
        $this->initialized['textValue'] = true;
        $this->textValue = $textValue;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getValueAsText(): string
    {
        return $this->valueAsText;
    }
    /**
     *
     *
     * @param string $valueAsText
     *
     * @return self
     */
    public function setValueAsText(string $valueAsText): self
    {
        $this->initialized['valueAsText'] = true;
        $this->valueAsText = $valueAsText;
        return $this;
    }
    /**
     *
     *
     * @return mixed[]
     */
    public function getFieldNames(): iterable
    {
        return $this->fieldNames;
    }
    /**
     *
     *
     * @param mixed[] $fieldNames
     *
     * @return self
     */
    public function setFieldNames(iterable $fieldNames): self
    {
        $this->initialized['fieldNames'] = true;
        $this->fieldNames = $fieldNames;
        return $this;
    }
}
