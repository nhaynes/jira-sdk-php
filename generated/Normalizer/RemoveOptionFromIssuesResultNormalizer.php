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

class RemoveOptionFromIssuesResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\RemoveOptionFromIssuesResult';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\RemoveOptionFromIssuesResult';
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
        $object = new \JiraSdk\Model\RemoveOptionFromIssuesResult();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('modifiedIssues', $data)) {
            $values = array();
            foreach ($data['modifiedIssues'] as $value) {
                $values[] = $value;
            }
            $object->setModifiedIssues($values);
        }
        if (\array_key_exists('unmodifiedIssues', $data)) {
            $values_1 = array();
            foreach ($data['unmodifiedIssues'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setUnmodifiedIssues($values_1);
        }
        if (\array_key_exists('errors', $data)) {
            $object->setErrors($this->denormalizer->denormalize($data['errors'], 'JiraSdk\\Model\\RemoveOptionFromIssuesResultErrors', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('modifiedIssues') && null !== $object->getModifiedIssues()) {
            $values = array();
            foreach ($object->getModifiedIssues() as $value) {
                $values[] = $value;
            }
            $data['modifiedIssues'] = $values;
        }
        if ($object->isInitialized('unmodifiedIssues') && null !== $object->getUnmodifiedIssues()) {
            $values_1 = array();
            foreach ($object->getUnmodifiedIssues() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['unmodifiedIssues'] = $values_1;
        }
        if ($object->isInitialized('errors') && null !== $object->getErrors()) {
            $data['errors'] = $this->normalizer->normalize($object->getErrors(), 'json', $context);
        }
        return $data;
    }
}
