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

class LinkedIssueFieldsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\LinkedIssueFields';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\LinkedIssueFields';
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
        $object = new \JiraSdk\Model\LinkedIssueFields();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('summary', $data)) {
            $object->setSummary($data['summary']);
            unset($data['summary']);
        }
        if (\array_key_exists('status', $data)) {
            $object->setStatus($this->denormalizer->denormalize($data['status'], 'JiraSdk\\Model\\FieldsStatus', 'json', $context));
            unset($data['status']);
        }
        if (\array_key_exists('priority', $data)) {
            $object->setPriority($this->denormalizer->denormalize($data['priority'], 'JiraSdk\\Model\\FieldsPriority', 'json', $context));
            unset($data['priority']);
        }
        if (\array_key_exists('assignee', $data)) {
            $object->setAssignee($this->denormalizer->denormalize($data['assignee'], 'JiraSdk\\Model\\FieldsAssignee', 'json', $context));
            unset($data['assignee']);
        }
        if (\array_key_exists('timetracking', $data)) {
            $object->setTimetracking($this->denormalizer->denormalize($data['timetracking'], 'JiraSdk\\Model\\FieldsTimetracking', 'json', $context));
            unset($data['timetracking']);
        }
        if (\array_key_exists('issuetype', $data)) {
            $object->setIssuetype($this->denormalizer->denormalize($data['issuetype'], 'JiraSdk\\Model\\IssueTypeDetails', 'json', $context));
            unset($data['issuetype']);
        }
        if (\array_key_exists('issueType', $data)) {
            $object->setIssueType2($this->denormalizer->denormalize($data['issueType'], 'JiraSdk\\Model\\FieldsIssueType', 'json', $context));
            unset($data['issueType']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
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
        if ($object->isInitialized('issuetype') && null !== $object->getIssuetype()) {
            $data['issuetype'] = $this->normalizer->normalize($object->getIssuetype(), 'json', $context);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}
