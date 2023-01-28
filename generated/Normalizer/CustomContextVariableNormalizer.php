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

class CustomContextVariableNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\CustomContextVariable';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\CustomContextVariable';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (array_key_exists('type', $data) and 'user' === $data['type']) {
            return $this->denormalizer->denormalize($data, 'JiraSdk\\Model\\UserContextVariable', $format, $context);
        }
        if (array_key_exists('type', $data) and 'issue' === $data['type']) {
            return $this->denormalizer->denormalize($data, 'JiraSdk\\Model\\IssueContextVariable', $format, $context);
        }
        if (array_key_exists('type', $data) and 'json' === $data['type']) {
            return $this->denormalizer->denormalize($data, 'JiraSdk\\Model\\JsonContextVariable', $format, $context);
        }
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Model\CustomContextVariable();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('type', $data)) {
            $object->setType($data['type']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getType() and 'user' === $object->getType()) {
            return $this->normalizer->normalize($object, $format, $context);
        }
        if (null !== $object->getType() and 'issue' === $object->getType()) {
            return $this->normalizer->normalize($object, $format, $context);
        }
        if (null !== $object->getType() and 'json' === $object->getType()) {
            return $this->normalizer->normalize($object, $format, $context);
        }
        $data['type'] = $object->getType();
        return $data;
    }
}
