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

class NotificationSchemeEventNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\NotificationSchemeEvent';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\NotificationSchemeEvent';
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
        $object = new \JiraSdk\Model\NotificationSchemeEvent();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('event', $data)) {
            $object->setEvent($this->denormalizer->denormalize($data['event'], 'JiraSdk\\Model\\NotificationEvent', 'json', $context));
        }
        if (\array_key_exists('notifications', $data)) {
            $values = array();
            foreach ($data['notifications'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\EventNotification', 'json', $context);
            }
            $object->setNotifications($values);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('event') && null !== $object->getEvent()) {
            $data['event'] = $this->normalizer->normalize($object->getEvent(), 'json', $context);
        }
        if ($object->isInitialized('notifications') && null !== $object->getNotifications()) {
            $values = array();
            foreach ($object->getNotifications() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['notifications'] = $values;
        }
        return $data;
    }
}
