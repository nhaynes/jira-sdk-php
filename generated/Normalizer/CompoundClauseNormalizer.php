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

class CompoundClauseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\CompoundClause';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\CompoundClause';
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
        $object = new \JiraSdk\Model\CompoundClause();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('clauses', $data)) {
            $values = array();
            foreach ($data['clauses'] as $value) {
                $value_1 = $value;
                if (is_array($value) and isset($value['clauses']) and (isset($value['operator']) and ($value['operator'] == 'and' or $value['operator'] == 'or' or $value['operator'] == 'not'))) {
                    $value_1 = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\CompoundClause', 'json', $context);
                } elseif (is_array($value) and isset($value['field']) and (isset($value['operator']) and ($value['operator'] == '=' or $value['operator'] == '!=' or $value['operator'] == '>' or $value['operator'] == '<' or $value['operator'] == '>=' or $value['operator'] == '<=' or $value['operator'] == 'in' or $value['operator'] == 'not in' or $value['operator'] == '~' or $value['operator'] == '~=' or $value['operator'] == 'is' or $value['operator'] == 'is not')) and isset($value['operand'])) {
                    $value_1 = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\FieldValueClause', 'json', $context);
                } elseif (is_array($value) and isset($value['field']) and (isset($value['operator']) and ($value['operator'] == 'was' or $value['operator'] == 'was in' or $value['operator'] == 'was not in' or $value['operator'] == 'was not')) and isset($value['operand']) and isset($value['predicates'])) {
                    $value_1 = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\FieldWasClause', 'json', $context);
                } elseif (is_array($value) and isset($value['field']) and (isset($value['operator']) and $value['operator'] == 'changed') and isset($value['predicates'])) {
                    $value_1 = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\FieldChangedClause', 'json', $context);
                }
                $values[] = $value_1;
            }
            $object->setClauses($values);
            unset($data['clauses']);
        }
        if (\array_key_exists('operator', $data)) {
            $object->setOperator($data['operator']);
            unset($data['operator']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
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
        $values = array();
        foreach ($object->getClauses() as $value) {
            $value_1 = $value;
            if (is_object($value)) {
                $value_1 = $this->normalizer->normalize($value, 'json', $context);
            } elseif (is_object($value)) {
                $value_1 = $this->normalizer->normalize($value, 'json', $context);
            } elseif (is_object($value)) {
                $value_1 = $this->normalizer->normalize($value, 'json', $context);
            } elseif (is_object($value)) {
                $value_1 = $this->normalizer->normalize($value, 'json', $context);
            }
            $values[] = $value_1;
        }
        $data['clauses'] = $values;
        $data['operator'] = $object->getOperator();
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }
        return $data;
    }
}
