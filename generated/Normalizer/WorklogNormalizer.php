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

class WorklogNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\Worklog';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\Worklog';
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
        $object = new \JiraSdk\Model\Worklog();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
            unset($data['self']);
        }
        if (\array_key_exists('author', $data)) {
            $object->setAuthor($this->denormalizer->denormalize($data['author'], 'JiraSdk\\Model\\WorklogAuthor', 'json', $context));
            unset($data['author']);
        }
        if (\array_key_exists('updateAuthor', $data)) {
            $object->setUpdateAuthor($this->denormalizer->denormalize($data['updateAuthor'], 'JiraSdk\\Model\\WorklogUpdateAuthor', 'json', $context));
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
            $object->setVisibility($this->denormalizer->denormalize($data['visibility'], 'JiraSdk\\Model\\WorklogVisibility', 'json', $context));
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
            $values = array();
            foreach ($data['properties'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\EntityProperty', 'json', $context);
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
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
            $values = array();
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
