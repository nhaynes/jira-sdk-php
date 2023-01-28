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

class IssueEntityPropertiesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\IssueEntityProperties';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\IssueEntityProperties';
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
        $object = new \JiraSdk\Model\IssueEntityProperties();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('entitiesIds', $data)) {
            $values = array();
            foreach ($data['entitiesIds'] as $value) {
                $values[] = $value;
            }
            $object->setEntitiesIds($values);
        }
        if (\array_key_exists('properties', $data)) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['properties'] as $key => $value_1) {
                $values_1[$key] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\JsonNode', 'json', $context);
            }
            $object->setProperties($values_1);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('entitiesIds') && null !== $object->getEntitiesIds()) {
            $values = array();
            foreach ($object->getEntitiesIds() as $value) {
                $values[] = $value;
            }
            $data['entitiesIds'] = $values;
        }
        if ($object->isInitialized('properties') && null !== $object->getProperties()) {
            $values_1 = array();
            foreach ($object->getProperties() as $key => $value_1) {
                $values_1[$key] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['properties'] = $values_1;
        }
        return $data;
    }
}
