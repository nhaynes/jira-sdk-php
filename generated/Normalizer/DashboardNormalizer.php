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

class DashboardNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\Dashboard';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\Dashboard';
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
        $object = new \JiraSdk\Model\Dashboard();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('isFavourite', $data)) {
            $object->setIsFavourite($data['isFavourite']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('owner', $data)) {
            $object->setOwner($this->denormalizer->denormalize($data['owner'], 'JiraSdk\\Model\\DashboardOwner', 'json', $context));
        }
        if (\array_key_exists('popularity', $data)) {
            $object->setPopularity($data['popularity']);
        }
        if (\array_key_exists('rank', $data)) {
            $object->setRank($data['rank']);
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
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
        if (\array_key_exists('automaticRefreshMs', $data)) {
            $object->setAutomaticRefreshMs($data['automaticRefreshMs']);
        }
        if (\array_key_exists('view', $data)) {
            $object->setView($data['view']);
        }
        if (\array_key_exists('isWritable', $data)) {
            $object->setIsWritable($data['isWritable']);
        }
        if (\array_key_exists('systemDashboard', $data)) {
            $object->setSystemDashboard($data['systemDashboard']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        return $data;
    }
}
