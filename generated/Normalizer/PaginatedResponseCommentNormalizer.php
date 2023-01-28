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

class PaginatedResponseCommentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\PaginatedResponseComment';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\PaginatedResponseComment';
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
        $object = new \JiraSdk\Model\PaginatedResponseComment();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('results', $data)) {
            $values = array();
            foreach ($data['results'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\Comment', 'json', $context);
            }
            $object->setResults($values);
        }
        if (\array_key_exists('maxResults', $data)) {
            $object->setMaxResults($data['maxResults']);
        }
        if (\array_key_exists('startAt', $data)) {
            $object->setStartAt($data['startAt']);
        }
        if (\array_key_exists('total', $data)) {
            $object->setTotal($data['total']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('results') && null !== $object->getResults()) {
            $values = array();
            foreach ($object->getResults() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['results'] = $values;
        }
        if ($object->isInitialized('maxResults') && null !== $object->getMaxResults()) {
            $data['maxResults'] = $object->getMaxResults();
        }
        if ($object->isInitialized('startAt') && null !== $object->getStartAt()) {
            $data['startAt'] = $object->getStartAt();
        }
        if ($object->isInitialized('total') && null !== $object->getTotal()) {
            $data['total'] = $object->getTotal();
        }
        return $data;
    }
}
