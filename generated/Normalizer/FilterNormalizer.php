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

class FilterNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\Filter';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\Filter';
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
        $object = new \JiraSdk\Model\Filter();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('owner', $data)) {
            $object->setOwner($this->denormalizer->denormalize($data['owner'], 'JiraSdk\\Model\\FilterOwner', 'json', $context));
        }
        if (\array_key_exists('jql', $data)) {
            $object->setJql($data['jql']);
        }
        if (\array_key_exists('viewUrl', $data)) {
            $object->setViewUrl($data['viewUrl']);
        }
        if (\array_key_exists('searchUrl', $data)) {
            $object->setSearchUrl($data['searchUrl']);
        }
        if (\array_key_exists('favourite', $data)) {
            $object->setFavourite($data['favourite']);
        }
        if (\array_key_exists('favouritedCount', $data)) {
            $object->setFavouritedCount($data['favouritedCount']);
        }
        if (\array_key_exists('sharePermissions', $data)) {
            $values = array();
            foreach ($data['sharePermissions'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\SharePermission', 'json', $context);
            }
            $object->setSharePermissions($values);
        }
        if (\array_key_exists('editPermissions', $data)) {
            $values_1 = array();
            foreach ($data['editPermissions'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\SharePermission', 'json', $context);
            }
            $object->setEditPermissions($values_1);
        }
        if (\array_key_exists('sharedUsers', $data)) {
            $object->setSharedUsers($this->denormalizer->denormalize($data['sharedUsers'], 'JiraSdk\\Model\\FilterSharedUsers', 'json', $context));
        }
        if (\array_key_exists('subscriptions', $data)) {
            $object->setSubscriptions($this->denormalizer->denormalize($data['subscriptions'], 'JiraSdk\\Model\\FilterSubscriptions', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['name'] = $object->getName();
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if ($object->isInitialized('jql') && null !== $object->getJql()) {
            $data['jql'] = $object->getJql();
        }
        if ($object->isInitialized('favourite') && null !== $object->getFavourite()) {
            $data['favourite'] = $object->getFavourite();
        }
        if ($object->isInitialized('sharePermissions') && null !== $object->getSharePermissions()) {
            $values = array();
            foreach ($object->getSharePermissions() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['sharePermissions'] = $values;
        }
        if ($object->isInitialized('editPermissions') && null !== $object->getEditPermissions()) {
            $values_1 = array();
            foreach ($object->getEditPermissions() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['editPermissions'] = $values_1;
        }
        return $data;
    }
}
