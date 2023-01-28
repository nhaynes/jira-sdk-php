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

class IncludedFieldsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\IncludedFields';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\IncludedFields';
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
        $object = new \JiraSdk\Model\IncludedFields();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('actuallyIncluded', $data)) {
            $values = array();
            foreach ($data['actuallyIncluded'] as $value) {
                $values[] = $value;
            }
            $object->setActuallyIncluded($values);
        }
        if (\array_key_exists('excluded', $data)) {
            $values_1 = array();
            foreach ($data['excluded'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExcluded($values_1);
        }
        if (\array_key_exists('included', $data)) {
            $values_2 = array();
            foreach ($data['included'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setIncluded($values_2);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('actuallyIncluded') && null !== $object->getActuallyIncluded()) {
            $values = array();
            foreach ($object->getActuallyIncluded() as $value) {
                $values[] = $value;
            }
            $data['actuallyIncluded'] = $values;
        }
        if ($object->isInitialized('excluded') && null !== $object->getExcluded()) {
            $values_1 = array();
            foreach ($object->getExcluded() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['excluded'] = $values_1;
        }
        if ($object->isInitialized('included') && null !== $object->getIncluded()) {
            $values_2 = array();
            foreach ($object->getIncluded() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['included'] = $values_2;
        }
        return $data;
    }
}
