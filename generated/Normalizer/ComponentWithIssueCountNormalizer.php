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

class ComponentWithIssueCountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\ComponentWithIssueCount';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\ComponentWithIssueCount';
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
        $object = new \JiraSdk\Model\ComponentWithIssueCount();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('issueCount', $data)) {
            $object->setIssueCount($data['issueCount']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('realAssignee', $data)) {
            $object->setRealAssignee($this->denormalizer->denormalize($data['realAssignee'], 'JiraSdk\\Model\\ComponentWithIssueCountRealAssignee', 'json', $context));
        }
        if (\array_key_exists('isAssigneeTypeValid', $data)) {
            $object->setIsAssigneeTypeValid($data['isAssigneeTypeValid']);
        }
        if (\array_key_exists('realAssigneeType', $data)) {
            $object->setRealAssigneeType($data['realAssigneeType']);
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
        }
        if (\array_key_exists('lead', $data)) {
            $object->setLead($this->denormalizer->denormalize($data['lead'], 'JiraSdk\\Model\\ComponentWithIssueCountLead', 'json', $context));
        }
        if (\array_key_exists('assigneeType', $data)) {
            $object->setAssigneeType($data['assigneeType']);
        }
        if (\array_key_exists('project', $data)) {
            $object->setProject($data['project']);
        }
        if (\array_key_exists('assignee', $data)) {
            $object->setAssignee($this->denormalizer->denormalize($data['assignee'], 'JiraSdk\\Model\\ComponentWithIssueCountAssignee', 'json', $context));
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
        if ($object->isInitialized('realAssignee') && null !== $object->getRealAssignee()) {
            $data['realAssignee'] = $this->normalizer->normalize($object->getRealAssignee(), 'json', $context);
        }
        if ($object->isInitialized('lead') && null !== $object->getLead()) {
            $data['lead'] = $this->normalizer->normalize($object->getLead(), 'json', $context);
        }
        if ($object->isInitialized('assignee') && null !== $object->getAssignee()) {
            $data['assignee'] = $this->normalizer->normalize($object->getAssignee(), 'json', $context);
        }
        return $data;
    }
}
