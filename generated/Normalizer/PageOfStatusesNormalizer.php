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

class PageOfStatusesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\PageOfStatuses';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\PageOfStatuses';
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
        $object = new \JiraSdk\Model\PageOfStatuses();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('startAt', $data)) {
            $object->setStartAt($data['startAt']);
        }
        if (\array_key_exists('total', $data)) {
            $object->setTotal($data['total']);
        }
        if (\array_key_exists('isLast', $data)) {
            $object->setIsLast($data['isLast']);
        }
        if (\array_key_exists('maxResults', $data)) {
            $object->setMaxResults($data['maxResults']);
        }
        if (\array_key_exists('values', $data)) {
            $values = array();
            foreach ($data['values'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\JiraStatus', 'json', $context);
            }
            $object->setValues($values);
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
        }
        if (\array_key_exists('nextPage', $data)) {
            $object->setNextPage($data['nextPage']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('startAt') && null !== $object->getStartAt()) {
            $data['startAt'] = $object->getStartAt();
        }
        if ($object->isInitialized('total') && null !== $object->getTotal()) {
            $data['total'] = $object->getTotal();
        }
        if ($object->isInitialized('isLast') && null !== $object->getIsLast()) {
            $data['isLast'] = $object->getIsLast();
        }
        if ($object->isInitialized('maxResults') && null !== $object->getMaxResults()) {
            $data['maxResults'] = $object->getMaxResults();
        }
        if ($object->isInitialized('values') && null !== $object->getValues()) {
            $values = array();
            foreach ($object->getValues() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['values'] = $values;
        }
        if ($object->isInitialized('self') && null !== $object->getSelf()) {
            $data['self'] = $object->getSelf();
        }
        if ($object->isInitialized('nextPage') && null !== $object->getNextPage()) {
            $data['nextPage'] = $object->getNextPage();
        }
        return $data;
    }
}
