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

class JiraExpressionEvaluationMetaDataBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\JiraExpressionEvaluationMetaDataBean';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\JiraExpressionEvaluationMetaDataBean';
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
        $object = new \JiraSdk\Model\JiraExpressionEvaluationMetaDataBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('complexity', $data)) {
            $object->setComplexity($this->denormalizer->denormalize($data['complexity'], 'JiraSdk\\Model\\JiraExpressionEvaluationMetaDataBeanComplexity', 'json', $context));
        }
        if (\array_key_exists('issues', $data)) {
            $object->setIssues($this->denormalizer->denormalize($data['issues'], 'JiraSdk\\Model\\JiraExpressionEvaluationMetaDataBeanIssues', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('complexity') && null !== $object->getComplexity()) {
            $data['complexity'] = $this->normalizer->normalize($object->getComplexity(), 'json', $context);
        }
        if ($object->isInitialized('issues') && null !== $object->getIssues()) {
            $data['issues'] = $this->normalizer->normalize($object->getIssues(), 'json', $context);
        }
        return $data;
    }
}
