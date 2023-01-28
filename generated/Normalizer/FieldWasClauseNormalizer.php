<?php

namespace JiraSdk\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Runtime\Normalizer\CheckArray;
use JiraSdk\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class FieldWasClauseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\FieldWasClause';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\FieldWasClause';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Model\FieldWasClause();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('field', $data)) {
            $object->setField($this->denormalizer->denormalize($data['field'], 'JiraSdk\\Model\\JqlQueryField', 'json', $context));
            unset($data['field']);
        }
        if (\array_key_exists('operator', $data)) {
            $object->setOperator($data['operator']);
            unset($data['operator']);
        }
        if (\array_key_exists('operand', $data)) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['operand'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setOperand($values);
            unset($data['operand']);
        }
        if (\array_key_exists('predicates', $data)) {
            $values_1 = array();
            foreach ($data['predicates'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\JqlQueryClauseTimePredicate', 'json', $context);
            }
            $object->setPredicates($values_1);
            unset($data['predicates']);
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_2;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['field'] = $this->normalizer->normalize($object->getField(), 'json', $context);
        $data['operator'] = $object->getOperator();
        $values = array();
        foreach ($object->getOperand() as $key => $value) {
            $values[$key] = $value;
        }
        $data['operand'] = $values;
        $values_1 = array();
        foreach ($object->getPredicates() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $data['predicates'] = $values_1;
        foreach ($object as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_2;
            }
        }
        return $data;
    }
}
