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

class RemoteIssueLinkRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\RemoteIssueLinkRequest';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\RemoteIssueLinkRequest';
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
        $object = new \JiraSdk\Model\RemoteIssueLinkRequest();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('globalId', $data)) {
            $object->setGlobalId($data['globalId']);
            unset($data['globalId']);
        }
        if (\array_key_exists('application', $data)) {
            $object->setApplication($this->denormalizer->denormalize($data['application'], 'JiraSdk\\Model\\RemoteIssueLinkRequestApplication', 'json', $context));
            unset($data['application']);
        }
        if (\array_key_exists('relationship', $data)) {
            $object->setRelationship($data['relationship']);
            unset($data['relationship']);
        }
        if (\array_key_exists('object', $data)) {
            $object->setObject($this->denormalizer->denormalize($data['object'], 'JiraSdk\\Model\\RemoteIssueLinkRequestObject', 'json', $context));
            unset($data['object']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
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
        if ($object->isInitialized('globalId') && null !== $object->getGlobalId()) {
            $data['globalId'] = $object->getGlobalId();
        }
        if ($object->isInitialized('application') && null !== $object->getApplication()) {
            $data['application'] = $this->normalizer->normalize($object->getApplication(), 'json', $context);
        }
        if ($object->isInitialized('relationship') && null !== $object->getRelationship()) {
            $data['relationship'] = $object->getRelationship();
        }
        $data['object'] = $this->normalizer->normalize($object->getObject(), 'json', $context);
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}
