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

class CreateWorkflowTransitionDetailsRulesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\CreateWorkflowTransitionDetailsRules';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\CreateWorkflowTransitionDetailsRules';
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
        $object = new \JiraSdk\Model\CreateWorkflowTransitionDetailsRules();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('conditions', $data)) {
            $object->setConditions($this->denormalizer->denormalize($data['conditions'], 'JiraSdk\\Model\\CreateWorkflowTransitionRulesDetailsConditions', 'json', $context));
            unset($data['conditions']);
        }
        if (\array_key_exists('validators', $data)) {
            $values = array();
            foreach ($data['validators'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\CreateWorkflowTransitionRule', 'json', $context);
            }
            $object->setValidators($values);
            unset($data['validators']);
        }
        if (\array_key_exists('postFunctions', $data)) {
            $values_1 = array();
            foreach ($data['postFunctions'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\CreateWorkflowTransitionRule', 'json', $context);
            }
            $object->setPostFunctions($values_1);
            unset($data['postFunctions']);
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
        if ($object->isInitialized('conditions') && null !== $object->getConditions()) {
            $data['conditions'] = $this->normalizer->normalize($object->getConditions(), 'json', $context);
        }
        if ($object->isInitialized('validators') && null !== $object->getValidators()) {
            $values = array();
            foreach ($object->getValidators() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['validators'] = $values;
        }
        if ($object->isInitialized('postFunctions') && null !== $object->getPostFunctions()) {
            $values_1 = array();
            foreach ($object->getPostFunctions() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['postFunctions'] = $values_1;
        }
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }
        return $data;
    }
}
