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

class FieldConfigurationIssueTypeItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\FieldConfigurationIssueTypeItem';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\FieldConfigurationIssueTypeItem';
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
        $object = new \JiraSdk\Model\FieldConfigurationIssueTypeItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('fieldConfigurationSchemeId', $data)) {
            $object->setFieldConfigurationSchemeId($data['fieldConfigurationSchemeId']);
        }
        if (\array_key_exists('issueTypeId', $data)) {
            $object->setIssueTypeId($data['issueTypeId']);
        }
        if (\array_key_exists('fieldConfigurationId', $data)) {
            $object->setFieldConfigurationId($data['fieldConfigurationId']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['fieldConfigurationSchemeId'] = $object->getFieldConfigurationSchemeId();
        $data['issueTypeId'] = $object->getIssueTypeId();
        $data['fieldConfigurationId'] = $object->getFieldConfigurationId();
        return $data;
    }
}
