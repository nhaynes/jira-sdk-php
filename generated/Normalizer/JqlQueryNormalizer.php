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

class JqlQueryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\JqlQuery';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\JqlQuery';
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
        $object = new \JiraSdk\Model\JqlQuery();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('where', $data)) {
            $value = $data['where'];
            if (is_array($data['where']) and isset($data['where']['clauses']) and (isset($data['where']['operator']) and ($data['where']['operator'] == 'and' or $data['where']['operator'] == 'or' or $data['where']['operator'] == 'not'))) {
                $value = $this->denormalizer->denormalize($data['where'], 'JiraSdk\\Model\\CompoundClause', 'json', $context);
            } elseif (is_array($data['where']) and isset($data['where']['field']) and (isset($data['where']['operator']) and ($data['where']['operator'] == '=' or $data['where']['operator'] == '!=' or $data['where']['operator'] == '>' or $data['where']['operator'] == '<' or $data['where']['operator'] == '>=' or $data['where']['operator'] == '<=' or $data['where']['operator'] == 'in' or $data['where']['operator'] == 'not in' or $data['where']['operator'] == '~' or $data['where']['operator'] == '~=' or $data['where']['operator'] == 'is' or $data['where']['operator'] == 'is not')) and isset($data['where']['operand'])) {
                $value = $this->denormalizer->denormalize($data['where'], 'JiraSdk\\Model\\FieldValueClause', 'json', $context);
            } elseif (is_array($data['where']) and isset($data['where']['field']) and (isset($data['where']['operator']) and ($data['where']['operator'] == 'was' or $data['where']['operator'] == 'was in' or $data['where']['operator'] == 'was not in' or $data['where']['operator'] == 'was not')) and isset($data['where']['operand']) and isset($data['where']['predicates'])) {
                $value = $this->denormalizer->denormalize($data['where'], 'JiraSdk\\Model\\FieldWasClause', 'json', $context);
            } elseif (is_array($data['where']) and isset($data['where']['field']) and (isset($data['where']['operator']) and $data['where']['operator'] == 'changed') and isset($data['where']['predicates'])) {
                $value = $this->denormalizer->denormalize($data['where'], 'JiraSdk\\Model\\FieldChangedClause', 'json', $context);
            }
            $object->setWhere($value);
        }
        if (\array_key_exists('orderBy', $data)) {
            $object->setOrderBy($this->denormalizer->denormalize($data['orderBy'], 'JiraSdk\\Model\\JqlQueryOrderByClause', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('where') && null !== $object->getWhere()) {
            $value = $object->getWhere();
            if (is_object($object->getWhere())) {
                $value = $this->normalizer->normalize($object->getWhere(), 'json', $context);
            } elseif (is_object($object->getWhere())) {
                $value = $this->normalizer->normalize($object->getWhere(), 'json', $context);
            } elseif (is_object($object->getWhere())) {
                $value = $this->normalizer->normalize($object->getWhere(), 'json', $context);
            } elseif (is_object($object->getWhere())) {
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
