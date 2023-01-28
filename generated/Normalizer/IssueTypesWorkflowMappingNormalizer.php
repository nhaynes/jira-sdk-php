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

class IssueTypesWorkflowMappingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\IssueTypesWorkflowMapping';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\IssueTypesWorkflowMapping';
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
        $object = new \JiraSdk\Model\IssueTypesWorkflowMapping();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('workflow', $data)) {
            $object->setWorkflow($data['workflow']);
        }
        if (\array_key_exists('issueTypes', $data)) {
            $values = array();
            foreach ($data['issueTypes'] as $value) {
                $values[] = $value;
            }
            $object->setIssueTypes($values);
        }
        if (\array_key_exists('defaultMapping', $data)) {
            $object->setDefaultMapping($data['defaultMapping']);
        }
        if (\array_key_exists('updateDraftIfNeeded', $data)) {
            $object->setUpdateDraftIfNeeded($data['updateDraftIfNeeded']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('workflow') && null !== $object->getWorkflow()) {
            $data['workflow'] = $object->getWorkflow();
        }
        if ($object->isInitialized('issueTypes') && null !== $object->getIssueTypes()) {
            $values = array();
            foreach ($object->getIssueTypes() as $value) {
                $values[] = $value;
            }
            $data['issueTypes'] = $values;
        }
        if ($object->isInitialized('defaultMapping') && null !== $object->getDefaultMapping()) {
            $data['defaultMapping'] = $object->getDefaultMapping();
        }
        if ($object->isInitialized('updateDraftIfNeeded') && null !== $object->getUpdateDraftIfNeeded()) {
            $data['updateDraftIfNeeded'] = $object->getUpdateDraftIfNeeded();
        }
        return $data;
    }
}
