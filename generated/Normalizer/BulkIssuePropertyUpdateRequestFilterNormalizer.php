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

class BulkIssuePropertyUpdateRequestFilterNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\BulkIssuePropertyUpdateRequestFilter';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\BulkIssuePropertyUpdateRequestFilter';
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
        $object = new \JiraSdk\Model\BulkIssuePropertyUpdateRequestFilter();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('entityIds', $data)) {
            $values = array();
            foreach ($data['entityIds'] as $value) {
                $values[] = $value;
            }
            $object->setEntityIds($values);
            unset($data['entityIds']);
        }
        if (\array_key_exists('currentValue', $data)) {
            $object->setCurrentValue($data['currentValue']);
            unset($data['currentValue']);
        }
        if (\array_key_exists('hasProperty', $data)) {
            $object->setHasProperty($data['hasProperty']);
            unset($data['hasProperty']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        if ($object->isInitialized('entityIds') && null !== $object->getEntityIds()) {
            $values = array();
            foreach ($object->getEntityIds() as $value) {
                $values[] = $value;
            }
            $data['entityIds'] = $values;
        }
        if ($object->isInitialized('currentValue') && null !== $object->getCurrentValue()) {
            $data['currentValue'] = $object->getCurrentValue();
        }
        if ($object->isInitialized('hasProperty') && null !== $object->getHasProperty()) {
            $data['hasProperty'] = $object->getHasProperty();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}
