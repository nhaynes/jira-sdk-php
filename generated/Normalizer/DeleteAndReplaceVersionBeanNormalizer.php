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

class DeleteAndReplaceVersionBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\DeleteAndReplaceVersionBean';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\DeleteAndReplaceVersionBean';
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
        $object = new \JiraSdk\Model\DeleteAndReplaceVersionBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('moveFixIssuesTo', $data)) {
            $object->setMoveFixIssuesTo($data['moveFixIssuesTo']);
        }
        if (\array_key_exists('moveAffectedIssuesTo', $data)) {
            $object->setMoveAffectedIssuesTo($data['moveAffectedIssuesTo']);
        }
        if (\array_key_exists('customFieldReplacementList', $data)) {
            $values = array();
            foreach ($data['customFieldReplacementList'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\CustomFieldReplacement', 'json', $context);
            }
            $object->setCustomFieldReplacementList($values);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('moveFixIssuesTo') && null !== $object->getMoveFixIssuesTo()) {
            $data['moveFixIssuesTo'] = $object->getMoveFixIssuesTo();
        }
        if ($object->isInitialized('moveAffectedIssuesTo') && null !== $object->getMoveAffectedIssuesTo()) {
            $data['moveAffectedIssuesTo'] = $object->getMoveAffectedIssuesTo();
        }
        if ($object->isInitialized('customFieldReplacementList') && null !== $object->getCustomFieldReplacementList()) {
            $values = array();
            foreach ($object->getCustomFieldReplacementList() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['customFieldReplacementList'] = $values;
        }
        return $data;
    }
}
