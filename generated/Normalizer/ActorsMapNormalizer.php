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

class ActorsMapNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\ActorsMap';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\ActorsMap';
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
        $object = new \JiraSdk\Model\ActorsMap();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('user', $data)) {
            $values = array();
            foreach ($data['user'] as $value) {
                $values[] = $value;
            }
            $object->setUser($values);
        }
        if (\array_key_exists('group', $data)) {
            $values_1 = array();
            foreach ($data['group'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setGroup($values_1);
        }
        if (\array_key_exists('groupId', $data)) {
            $values_2 = array();
            foreach ($data['groupId'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setGroupId($values_2);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('user') && null !== $object->getUser()) {
            $values = array();
            foreach ($object->getUser() as $value) {
                $values[] = $value;
            }
            $data['user'] = $values;
        }
        if ($object->isInitialized('group') && null !== $object->getGroup()) {
            $values_1 = array();
            foreach ($object->getGroup() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['group'] = $values_1;
        }
        if ($object->isInitialized('groupId') && null !== $object->getGroupId()) {
            $values_2 = array();
            foreach ($object->getGroupId() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['groupId'] = $values_2;
        }
        return $data;
    }
}
