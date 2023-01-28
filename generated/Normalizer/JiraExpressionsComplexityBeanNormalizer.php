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

class JiraExpressionsComplexityBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\JiraExpressionsComplexityBean';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\JiraExpressionsComplexityBean';
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
        $object = new \JiraSdk\Model\JiraExpressionsComplexityBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('steps', $data)) {
            $object->setSteps($this->denormalizer->denormalize($data['steps'], 'JiraSdk\\Model\\JiraExpressionsComplexityBeanSteps', 'json', $context));
        }
        if (\array_key_exists('expensiveOperations', $data)) {
            $object->setExpensiveOperations($this->denormalizer->denormalize($data['expensiveOperations'], 'JiraSdk\\Model\\JiraExpressionsComplexityBeanExpensiveOperations', 'json', $context));
        }
        if (\array_key_exists('beans', $data)) {
            $object->setBeans($this->denormalizer->denormalize($data['beans'], 'JiraSdk\\Model\\JiraExpressionsComplexityBeanBeans', 'json', $context));
        }
        if (\array_key_exists('primitiveValues', $data)) {
            $object->setPrimitiveValues($this->denormalizer->denormalize($data['primitiveValues'], 'JiraSdk\\Model\\JiraExpressionsComplexityBeanPrimitiveValues', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['steps'] = $this->normalizer->normalize($object->getSteps(), 'json', $context);
        $data['expensiveOperations'] = $this->normalizer->normalize($object->getExpensiveOperations(), 'json', $context);
        $data['beans'] = $this->normalizer->normalize($object->getBeans(), 'json', $context);
        $data['primitiveValues'] = $this->normalizer->normalize($object->getPrimitiveValues(), 'json', $context);
        return $data;
    }
}
