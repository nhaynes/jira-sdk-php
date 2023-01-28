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

class WorkflowTransitionRulesUpdateErrorDetailsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\WorkflowTransitionRulesUpdateErrorDetails';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\WorkflowTransitionRulesUpdateErrorDetails';
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
        $object = new \JiraSdk\Model\WorkflowTransitionRulesUpdateErrorDetails();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('workflowId', $data)) {
            $object->setWorkflowId($this->denormalizer->denormalize($data['workflowId'], 'JiraSdk\\Model\\WorkflowId', 'json', $context));
        }
        if (\array_key_exists('ruleUpdateErrors', $data)) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['ruleUpdateErrors'] as $key => $value) {
                $values_1 = array();
                foreach ($value as $value_1) {
                    $values_1[] = $value_1;
                }
                $values[$key] = $values_1;
            }
            $object->setRuleUpdateErrors($values);
        }
        if (\array_key_exists('updateErrors', $data)) {
            $values_2 = array();
            foreach ($data['updateErrors'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setUpdateErrors($values_2);
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
        $values = array();
        foreach ($object->getRuleUpdateErrors() as $key => $value) {
            $values_1 = array();
            foreach ($value as $value_1) {
                $values_1[] = $value_1;
            }
            $values[$key] = $values_1;
        }
        $data['ruleUpdateErrors'] = $values;
        $values_2 = array();
        foreach ($object->getUpdateErrors() as $value_2) {
            $values_2[] = $value_2;
        }
        $data['updateErrors'] = $values_2;
        return $data;
    }
}
