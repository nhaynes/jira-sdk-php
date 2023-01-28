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

class FieldUpdateOperationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\FieldUpdateOperation';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\FieldUpdateOperation';
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
        $object = new \JiraSdk\Model\FieldUpdateOperation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('add', $data)) {
            $object->setAdd($data['add']);
        }
        if (\array_key_exists('set', $data)) {
            $object->setSet($data['set']);
        }
        if (\array_key_exists('remove', $data)) {
            $object->setRemove($data['remove']);
        }
        if (\array_key_exists('edit', $data)) {
            $object->setEdit($data['edit']);
        }
        if (\array_key_exists('copy', $data)) {
            $object->setCopy($data['copy']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('add') && null !== $object->getAdd()) {
            $data['add'] = $object->getAdd();
        }
        if ($object->isInitialized('set') && null !== $object->getSet()) {
            $data['set'] = $object->getSet();
        }
        if ($object->isInitialized('remove') && null !== $object->getRemove()) {
            $data['remove'] = $object->getRemove();
        }
        if ($object->isInitialized('edit') && null !== $object->getEdit()) {
            $data['edit'] = $object->getEdit();
        }
        if ($object->isInitialized('copy') && null !== $object->getCopy()) {
            $data['copy'] = $object->getCopy();
        }
        return $data;
    }
}
