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

class ApplicationRoleNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\ApplicationRole';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\ApplicationRole';
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
        $object = new \JiraSdk\Model\ApplicationRole();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('key', $data)) {
            $object->setKey($data['key']);
        }
        if (\array_key_exists('groups', $data)) {
            $values = array();
            foreach ($data['groups'] as $value) {
                $values[] = $value;
            }
            $object->setGroups($values);
        }
        if (\array_key_exists('groupDetails', $data)) {
            $values_1 = array();
            foreach ($data['groupDetails'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\GroupName', 'json', $context);
            }
            $object->setGroupDetails($values_1);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('defaultGroups', $data)) {
            $values_2 = array();
            foreach ($data['defaultGroups'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setDefaultGroups($values_2);
        }
        if (\array_key_exists('defaultGroupsDetails', $data)) {
            $values_3 = array();
            foreach ($data['defaultGroupsDetails'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'JiraSdk\\Model\\GroupName', 'json', $context);
            }
            $object->setDefaultGroupsDetails($values_3);
        }
        if (\array_key_exists('selectedByDefault', $data)) {
            $object->setSelectedByDefault($data['selectedByDefault']);
        }
        if (\array_key_exists('defined', $data)) {
            $object->setDefined($data['defined']);
        }
        if (\array_key_exists('numberOfSeats', $data)) {
            $object->setNumberOfSeats($data['numberOfSeats']);
        }
        if (\array_key_exists('remainingSeats', $data)) {
            $object->setRemainingSeats($data['remainingSeats']);
        }
        if (\array_key_exists('userCount', $data)) {
            $object->setUserCount($data['userCount']);
        }
        if (\array_key_exists('userCountDescription', $data)) {
            $object->setUserCountDescription($data['userCountDescription']);
        }
        if (\array_key_exists('hasUnlimitedSeats', $data)) {
            $object->setHasUnlimitedSeats($data['hasUnlimitedSeats']);
        }
        if (\array_key_exists('platform', $data)) {
            $object->setPlatform($data['platform']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('key') && null !== $object->getKey()) {
            $data['key'] = $object->getKey();
        }
        if ($object->isInitialized('groups') && null !== $object->getGroups()) {
            $values = array();
            foreach ($object->getGroups() as $value) {
                $values[] = $value;
            }
            $data['groups'] = $values;
        }
        if ($object->isInitialized('groupDetails') && null !== $object->getGroupDetails()) {
            $values_1 = array();
            foreach ($object->getGroupDetails() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['groupDetails'] = $values_1;
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if ($object->isInitialized('defaultGroups') && null !== $object->getDefaultGroups()) {
            $values_2 = array();
            foreach ($object->getDefaultGroups() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['defaultGroups'] = $values_2;
        }
        if ($object->isInitialized('defaultGroupsDetails') && null !== $object->getDefaultGroupsDetails()) {
            $values_3 = array();
            foreach ($object->getDefaultGroupsDetails() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['defaultGroupsDetails'] = $values_3;
        }
        if ($object->isInitialized('selectedByDefault') && null !== $object->getSelectedByDefault()) {
            $data['selectedByDefault'] = $object->getSelectedByDefault();
        }
        if ($object->isInitialized('defined') && null !== $object->getDefined()) {
            $data['defined'] = $object->getDefined();
        }
        if ($object->isInitialized('numberOfSeats') && null !== $object->getNumberOfSeats()) {
            $data['numberOfSeats'] = $object->getNumberOfSeats();
        }
        if ($object->isInitialized('remainingSeats') && null !== $object->getRemainingSeats()) {
            $data['remainingSeats'] = $object->getRemainingSeats();
        }
        if ($object->isInitialized('userCount') && null !== $object->getUserCount()) {
            $data['userCount'] = $object->getUserCount();
        }
        if ($object->isInitialized('userCountDescription') && null !== $object->getUserCountDescription()) {
            $data['userCountDescription'] = $object->getUserCountDescription();
        }
        if ($object->isInitialized('hasUnlimitedSeats') && null !== $object->getHasUnlimitedSeats()) {
            $data['hasUnlimitedSeats'] = $object->getHasUnlimitedSeats();
        }
        if ($object->isInitialized('platform') && null !== $object->getPlatform()) {
            $data['platform'] = $object->getPlatform();
        }
        return $data;
    }
}
