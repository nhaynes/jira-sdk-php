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

class IssueLinkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\IssueLink';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\IssueLink';
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
        $object = new \JiraSdk\Model\IssueLink();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
        }
        if (\array_key_exists('type', $data)) {
            $object->setType($this->denormalizer->denormalize($data['type'], 'JiraSdk\\Model\\IssueLinkType', 'json', $context));
        }
        if (\array_key_exists('inwardIssue', $data)) {
            $object->setInwardIssue($this->denormalizer->denormalize($data['inwardIssue'], 'JiraSdk\\Model\\IssueLinkInwardIssue', 'json', $context));
        }
        if (\array_key_exists('outwardIssue', $data)) {
            $object->setOutwardIssue($this->denormalizer->denormalize($data['outwardIssue'], 'JiraSdk\\Model\\IssueLinkOutwardIssue', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['type'] = $this->normalizer->normalize($object->getType(), 'json', $context);
        $data['inwardIssue'] = $this->normalizer->normalize($object->getInwardIssue(), 'json', $context);
        $data['outwardIssue'] = $this->normalizer->normalize($object->getOutwardIssue(), 'json', $context);
        return $data;
    }
}
