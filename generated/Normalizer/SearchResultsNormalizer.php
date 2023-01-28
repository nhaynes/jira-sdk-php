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

class SearchResultsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\SearchResults';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\SearchResults';
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
        $object = new \JiraSdk\Model\SearchResults();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('expand', $data)) {
            $object->setExpand($data['expand']);
        }
        if (\array_key_exists('startAt', $data)) {
            $object->setStartAt($data['startAt']);
        }
        if (\array_key_exists('maxResults', $data)) {
            $object->setMaxResults($data['maxResults']);
        }
        if (\array_key_exists('total', $data)) {
            $object->setTotal($data['total']);
        }
        if (\array_key_exists('issues', $data)) {
            $values = array();
            foreach ($data['issues'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\IssueBean', 'json', $context);
            }
            $object->setIssues($values);
        }
        if (\array_key_exists('warningMessages', $data)) {
            $values_1 = array();
            foreach ($data['warningMessages'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setWarningMessages($values_1);
        }
        if (\array_key_exists('names', $data)) {
            $values_2 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['names'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setNames($values_2);
        }
        if (\array_key_exists('schema', $data)) {
            $values_3 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['schema'] as $key_1 => $value_3) {
                $values_3[$key_1] = $this->denormalizer->denormalize($value_3, 'JiraSdk\\Model\\JsonTypeBean', 'json', $context);
            }
            $object->setSchema($values_3);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        return $data;
    }
}
