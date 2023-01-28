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

class SanitizedJqlQueryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\SanitizedJqlQuery';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\SanitizedJqlQuery';
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
        $object = new \JiraSdk\Model\SanitizedJqlQuery();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('initialQuery', $data)) {
            $object->setInitialQuery($data['initialQuery']);
        }
        if (\array_key_exists('sanitizedQuery', $data) && $data['sanitizedQuery'] !== null) {
            $object->setSanitizedQuery($data['sanitizedQuery']);
        } elseif (\array_key_exists('sanitizedQuery', $data) && $data['sanitizedQuery'] === null) {
            $object->setSanitizedQuery(null);
        }
        if (\array_key_exists('errors', $data)) {
            $object->setErrors($this->denormalizer->denormalize($data['errors'], 'JiraSdk\\Model\\SanitizedJqlQueryErrors', 'json', $context));
        }
        if (\array_key_exists('accountId', $data) && $data['accountId'] !== null) {
            $object->setAccountId($data['accountId']);
        } elseif (\array_key_exists('accountId', $data) && $data['accountId'] === null) {
            $object->setAccountId(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('initialQuery') && null !== $object->getInitialQuery()) {
            $data['initialQuery'] = $object->getInitialQuery();
        }
        if ($object->isInitialized('sanitizedQuery') && null !== $object->getSanitizedQuery()) {
            $data['sanitizedQuery'] = $object->getSanitizedQuery();
        }
        if ($object->isInitialized('errors') && null !== $object->getErrors()) {
            $data['errors'] = $this->normalizer->normalize($object->getErrors(), 'json', $context);
        }
        if ($object->isInitialized('accountId') && null !== $object->getAccountId()) {
            $data['accountId'] = $object->getAccountId();
        }
        return $data;
    }
}
