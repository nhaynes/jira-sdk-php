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

class ConvertedJQLQueriesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\ConvertedJQLQueries';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\ConvertedJQLQueries';
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
        $object = new \JiraSdk\Model\ConvertedJQLQueries();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('queryStrings', $data)) {
            $values = array();
            foreach ($data['queryStrings'] as $value) {
                $values[] = $value;
            }
            $object->setQueryStrings($values);
        }
        if (\array_key_exists('queriesWithUnknownUsers', $data)) {
            $values_1 = array();
            foreach ($data['queriesWithUnknownUsers'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\JQLQueryWithUnknownUsers', 'json', $context);
            }
            $object->setQueriesWithUnknownUsers($values_1);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('queryStrings') && null !== $object->getQueryStrings()) {
            $values = array();
            foreach ($object->getQueryStrings() as $value) {
                $values[] = $value;
            }
            $data['queryStrings'] = $values;
        }
        if ($object->isInitialized('queriesWithUnknownUsers') && null !== $object->getQueriesWithUnknownUsers()) {
            $values_1 = array();
            foreach ($object->getQueriesWithUnknownUsers() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['queriesWithUnknownUsers'] = $values_1;
        }
        return $data;
    }
}
