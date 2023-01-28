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

class FieldReferenceDataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\FieldReferenceData';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\FieldReferenceData';
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
        $object = new \JiraSdk\Model\FieldReferenceData();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('value', $data)) {
            $object->setValue($data['value']);
        }
        if (\array_key_exists('displayName', $data)) {
            $object->setDisplayName($data['displayName']);
        }
        if (\array_key_exists('orderable', $data)) {
            $object->setOrderable($data['orderable']);
        }
        if (\array_key_exists('searchable', $data)) {
            $object->setSearchable($data['searchable']);
        }
        if (\array_key_exists('deprecated', $data)) {
            $object->setDeprecated($data['deprecated']);
        }
        if (\array_key_exists('deprecatedSearcherKey', $data)) {
            $object->setDeprecatedSearcherKey($data['deprecatedSearcherKey']);
        }
        if (\array_key_exists('auto', $data)) {
            $object->setAuto($data['auto']);
        }
        if (\array_key_exists('cfid', $data)) {
            $object->setCfid($data['cfid']);
        }
        if (\array_key_exists('operators', $data)) {
            $values = array();
            foreach ($data['operators'] as $value) {
                $values[] = $value;
            }
            $object->setOperators($values);
        }
        if (\array_key_exists('types', $data)) {
            $values_1 = array();
            foreach ($data['types'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setTypes($values_1);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('value') && null !== $object->getValue()) {
            $data['value'] = $object->getValue();
        }
        if ($object->isInitialized('displayName') && null !== $object->getDisplayName()) {
            $data['displayName'] = $object->getDisplayName();
        }
        if ($object->isInitialized('orderable') && null !== $object->getOrderable()) {
            $data['orderable'] = $object->getOrderable();
        }
        if ($object->isInitialized('searchable') && null !== $object->getSearchable()) {
            $data['searchable'] = $object->getSearchable();
        }
        if ($object->isInitialized('deprecated') && null !== $object->getDeprecated()) {
            $data['deprecated'] = $object->getDeprecated();
        }
        if ($object->isInitialized('deprecatedSearcherKey') && null !== $object->getDeprecatedSearcherKey()) {
            $data['deprecatedSearcherKey'] = $object->getDeprecatedSearcherKey();
        }
        if ($object->isInitialized('auto') && null !== $object->getAuto()) {
            $data['auto'] = $object->getAuto();
        }
        if ($object->isInitialized('cfid') && null !== $object->getCfid()) {
            $data['cfid'] = $object->getCfid();
        }
        if ($object->isInitialized('operators') && null !== $object->getOperators()) {
            $values = array();
            foreach ($object->getOperators() as $value) {
                $values[] = $value;
            }
            $data['operators'] = $values;
        }
        if ($object->isInitialized('types') && null !== $object->getTypes()) {
            $values_1 = array();
            foreach ($object->getTypes() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['types'] = $values_1;
        }
        return $data;
    }
}
