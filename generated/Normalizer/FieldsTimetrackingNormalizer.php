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

class FieldsTimetrackingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\FieldsTimetracking';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\FieldsTimetracking';
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
        $object = new \JiraSdk\Model\FieldsTimetracking();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('originalEstimate', $data)) {
            $object->setOriginalEstimate($data['originalEstimate']);
            unset($data['originalEstimate']);
        }
        if (\array_key_exists('remainingEstimate', $data)) {
            $object->setRemainingEstimate($data['remainingEstimate']);
            unset($data['remainingEstimate']);
        }
        if (\array_key_exists('timeSpent', $data)) {
            $object->setTimeSpent($data['timeSpent']);
            unset($data['timeSpent']);
        }
        if (\array_key_exists('originalEstimateSeconds', $data)) {
            $object->setOriginalEstimateSeconds($data['originalEstimateSeconds']);
            unset($data['originalEstimateSeconds']);
        }
        if (\array_key_exists('remainingEstimateSeconds', $data)) {
            $object->setRemainingEstimateSeconds($data['remainingEstimateSeconds']);
            unset($data['remainingEstimateSeconds']);
        }
        if (\array_key_exists('timeSpentSeconds', $data)) {
            $object->setTimeSpentSeconds($data['timeSpentSeconds']);
            unset($data['timeSpentSeconds']);
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
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}
