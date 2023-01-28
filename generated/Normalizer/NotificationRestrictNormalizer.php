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

class NotificationRestrictNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\NotificationRestrict';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\NotificationRestrict';
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
        $object = new \JiraSdk\Model\NotificationRestrict();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('groups', $data)) {
            $values = array();
            foreach ($data['groups'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\GroupName', 'json', $context);
            }
            $object->setGroups($values);
            unset($data['groups']);
        }
        if (\array_key_exists('groupIds', $data)) {
            $values_1 = array();
            foreach ($data['groupIds'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setGroupIds($values_1);
            unset($data['groupIds']);
        }
        if (\array_key_exists('permissions', $data)) {
            $values_2 = array();
            foreach ($data['permissions'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'JiraSdk\\Model\\RestrictedPermission', 'json', $context);
            }
            $object->setPermissions($values_2);
            unset($data['permissions']);
        }
        foreach ($data as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_3;
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
        if ($object->isInitialized('groups') && null !== $object->getGroups()) {
            $values = array();
            foreach ($object->getGroups() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['groups'] = $values;
        }
        if ($object->isInitialized('groupIds') && null !== $object->getGroupIds()) {
            $values_1 = array();
            foreach ($object->getGroupIds() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['groupIds'] = $values_1;
        }
        if ($object->isInitialized('permissions') && null !== $object->getPermissions()) {
            $values_2 = array();
            foreach ($object->getPermissions() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['permissions'] = $values_2;
        }
        foreach ($object as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_3;
            }
        }
        return $data;
    }
}
