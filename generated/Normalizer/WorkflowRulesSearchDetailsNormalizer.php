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

class WorkflowRulesSearchDetailsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\WorkflowRulesSearchDetails';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\WorkflowRulesSearchDetails';
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
        $object = new \JiraSdk\Model\WorkflowRulesSearchDetails();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('workflowEntityId', $data)) {
            $object->setWorkflowEntityId($data['workflowEntityId']);
            unset($data['workflowEntityId']);
        }
        if (\array_key_exists('invalidRules', $data)) {
            $values = array();
            foreach ($data['invalidRules'] as $value) {
                $values[] = $value;
            }
            $object->setInvalidRules($values);
            unset($data['invalidRules']);
        }
        if (\array_key_exists('validRules', $data)) {
            $values_1 = array();
            foreach ($data['validRules'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\WorkflowTransitionRules', 'json', $context);
            }
            $object->setValidRules($values_1);
            unset($data['validRules']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
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
        if ($object->isInitialized('workflowEntityId') && null !== $object->getWorkflowEntityId()) {
            $data['workflowEntityId'] = $object->getWorkflowEntityId();
        }
        if ($object->isInitialized('invalidRules') && null !== $object->getInvalidRules()) {
            $values = array();
            foreach ($object->getInvalidRules() as $value) {
                $values[] = $value;
            }
            $data['invalidRules'] = $values;
        }
        if ($object->isInitialized('validRules') && null !== $object->getValidRules()) {
            $values_1 = array();
            foreach ($object->getValidRules() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['validRules'] = $values_1;
        }
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }
        return $data;
    }
}
