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

class WorkflowTransitionRulesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\WorkflowTransitionRules';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\WorkflowTransitionRules';
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
        $object = new \JiraSdk\Model\WorkflowTransitionRules();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('workflowId', $data)) {
            $object->setWorkflowId($this->denormalizer->denormalize($data['workflowId'], 'JiraSdk\\Model\\WorkflowId', 'json', $context));
        }
        if (\array_key_exists('postFunctions', $data)) {
            $values = array();
            foreach ($data['postFunctions'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\ConnectWorkflowTransitionRule', 'json', $context);
            }
            $object->setPostFunctions($values);
        }
        if (\array_key_exists('conditions', $data)) {
            $values_1 = array();
            foreach ($data['conditions'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\ConnectWorkflowTransitionRule', 'json', $context);
            }
            $object->setConditions($values_1);
        }
        if (\array_key_exists('validators', $data)) {
            $values_2 = array();
            foreach ($data['validators'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'JiraSdk\\Model\\ConnectWorkflowTransitionRule', 'json', $context);
            }
            $object->setValidators($values_2);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['workflowId'] = $this->normalizer->normalize($object->getWorkflowId(), 'json', $context);
        if ($object->isInitialized('postFunctions') && null !== $object->getPostFunctions()) {
            $values = array();
            foreach ($object->getPostFunctions() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['postFunctions'] = $values;
        }
        if ($object->isInitialized('conditions') && null !== $object->getConditions()) {
            $values_1 = array();
            foreach ($object->getConditions() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['conditions'] = $values_1;
        }
        if ($object->isInitialized('validators') && null !== $object->getValidators()) {
            $values_2 = array();
            foreach ($object->getValidators() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['validators'] = $values_2;
        }
        return $data;
    }
}
