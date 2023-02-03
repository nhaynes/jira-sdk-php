<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Api\Runtime\Normalizer\CheckArray;
use JiraSdk\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class WorkflowSchemeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\WorkflowScheme' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\WorkflowScheme' === \get_class($data);
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Api\Model\WorkflowScheme();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('defaultWorkflow', $data)) {
            $object->setDefaultWorkflow($data['defaultWorkflow']);
        }
        if (\array_key_exists('issueTypeMappings', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['issueTypeMappings'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setIssueTypeMappings($values);
        }
        if (\array_key_exists('originalDefaultWorkflow', $data)) {
            $object->setOriginalDefaultWorkflow($data['originalDefaultWorkflow']);
        }
        if (\array_key_exists('originalIssueTypeMappings', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['originalIssueTypeMappings'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setOriginalIssueTypeMappings($values_1);
        }
        if (\array_key_exists('draft', $data)) {
            $object->setDraft($data['draft']);
        }
        if (\array_key_exists('lastModifiedUser', $data)) {
            $object->setLastModifiedUser($this->denormalizer->denormalize($data['lastModifiedUser'], 'JiraSdk\\Api\\Model\\WorkflowSchemeLastModifiedUser', 'json', $context));
        }
        if (\array_key_exists('lastModified', $data)) {
            $object->setLastModified($data['lastModified']);
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
        }
        if (\array_key_exists('updateDraftIfNeeded', $data)) {
            $object->setUpdateDraftIfNeeded($data['updateDraftIfNeeded']);
        }
        if (\array_key_exists('issueTypes', $data)) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['issueTypes'] as $key_2 => $value_2) {
                $values_2[$key_2] = $this->denormalizer->denormalize($value_2, 'JiraSdk\\Api\\Model\\IssueTypeDetails', 'json', $context);
            }
            $object->setIssueTypes($values_2);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
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
            $values = [];
            foreach ($object->getIssueTypeMappings() as $key => $value) {
                $values[$key] = $value;
            }
            $data['issueTypeMappings'] = $values;
        }
        if ($object->isInitialized('updateDraftIfNeeded') && null !== $object->getUpdateDraftIfNeeded()) {
            $data['updateDraftIfNeeded'] = $object->getUpdateDraftIfNeeded();
        }

        return $data;
    }
}
