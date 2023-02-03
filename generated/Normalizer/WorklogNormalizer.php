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

class WorklogNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\Worklog' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\Worklog' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\Worklog();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
            unset($data['self']);
        }
        if (\array_key_exists('author', $data)) {
            $object->setAuthor($this->denormalizer->denormalize($data['author'], 'JiraSdk\\Api\\Model\\WorklogAuthor', 'json', $context));
            unset($data['author']);
        }
        if (\array_key_exists('updateAuthor', $data)) {
            $object->setUpdateAuthor($this->denormalizer->denormalize($data['updateAuthor'], 'JiraSdk\\Api\\Model\\WorklogUpdateAuthor', 'json', $context));
            unset($data['updateAuthor']);
        }
        if (\array_key_exists('comment', $data)) {
            $object->setComment($data['comment']);
            unset($data['comment']);
        }
        if (\array_key_exists('created', $data)) {
            $object->setCreated(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['created']));
            unset($data['created']);
        }
        if (\array_key_exists('updated', $data)) {
            $object->setUpdated(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['updated']));
            unset($data['updated']);
        }
        if (\array_key_exists('visibility', $data)) {
            $object->setVisibility($this->denormalizer->denormalize($data['visibility'], 'JiraSdk\\Api\\Model\\WorklogVisibility', 'json', $context));
            unset($data['visibility']);
        }
        if (\array_key_exists('started', $data)) {
            $object->setStarted(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['started']));
            unset($data['started']);
        }
        if (\array_key_exists('timeSpent', $data)) {
            $object->setTimeSpent($data['timeSpent']);
            unset($data['timeSpent']);
        }
        if (\array_key_exists('timeSpentSeconds', $data)) {
            $object->setTimeSpentSeconds($data['timeSpentSeconds']);
            unset($data['timeSpentSeconds']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        if (\array_key_exists('issueId', $data)) {
            $object->setIssueId($data['issueId']);
            unset($data['issueId']);
        }
        if (\array_key_exists('properties', $data)) {
            $values = [];
            foreach ($data['properties'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\EntityProperty', 'json', $context);
            }
            $object->setProperties($values);
            unset($data['properties']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        if ($object->isInitialized('comment') && null !== $object->getComment()) {
            $data['comment'] = $object->getComment();
        }
        if ($object->isInitialized('visibility') && null !== $object->getVisibility()) {
            $data['visibility'] = $this->normalizer->normalize($object->getVisibility(), 'json', $context);
        }
        if ($object->isInitialized('started') && null !== $object->getStarted()) {
            $data['started'] = $object->getStarted()->format('Y-m-d\\TH:i:sP');
        }
        if ($object->isInitialized('timeSpent') && null !== $object->getTimeSpent()) {
            $data['timeSpent'] = $object->getTimeSpent();
        }
        if ($object->isInitialized('timeSpentSeconds') && null !== $object->getTimeSpentSeconds()) {
            $data['timeSpentSeconds'] = $object->getTimeSpentSeconds();
        }
        if ($object->isInitialized('properties') && null !== $object->getProperties()) {
            $values = [];
            foreach ($object->getProperties() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['properties'] = $values;
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }
}
