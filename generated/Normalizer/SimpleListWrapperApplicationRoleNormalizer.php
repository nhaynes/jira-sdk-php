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

class SimpleListWrapperApplicationRoleNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\SimpleListWrapperApplicationRole';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\SimpleListWrapperApplicationRole';
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
        $object = new \JiraSdk\Model\SimpleListWrapperApplicationRole();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('size', $data)) {
            $object->setSize($data['size']);
        }
        if (\array_key_exists('items', $data)) {
            $values = array();
            foreach ($data['items'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\ApplicationRole', 'json', $context);
            }
            $object->setItems($values);
        }
        if (\array_key_exists('pagingCallback', $data)) {
            $object->setPagingCallback($data['pagingCallback']);
        }
        if (\array_key_exists('callback', $data)) {
            $object->setCallback($data['callback']);
        }
        if (\array_key_exists('max-results', $data)) {
            $object->setMaxResults($data['max-results']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('size') && null !== $object->getSize()) {
            $data['size'] = $object->getSize();
        }
        if ($object->isInitialized('items') && null !== $object->getItems()) {
            $values = array();
            foreach ($object->getItems() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['items'] = $values;
        }
        if ($object->isInitialized('pagingCallback') && null !== $object->getPagingCallback()) {
            $data['pagingCallback'] = $object->getPagingCallback();
        }
        if ($object->isInitialized('callback') && null !== $object->getCallback()) {
            $data['callback'] = $object->getCallback();
        }
        if ($object->isInitialized('maxResults') && null !== $object->getMaxResults()) {
            $data['max-results'] = $object->getMaxResults();
        }
        return $data;
    }
}
