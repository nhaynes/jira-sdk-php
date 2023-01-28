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

class NotificationToNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\NotificationTo';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\NotificationTo';
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
        $object = new \JiraSdk\Model\NotificationTo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('reporter', $data)) {
            $object->setReporter($data['reporter']);
            unset($data['reporter']);
        }
        if (\array_key_exists('assignee', $data)) {
            $object->setAssignee($data['assignee']);
            unset($data['assignee']);
        }
        if (\array_key_exists('watchers', $data)) {
            $object->setWatchers($data['watchers']);
            unset($data['watchers']);
        }
        if (\array_key_exists('voters', $data)) {
            $object->setVoters($data['voters']);
            unset($data['voters']);
        }
        if (\array_key_exists('users', $data)) {
            $values = array();
            foreach ($data['users'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\UserDetails', 'json', $context);
            }
            $object->setUsers($values);
            unset($data['users']);
        }
        if (\array_key_exists('groups', $data)) {
            $values_1 = array();
            foreach ($data['groups'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\GroupName', 'json', $context);
            }
            $object->setGroups($values_1);
            unset($data['groups']);
        }
        if (\array_key_exists('groupIds', $data)) {
            $values_2 = array();
            foreach ($data['groupIds'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setGroupIds($values_2);
            unset($data['groupIds']);
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
        if ($object->isInitialized('reporter') && null !== $object->getReporter()) {
            $data['reporter'] = $object->getReporter();
        }
        if ($object->isInitialized('assignee') && null !== $object->getAssignee()) {
            $data['assignee'] = $object->getAssignee();
        }
        if ($object->isInitialized('watchers') && null !== $object->getWatchers()) {
            $data['watchers'] = $object->getWatchers();
        }
        if ($object->isInitialized('voters') && null !== $object->getVoters()) {
            $data['voters'] = $object->getVoters();
        }
        if ($object->isInitialized('users') && null !== $object->getUsers()) {
            $values = array();
            foreach ($object->getUsers() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['users'] = $values;
        }
        if ($object->isInitialized('groups') && null !== $object->getGroups()) {
            $values_1 = array();
            foreach ($object->getGroups() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['groups'] = $values_1;
        }
        if ($object->isInitialized('groupIds') && null !== $object->getGroupIds()) {
            $values_2 = array();
            foreach ($object->getGroupIds() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['groupIds'] = $values_2;
        }
        foreach ($object as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_3;
            }
        }
        return $data;
    }
}
