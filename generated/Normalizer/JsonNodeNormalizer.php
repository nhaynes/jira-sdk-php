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

namespace JiraSdk\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Api\Runtime\Normalizer\CheckArray;
use JiraSdk\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class JsonNodeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\JsonNode' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\JsonNode' === \get_class($data);
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Api\Model\JsonNode();
        if (\array_key_exists('numberValue', $data) && \is_int($data['numberValue'])) {
            $data['numberValue'] = (float) $data['numberValue'];
        }
        if (\array_key_exists('doubleValue', $data) && \is_int($data['doubleValue'])) {
            $data['doubleValue'] = (float) $data['doubleValue'];
        }
        if (\array_key_exists('decimalValue', $data) && \is_int($data['decimalValue'])) {
            $data['decimalValue'] = (float) $data['decimalValue'];
        }
        if (\array_key_exists('valueAsDouble', $data) && \is_int($data['valueAsDouble'])) {
            $data['valueAsDouble'] = (float) $data['valueAsDouble'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('elements', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['elements'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setElements($values);
        }
        if (\array_key_exists('array', $data)) {
            $object->setArray($data['array']);
        }
        if (\array_key_exists('fields', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['fields'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setFields($values_1);
        }
        if (\array_key_exists('null', $data)) {
            $object->setNull($data['null']);
        }
        if (\array_key_exists('floatingPointNumber', $data)) {
            $object->setFloatingPointNumber($data['floatingPointNumber']);
        }
        if (\array_key_exists('valueNode', $data)) {
            $object->setValueNode($data['valueNode']);
        }
        if (\array_key_exists('containerNode', $data)) {
            $object->setContainerNode($data['containerNode']);
        }
        if (\array_key_exists('missingNode', $data)) {
            $object->setMissingNode($data['missingNode']);
        }
        if (\array_key_exists('object', $data)) {
            $object->setObject($data['object']);
        }
        if (\array_key_exists('pojo', $data)) {
            $object->setPojo($data['pojo']);
        }
        if (\array_key_exists('number', $data)) {
            $object->setNumber($data['number']);
        }
        if (\array_key_exists('integralNumber', $data)) {
            $object->setIntegralNumber($data['integralNumber']);
        }
        if (\array_key_exists('int', $data)) {
            $object->setInt($data['int']);
        }
        if (\array_key_exists('long', $data)) {
            $object->setLong($data['long']);
        }
        if (\array_key_exists('double', $data)) {
            $object->setDouble($data['double']);
        }
        if (\array_key_exists('bigDecimal', $data)) {
            $object->setBigDecimal($data['bigDecimal']);
        }
        if (\array_key_exists('bigInteger', $data)) {
            $object->setBigInteger($data['bigInteger']);
        }
        if (\array_key_exists('textual', $data)) {
            $object->setTextual($data['textual']);
        }
        if (\array_key_exists('boolean', $data)) {
            $object->setBoolean($data['boolean']);
        }
        if (\array_key_exists('binary', $data)) {
            $object->setBinary($data['binary']);
        }
        if (\array_key_exists('numberValue', $data)) {
            $object->setNumberValue($data['numberValue']);
        }
        if (\array_key_exists('numberType', $data)) {
            $object->setNumberType($data['numberType']);
        }
        if (\array_key_exists('intValue', $data)) {
            $object->setIntValue($data['intValue']);
        }
        if (\array_key_exists('longValue', $data)) {
            $object->setLongValue($data['longValue']);
        }
        if (\array_key_exists('bigIntegerValue', $data)) {
            $object->setBigIntegerValue($data['bigIntegerValue']);
        }
        if (\array_key_exists('doubleValue', $data)) {
            $object->setDoubleValue($data['doubleValue']);
        }
        if (\array_key_exists('decimalValue', $data)) {
            $object->setDecimalValue($data['decimalValue']);
        }
        if (\array_key_exists('booleanValue', $data)) {
            $object->setBooleanValue($data['booleanValue']);
        }
        if (\array_key_exists('binaryValue', $data)) {
            $values_2 = [];
            foreach ($data['binaryValue'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setBinaryValue($values_2);
        }
        if (\array_key_exists('valueAsInt', $data)) {
            $object->setValueAsInt($data['valueAsInt']);
        }
        if (\array_key_exists('valueAsLong', $data)) {
            $object->setValueAsLong($data['valueAsLong']);
        }
        if (\array_key_exists('valueAsDouble', $data)) {
            $object->setValueAsDouble($data['valueAsDouble']);
        }
        if (\array_key_exists('valueAsBoolean', $data)) {
            $object->setValueAsBoolean($data['valueAsBoolean']);
        }
        if (\array_key_exists('textValue', $data)) {
            $object->setTextValue($data['textValue']);
        }
        if (\array_key_exists('valueAsText', $data)) {
            $object->setValueAsText($data['valueAsText']);
        }
        if (\array_key_exists('fieldNames', $data)) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['fieldNames'] as $key_2 => $value_3) {
                $values_3[$key_2] = $value_3;
            }
            $object->setFieldNames($values_3);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('elements') && null !== $object->getElements()) {
            $values = [];
            foreach ($object->getElements() as $key => $value) {
                $values[$key] = $value;
            }
            $data['elements'] = $values;
        }
        if ($object->isInitialized('array') && null !== $object->getArray()) {
            $data['array'] = $object->getArray();
        }
        if ($object->isInitialized('fields') && null !== $object->getFields()) {
            $values_1 = [];
            foreach ($object->getFields() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['fields'] = $values_1;
        }
        if ($object->isInitialized('null') && null !== $object->getNull()) {
            $data['null'] = $object->getNull();
        }
        if ($object->isInitialized('floatingPointNumber') && null !== $object->getFloatingPointNumber()) {
            $data['floatingPointNumber'] = $object->getFloatingPointNumber();
        }
        if ($object->isInitialized('valueNode') && null !== $object->getValueNode()) {
            $data['valueNode'] = $object->getValueNode();
        }
        if ($object->isInitialized('containerNode') && null !== $object->getContainerNode()) {
            $data['containerNode'] = $object->getContainerNode();
        }
        if ($object->isInitialized('missingNode') && null !== $object->getMissingNode()) {
            $data['missingNode'] = $object->getMissingNode();
        }
        if ($object->isInitialized('object') && null !== $object->getObject()) {
            $data['object'] = $object->getObject();
        }
        if ($object->isInitialized('pojo') && null !== $object->getPojo()) {
            $data['pojo'] = $object->getPojo();
        }
        if ($object->isInitialized('number') && null !== $object->getNumber()) {
            $data['number'] = $object->getNumber();
        }
        if ($object->isInitialized('integralNumber') && null !== $object->getIntegralNumber()) {
            $data['integralNumber'] = $object->getIntegralNumber();
        }
        if ($object->isInitialized('int') && null !== $object->getInt()) {
            $data['int'] = $object->getInt();
        }
        if ($object->isInitialized('long') && null !== $object->getLong()) {
            $data['long'] = $object->getLong();
        }
        if ($object->isInitialized('double') && null !== $object->getDouble()) {
            $data['double'] = $object->getDouble();
        }
        if ($object->isInitialized('bigDecimal') && null !== $object->getBigDecimal()) {
            $data['bigDecimal'] = $object->getBigDecimal();
        }
        if ($object->isInitialized('bigInteger') && null !== $object->getBigInteger()) {
            $data['bigInteger'] = $object->getBigInteger();
        }
        if ($object->isInitialized('textual') && null !== $object->getTextual()) {
            $data['textual'] = $object->getTextual();
        }
        if ($object->isInitialized('boolean') && null !== $object->getBoolean()) {
            $data['boolean'] = $object->getBoolean();
        }
        if ($object->isInitialized('binary') && null !== $object->getBinary()) {
            $data['binary'] = $object->getBinary();
        }
        if ($object->isInitialized('numberValue') && null !== $object->getNumberValue()) {
            $data['numberValue'] = $object->getNumberValue();
        }
        if ($object->isInitialized('numberType') && null !== $object->getNumberType()) {
            $data['numberType'] = $object->getNumberType();
        }
        if ($object->isInitialized('intValue') && null !== $object->getIntValue()) {
            $data['intValue'] = $object->getIntValue();
        }
        if ($object->isInitialized('longValue') && null !== $object->getLongValue()) {
            $data['longValue'] = $object->getLongValue();
        }
        if ($object->isInitialized('bigIntegerValue') && null !== $object->getBigIntegerValue()) {
            $data['bigIntegerValue'] = $object->getBigIntegerValue();
        }
        if ($object->isInitialized('doubleValue') && null !== $object->getDoubleValue()) {
            $data['doubleValue'] = $object->getDoubleValue();
        }
        if ($object->isInitialized('decimalValue') && null !== $object->getDecimalValue()) {
            $data['decimalValue'] = $object->getDecimalValue();
        }
        if ($object->isInitialized('booleanValue') && null !== $object->getBooleanValue()) {
            $data['booleanValue'] = $object->getBooleanValue();
        }
        if ($object->isInitialized('binaryValue') && null !== $object->getBinaryValue()) {
            $values_2 = [];
            foreach ($object->getBinaryValue() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['binaryValue'] = $values_2;
        }
        if ($object->isInitialized('valueAsInt') && null !== $object->getValueAsInt()) {
            $data['valueAsInt'] = $object->getValueAsInt();
        }
        if ($object->isInitialized('valueAsLong') && null !== $object->getValueAsLong()) {
            $data['valueAsLong'] = $object->getValueAsLong();
        }
        if ($object->isInitialized('valueAsDouble') && null !== $object->getValueAsDouble()) {
            $data['valueAsDouble'] = $object->getValueAsDouble();
        }
        if ($object->isInitialized('valueAsBoolean') && null !== $object->getValueAsBoolean()) {
            $data['valueAsBoolean'] = $object->getValueAsBoolean();
        }
        if ($object->isInitialized('textValue') && null !== $object->getTextValue()) {
            $data['textValue'] = $object->getTextValue();
        }
        if ($object->isInitialized('valueAsText') && null !== $object->getValueAsText()) {
            $data['valueAsText'] = $object->getValueAsText();
        }
        if ($object->isInitialized('fieldNames') && null !== $object->getFieldNames()) {
            $values_3 = [];
            foreach ($object->getFieldNames() as $key_2 => $value_3) {
                $values_3[$key_2] = $value_3;
            }
            $data['fieldNames'] = $values_3;
        }

        return $data;
    }
}
