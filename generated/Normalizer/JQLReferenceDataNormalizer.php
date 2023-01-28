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

class JQLReferenceDataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\JQLReferenceData';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\JQLReferenceData';
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
        $object = new \JiraSdk\Model\JQLReferenceData();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('visibleFieldNames', $data)) {
            $values = array();
            foreach ($data['visibleFieldNames'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\FieldReferenceData', 'json', $context);
            }
            $object->setVisibleFieldNames($values);
        }
        if (\array_key_exists('visibleFunctionNames', $data)) {
            $values_1 = array();
            foreach ($data['visibleFunctionNames'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\FunctionReferenceData', 'json', $context);
            }
            $object->setVisibleFunctionNames($values_1);
        }
        if (\array_key_exists('jqlReservedWords', $data)) {
            $values_2 = array();
            foreach ($data['jqlReservedWords'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setJqlReservedWords($values_2);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('visibleFieldNames') && null !== $object->getVisibleFieldNames()) {
            $values = array();
            foreach ($object->getVisibleFieldNames() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['visibleFieldNames'] = $values;
        }
        if ($object->isInitialized('visibleFunctionNames') && null !== $object->getVisibleFunctionNames()) {
            $values_1 = array();
            foreach ($object->getVisibleFunctionNames() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['visibleFunctionNames'] = $values_1;
        }
        if ($object->isInitialized('jqlReservedWords') && null !== $object->getJqlReservedWords()) {
            $values_2 = array();
            foreach ($object->getJqlReservedWords() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['jqlReservedWords'] = $values_2;
        }
        return $data;
    }
}
