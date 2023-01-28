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

class ProjectComponentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\ProjectComponent';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\ProjectComponent';
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
        $object = new \JiraSdk\Model\ProjectComponent();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
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
        if (\array_key_exists('lead', $data)) {
            $object->setLead($this->denormalizer->denormalize($data['lead'], 'JiraSdk\\Model\\ProjectComponentLead', 'json', $context));
        }
        if (\array_key_exists('leadUserName', $data)) {
            $object->setLeadUserName($data['leadUserName']);
        }
        if (\array_key_exists('leadAccountId', $data)) {
            $object->setLeadAccountId($data['leadAccountId']);
        }
        if (\array_key_exists('assigneeType', $data)) {
            $object->setAssigneeType($data['assigneeType']);
        }
        if (\array_key_exists('assignee', $data)) {
            $object->setAssignee($this->denormalizer->denormalize($data['assignee'], 'JiraSdk\\Model\\ProjectComponentAssignee', 'json', $context));
        }
        if (\array_key_exists('realAssigneeType', $data)) {
            $object->setRealAssigneeType($data['realAssigneeType']);
        }
        if (\array_key_exists('realAssignee', $data)) {
            $object->setRealAssignee($this->denormalizer->denormalize($data['realAssignee'], 'JiraSdk\\Model\\ProjectComponentRealAssignee', 'json', $context));
        }
        if (\array_key_exists('isAssigneeTypeValid', $data)) {
            $object->setIsAssigneeTypeValid($data['isAssigneeTypeValid']);
        }
        if (\array_key_exists('project', $data)) {
            $object->setProject($data['project']);
        }
        if (\array_key_exists('projectId', $data)) {
            $object->setProjectId($data['projectId']);
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
        if ($object->isInitialized('leadUserName') && null !== $object->getLeadUserName()) {
            $data['leadUserName'] = $object->getLeadUserName();
        }
        if ($object->isInitialized('leadAccountId') && null !== $object->getLeadAccountId()) {
            $data['leadAccountId'] = $object->getLeadAccountId();
        }
        if ($object->isInitialized('assigneeType') && null !== $object->getAssigneeType()) {
            $data['assigneeType'] = $object->getAssigneeType();
        }
        if ($object->isInitialized('project') && null !== $object->getProject()) {
            $data['project'] = $object->getProject();
        }
        return $data;
    }
}
