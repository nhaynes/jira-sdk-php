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

class WorkflowSchemeAssociationsWorkflowSchemeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\WorkflowSchemeAssociationsWorkflowScheme';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\WorkflowSchemeAssociationsWorkflowScheme';
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
        $object = new \JiraSdk\Model\WorkflowSchemeAssociationsWorkflowScheme();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
            unset($data['name']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
            unset($data['description']);
        }
        if (\array_key_exists('defaultWorkflow', $data)) {
            $object->setDefaultWorkflow($data['defaultWorkflow']);
            unset($data['defaultWorkflow']);
        }
        if (\array_key_exists('issueTypeMappings', $data)) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['issueTypeMappings'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setIssueTypeMappings($values);
            unset($data['issueTypeMappings']);
        }
        if (\array_key_exists('originalDefaultWorkflow', $data)) {
            $object->setOriginalDefaultWorkflow($data['originalDefaultWorkflow']);
            unset($data['originalDefaultWorkflow']);
        }
        if (\array_key_exists('originalIssueTypeMappings', $data)) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['originalIssueTypeMappings'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setOriginalIssueTypeMappings($values_1);
            unset($data['originalIssueTypeMappings']);
        }
        if (\array_key_exists('draft', $data)) {
            $object->setDraft($data['draft']);
            unset($data['draft']);
        }
        if (\array_key_exists('lastModifiedUser', $data)) {
            $object->setLastModifiedUser($this->denormalizer->denormalize($data['lastModifiedUser'], 'JiraSdk\\Model\\WorkflowSchemeLastModifiedUser', 'json', $context));
            unset($data['lastModifiedUser']);
        }
        if (\array_key_exists('lastModified', $data)) {
            $object->setLastModified($data['lastModified']);
            unset($data['lastModified']);
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
            unset($data['self']);
        }
        if (\array_key_exists('updateDraftIfNeeded', $data)) {
            $object->setUpdateDraftIfNeeded($data['updateDraftIfNeeded']);
            unset($data['updateDraftIfNeeded']);
        }
        if (\array_key_exists('issueTypes', $data)) {
            $values_2 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['issueTypes'] as $key_2 => $value_2) {
                $values_2[$key_2] = $this->denormalizer->denormalize($value_2, 'JiraSdk\\Model\\IssueTypeDetails', 'json', $context);
            }
            $object->setIssueTypes($values_2);
            unset($data['issueTypes']);
        }
        foreach ($data as $key_3 => $value_3) {
            if (preg_match('/.*/', (string) $key_3)) {
                $object[$key_3] = $value_3;
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
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if ($object->isInitialized('defaultWorkflow') && null !== $object->getDefaultWorkflow()) {
            $data['defaultWorkflow'] = $object->getDefaultWorkflow();
        }
        if ($object->isInitialized('issueTypeMappings') && null !== $object->getIssueTypeMappings()) {
            $values = array();
            foreach ($object->getIssueTypeMappings() as $key => $value) {
                $values[$key] = $value;
            }
            $data['issueTypeMappings'] = $values;
        }
        if ($object->isInitialized('updateDraftIfNeeded') && null !== $object->getUpdateDraftIfNeeded()) {
            $data['updateDraftIfNeeded'] = $object->getUpdateDraftIfNeeded();
        }
        foreach ($object as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_1;
            }
        }
        return $data;
    }
}
