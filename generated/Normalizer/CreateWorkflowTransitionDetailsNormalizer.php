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

class CreateWorkflowTransitionDetailsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\CreateWorkflowTransitionDetails';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\CreateWorkflowTransitionDetails';
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
        $object = new \JiraSdk\Model\CreateWorkflowTransitionDetails();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('from', $data)) {
            $values = array();
            foreach ($data['from'] as $value) {
                $values[] = $value;
            }
            $object->setFrom($values);
        }
        if (\array_key_exists('to', $data)) {
            $object->setTo($data['to']);
        }
        if (\array_key_exists('type', $data)) {
            $object->setType($data['type']);
        }
        if (\array_key_exists('rules', $data)) {
            $object->setRules($this->denormalizer->denormalize($data['rules'], 'JiraSdk\\Model\\CreateWorkflowTransitionDetailsRules', 'json', $context));
        }
        if (\array_key_exists('screen', $data)) {
            $object->setScreen($this->denormalizer->denormalize($data['screen'], 'JiraSdk\\Model\\CreateWorkflowTransitionDetailsScreen', 'json', $context));
        }
        if (\array_key_exists('properties', $data)) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['properties'] as $key => $value_1) {
                $values_1[$key] = $value_1;
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
        $data['name'] = $object->getName();
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if ($object->isInitialized('from') && null !== $object->getFrom()) {
            $values = array();
            foreach ($object->getFrom() as $value) {
                $values[] = $value;
            }
            $data['from'] = $values;
        }
        $data['to'] = $object->getTo();
        $data['type'] = $object->getType();
        if ($object->isInitialized('rules') && null !== $object->getRules()) {
            $data['rules'] = $this->normalizer->normalize($object->getRules(), 'json', $context);
        }
        if ($object->isInitialized('screen') && null !== $object->getScreen()) {
            $data['screen'] = $this->normalizer->normalize($object->getScreen(), 'json', $context);
        }
        if ($object->isInitialized('properties') && null !== $object->getProperties()) {
            $values_1 = array();
            foreach ($object->getProperties() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $data['properties'] = $values_1;
        }
        return $data;
    }
}
