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

class SimplifiedHierarchyLevelNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\SimplifiedHierarchyLevel';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\SimplifiedHierarchyLevel';
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
        $object = new \JiraSdk\Model\SimplifiedHierarchyLevel();
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
            $values = array();
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
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
            $values = array();
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
