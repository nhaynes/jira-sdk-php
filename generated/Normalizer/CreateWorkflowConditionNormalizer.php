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

class CreateWorkflowConditionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\CreateWorkflowCondition';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\CreateWorkflowCondition';
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
        $object = new \JiraSdk\Model\CreateWorkflowCondition();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('operator', $data)) {
            $object->setOperator($data['operator']);
        }
        if (\array_key_exists('conditions', $data)) {
            $values = array();
            foreach ($data['conditions'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\CreateWorkflowCondition', 'json', $context);
            }
            $object->setConditions($values);
        }
        if (\array_key_exists('type', $data)) {
            $object->setType($data['type']);
        }
        if (\array_key_exists('configuration', $data)) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['configuration'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setConfiguration($values_1);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('operator') && null !== $object->getOperator()) {
            $data['operator'] = $object->getOperator();
        }
        if ($object->isInitialized('conditions') && null !== $object->getConditions()) {
            $values = array();
            foreach ($object->getConditions() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['conditions'] = $values;
        }
        if ($object->isInitialized('type') && null !== $object->getType()) {
            $data['type'] = $object->getType();
        }
        if ($object->isInitialized('configuration') && null !== $object->getConfiguration()) {
            $values_1 = array();
            foreach ($object->getConfiguration() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $data['configuration'] = $values_1;
        }
        return $data;
    }
}
