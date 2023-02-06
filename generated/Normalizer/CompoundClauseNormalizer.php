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

class CompoundClauseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\CompoundClause' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\CompoundClause' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\CompoundClause();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('clauses', $data)) {
            $values = [];
            foreach ($data['clauses'] as $value) {
                $value_1 = $value;
                if (\is_array($value) && isset($value['clauses']) && (isset($value['operator']) && ('and' == $value['operator'] || 'or' == $value['operator'] || 'not' == $value['operator']))) {
                    $value_1 = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\CompoundClause', 'json', $context);
                } elseif (\is_array($value) && isset($value['field']) && (isset($value['operator']) && ('=' == $value['operator'] || '!=' == $value['operator'] || '>' == $value['operator'] || '<' == $value['operator'] || '>=' == $value['operator'] || '<=' == $value['operator'] || 'in' == $value['operator'] || 'not in' == $value['operator'] || '~' == $value['operator'] || '~=' == $value['operator'] || 'is' == $value['operator'] || 'is not' == $value['operator'])) && isset($value['operand'])) {
                    $value_1 = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\FieldValueClause', 'json', $context);
                } elseif (\is_array($value) && isset($value['field']) && (isset($value['operator']) && ('was' == $value['operator'] || 'was in' == $value['operator'] || 'was not in' == $value['operator'] || 'was not' == $value['operator'])) && isset($value['operand'], $value['predicates'])) {
                    $value_1 = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\FieldWasClause', 'json', $context);
                } elseif (\is_array($value) && isset($value['field']) && (isset($value['operator']) && 'changed' == $value['operator']) && isset($value['predicates'])) {
                    $value_1 = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\FieldChangedClause', 'json', $context);
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
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $values = [];
        foreach ($object->getClauses() as $value) {
            $value_1 = $value;
            if (\is_object($value)) {
                $value_1 = $this->normalizer->normalize($value, 'json', $context);
            } elseif (\is_object($value)) {
                $value_1 = $this->normalizer->normalize($value, 'json', $context);
            } elseif (\is_object($value)) {
                $value_1 = $this->normalizer->normalize($value, 'json', $context);
            } elseif (\is_object($value)) {
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
