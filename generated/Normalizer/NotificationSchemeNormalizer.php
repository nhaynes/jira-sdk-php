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

class NotificationSchemeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\NotificationScheme';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\NotificationScheme';
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
        $object = new \JiraSdk\Model\NotificationScheme();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('expand', $data)) {
            $object->setExpand($data['expand']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('notificationSchemeEvents', $data)) {
            $values = array();
            foreach ($data['notificationSchemeEvents'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\NotificationSchemeEvent', 'json', $context);
            }
            $object->setNotificationSchemeEvents($values);
        }
        if (\array_key_exists('scope', $data)) {
            $object->setScope($this->denormalizer->denormalize($data['scope'], 'JiraSdk\\Model\\NotificationSchemeScope', 'json', $context));
        }
        if (\array_key_exists('projects', $data)) {
            $values_1 = array();
            foreach ($data['projects'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setProjects($values_1);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('expand') && null !== $object->getExpand()) {
            $data['expand'] = $object->getExpand();
        }
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if ($object->isInitialized('self') && null !== $object->getSelf()) {
            $data['self'] = $object->getSelf();
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if ($object->isInitialized('notificationSchemeEvents') && null !== $object->getNotificationSchemeEvents()) {
            $values = array();
            foreach ($object->getNotificationSchemeEvents() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['notificationSchemeEvents'] = $values;
        }
        if ($object->isInitialized('scope') && null !== $object->getScope()) {
            $data['scope'] = $this->normalizer->normalize($object->getScope(), 'json', $context);
        }
        if ($object->isInitialized('projects') && null !== $object->getProjects()) {
            $values_1 = array();
            foreach ($object->getProjects() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['projects'] = $values_1;
        }
        return $data;
    }
}
