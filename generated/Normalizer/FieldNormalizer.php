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

class FieldNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\Field';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\Field';
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
        $object = new \JiraSdk\Model\Field();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('schema', $data)) {
            $object->setSchema($this->denormalizer->denormalize($data['schema'], 'JiraSdk\\Model\\JsonTypeBean', 'json', $context));
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('key', $data)) {
            $object->setKey($data['key']);
        }
        if (\array_key_exists('isLocked', $data)) {
            $object->setIsLocked($data['isLocked']);
        }
        if (\array_key_exists('isUnscreenable', $data)) {
            $object->setIsUnscreenable($data['isUnscreenable']);
        }
        if (\array_key_exists('searcherKey', $data)) {
            $object->setSearcherKey($data['searcherKey']);
        }
        if (\array_key_exists('screensCount', $data)) {
            $object->setScreensCount($data['screensCount']);
        }
        if (\array_key_exists('contextsCount', $data)) {
            $object->setContextsCount($data['contextsCount']);
        }
        if (\array_key_exists('projectsCount', $data)) {
            $object->setProjectsCount($data['projectsCount']);
        }
        if (\array_key_exists('lastUsed', $data)) {
            $object->setLastUsed($this->denormalizer->denormalize($data['lastUsed'], 'JiraSdk\\Model\\FieldLastUsed', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['id'] = $object->getId();
        $data['name'] = $object->getName();
        $data['schema'] = $this->normalizer->normalize($object->getSchema(), 'json', $context);
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if ($object->isInitialized('key') && null !== $object->getKey()) {
            $data['key'] = $object->getKey();
        }
        if ($object->isInitialized('isLocked') && null !== $object->getIsLocked()) {
            $data['isLocked'] = $object->getIsLocked();
        }
        if ($object->isInitialized('isUnscreenable') && null !== $object->getIsUnscreenable()) {
            $data['isUnscreenable'] = $object->getIsUnscreenable();
        }
        if ($object->isInitialized('searcherKey') && null !== $object->getSearcherKey()) {
            $data['searcherKey'] = $object->getSearcherKey();
        }
        if ($object->isInitialized('screensCount') && null !== $object->getScreensCount()) {
            $data['screensCount'] = $object->getScreensCount();
        }
        if ($object->isInitialized('contextsCount') && null !== $object->getContextsCount()) {
            $data['contextsCount'] = $object->getContextsCount();
        }
        if ($object->isInitialized('projectsCount') && null !== $object->getProjectsCount()) {
            $data['projectsCount'] = $object->getProjectsCount();
        }
        if ($object->isInitialized('lastUsed') && null !== $object->getLastUsed()) {
            $data['lastUsed'] = $this->normalizer->normalize($object->getLastUsed(), 'json', $context);
        }
        return $data;
    }
}
