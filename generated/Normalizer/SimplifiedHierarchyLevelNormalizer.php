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

class SimplifiedHierarchyLevelNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\SimplifiedHierarchyLevel' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\SimplifiedHierarchyLevel' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\SimplifiedHierarchyLevel();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('aboveLevelId', $data)) {
            $object->setAboveLevelId($data['aboveLevelId']);
        }
        if (\array_key_exists('belowLevelId', $data)) {
            $object->setBelowLevelId($data['belowLevelId']);
        }
        if (\array_key_exists('projectConfigurationId', $data)) {
            $object->setProjectConfigurationId($data['projectConfigurationId']);
        }
        if (\array_key_exists('level', $data)) {
            $object->setLevel($data['level']);
        }
        if (\array_key_exists('issueTypeIds', $data)) {
            $values = [];
            foreach ($data['issueTypeIds'] as $value) {
                $values[] = $value;
            }
            $object->setIssueTypeIds($values);
        }
        if (\array_key_exists('externalUuid', $data)) {
            $object->setExternalUuid($data['externalUuid']);
        }
        if (\array_key_exists('hierarchyLevelNumber', $data)) {
            $object->setHierarchyLevelNumber($data['hierarchyLevelNumber']);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if ($object->isInitialized('aboveLevelId') && null !== $object->getAboveLevelId()) {
            $data['aboveLevelId'] = $object->getAboveLevelId();
        }
        if ($object->isInitialized('belowLevelId') && null !== $object->getBelowLevelId()) {
            $data['belowLevelId'] = $object->getBelowLevelId();
        }
        if ($object->isInitialized('projectConfigurationId') && null !== $object->getProjectConfigurationId()) {
            $data['projectConfigurationId'] = $object->getProjectConfigurationId();
        }
        if ($object->isInitialized('level') && null !== $object->getLevel()) {
            $data['level'] = $object->getLevel();
        }
        if ($object->isInitialized('issueTypeIds') && null !== $object->getIssueTypeIds()) {
            $values = [];
            foreach ($object->getIssueTypeIds() as $value) {
                $values[] = $value;
            }
            $data['issueTypeIds'] = $values;
        }
        if ($object->isInitialized('externalUuid') && null !== $object->getExternalUuid()) {
            $data['externalUuid'] = $object->getExternalUuid();
        }
        if ($object->isInitialized('hierarchyLevelNumber') && null !== $object->getHierarchyLevelNumber()) {
            $data['hierarchyLevelNumber'] = $object->getHierarchyLevelNumber();
        }

        return $data;
    }
}
