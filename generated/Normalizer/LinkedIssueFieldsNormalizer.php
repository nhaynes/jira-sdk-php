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

class LinkedIssueFieldsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\LinkedIssueFields' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\LinkedIssueFields' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\LinkedIssueFields();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('summary', $data)) {
            $object->setSummary($data['summary']);
            unset($data['summary']);
        }
        if (\array_key_exists('status', $data)) {
            $object->setStatus($this->denormalizer->denormalize($data['status'], 'JiraSdk\\Api\\Model\\FieldsStatus', 'json', $context));
            unset($data['status']);
        }
        if (\array_key_exists('priority', $data)) {
            $object->setPriority($this->denormalizer->denormalize($data['priority'], 'JiraSdk\\Api\\Model\\FieldsPriority', 'json', $context));
            unset($data['priority']);
        }
        if (\array_key_exists('assignee', $data)) {
            $object->setAssignee($this->denormalizer->denormalize($data['assignee'], 'JiraSdk\\Api\\Model\\FieldsAssignee', 'json', $context));
            unset($data['assignee']);
        }
        if (\array_key_exists('timetracking', $data)) {
            $object->setTimetracking($this->denormalizer->denormalize($data['timetracking'], 'JiraSdk\\Api\\Model\\FieldsTimetracking', 'json', $context));
            unset($data['timetracking']);
        }
        if (\array_key_exists('issuetype', $data)) {
            $object->setIssuetype($this->denormalizer->denormalize($data['issuetype'], 'JiraSdk\\Api\\Model\\IssueTypeDetails', 'json', $context));
            unset($data['issuetype']);
        }
        if (\array_key_exists('issueType', $data)) {
            $object->setIssueType2($this->denormalizer->denormalize($data['issueType'], 'JiraSdk\\Api\\Model\\FieldsIssueType', 'json', $context));
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
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
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
