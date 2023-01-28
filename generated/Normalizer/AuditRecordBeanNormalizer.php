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

class AuditRecordBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\AuditRecordBean';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\AuditRecordBean';
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
        $object = new \JiraSdk\Model\AuditRecordBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('summary', $data)) {
            $object->setSummary($data['summary']);
        }
        if (\array_key_exists('remoteAddress', $data)) {
            $object->setRemoteAddress($data['remoteAddress']);
        }
        if (\array_key_exists('authorKey', $data)) {
            $object->setAuthorKey($data['authorKey']);
        }
        if (\array_key_exists('created', $data)) {
            $object->setCreated(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['created']));
        }
        if (\array_key_exists('category', $data)) {
            $object->setCategory($data['category']);
        }
        if (\array_key_exists('eventSource', $data)) {
            $object->setEventSource($data['eventSource']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('objectItem', $data)) {
            $object->setObjectItem($this->denormalizer->denormalize($data['objectItem'], 'JiraSdk\\Model\\AssociatedItemBean', 'json', $context));
        }
        if (\array_key_exists('changedValues', $data)) {
            $values = array();
            foreach ($data['changedValues'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\ChangedValueBean', 'json', $context);
            }
            $object->setChangedValues($values);
        }
        if (\array_key_exists('associatedItems', $data)) {
            $values_1 = array();
            foreach ($data['associatedItems'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\AssociatedItemBean', 'json', $context);
            }
            $object->setAssociatedItems($values_1);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('objectItem') && null !== $object->getObjectItem()) {
            $data['objectItem'] = $this->normalizer->normalize($object->getObjectItem(), 'json', $context);
        }
        return $data;
    }
}
