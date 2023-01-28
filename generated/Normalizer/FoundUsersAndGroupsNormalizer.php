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

class FoundUsersAndGroupsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\FoundUsersAndGroups';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\FoundUsersAndGroups';
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
        $object = new \JiraSdk\Model\FoundUsersAndGroups();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('users', $data)) {
            $object->setUsers($this->denormalizer->denormalize($data['users'], 'JiraSdk\\Model\\FoundUsers', 'json', $context));
        }
        if (\array_key_exists('groups', $data)) {
            $object->setGroups($this->denormalizer->denormalize($data['groups'], 'JiraSdk\\Model\\FoundGroups', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('users') && null !== $object->getUsers()) {
            $data['users'] = $this->normalizer->normalize($object->getUsers(), 'json', $context);
        }
        if ($object->isInitialized('groups') && null !== $object->getGroups()) {
            $data['groups'] = $this->normalizer->normalize($object->getGroups(), 'json', $context);
        }
        return $data;
    }
}
