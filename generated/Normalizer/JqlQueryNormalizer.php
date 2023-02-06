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

class JqlQueryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\JqlQuery' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\JqlQuery' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\JqlQuery();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('where', $data)) {
            $value = $data['where'];
            if (\is_array($data['where']) && isset($data['where']['clauses']) && (isset($data['where']['operator']) && ('and' == $data['where']['operator'] || 'or' == $data['where']['operator'] || 'not' == $data['where']['operator']))) {
                $value = $this->denormalizer->denormalize($data['where'], 'JiraSdk\\Api\\Model\\CompoundClause', 'json', $context);
            } elseif (\is_array($data['where']) && isset($data['where']['field']) && (isset($data['where']['operator']) && ('=' == $data['where']['operator'] || '!=' == $data['where']['operator'] || '>' == $data['where']['operator'] || '<' == $data['where']['operator'] || '>=' == $data['where']['operator'] || '<=' == $data['where']['operator'] || 'in' == $data['where']['operator'] || 'not in' == $data['where']['operator'] || '~' == $data['where']['operator'] || '~=' == $data['where']['operator'] || 'is' == $data['where']['operator'] || 'is not' == $data['where']['operator'])) && isset($data['where']['operand'])) {
                $value = $this->denormalizer->denormalize($data['where'], 'JiraSdk\\Api\\Model\\FieldValueClause', 'json', $context);
            } elseif (\is_array($data['where']) && isset($data['where']['field']) && (isset($data['where']['operator']) && ('was' == $data['where']['operator'] || 'was in' == $data['where']['operator'] || 'was not in' == $data['where']['operator'] || 'was not' == $data['where']['operator'])) && isset($data['where']['operand'], $data['where']['predicates'])) {
                $value = $this->denormalizer->denormalize($data['where'], 'JiraSdk\\Api\\Model\\FieldWasClause', 'json', $context);
            } elseif (\is_array($data['where']) && isset($data['where']['field']) && (isset($data['where']['operator']) && 'changed' == $data['where']['operator']) && isset($data['where']['predicates'])) {
                $value = $this->denormalizer->denormalize($data['where'], 'JiraSdk\\Api\\Model\\FieldChangedClause', 'json', $context);
            }
            $object->setWhere($value);
        }
        if (\array_key_exists('orderBy', $data)) {
            $object->setOrderBy($this->denormalizer->denormalize($data['orderBy'], 'JiraSdk\\Api\\Model\\JqlQueryOrderByClause', 'json', $context));
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('where') && null !== $object->getWhere()) {
            $value = $object->getWhere();
            if (\is_object($object->getWhere())) {
                $value = $this->normalizer->normalize($object->getWhere(), 'json', $context);
            } elseif (\is_object($object->getWhere())) {
                $value = $this->normalizer->normalize($object->getWhere(), 'json', $context);
            } elseif (\is_object($object->getWhere())) {
                $value = $this->normalizer->normalize($object->getWhere(), 'json', $context);
            } elseif (\is_object($object->getWhere())) {
                $value = $this->normalizer->normalize($object->getWhere(), 'json', $context);
            }
            $data['where'] = $value;
        }
        if ($object->isInitialized('orderBy') && null !== $object->getOrderBy()) {
            $data['orderBy'] = $this->normalizer->normalize($object->getOrderBy(), 'json', $context);
        }

        return $data;
    }
}
