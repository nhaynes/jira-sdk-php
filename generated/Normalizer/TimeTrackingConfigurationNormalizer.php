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

class TimeTrackingConfigurationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\TimeTrackingConfiguration';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\TimeTrackingConfiguration';
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
        $object = new \JiraSdk\Model\TimeTrackingConfiguration();
        if (\array_key_exists('workingHoursPerDay', $data) && \is_int($data['workingHoursPerDay'])) {
            $data['workingHoursPerDay'] = (float) $data['workingHoursPerDay'];
        }
        if (\array_key_exists('workingDaysPerWeek', $data) && \is_int($data['workingDaysPerWeek'])) {
            $data['workingDaysPerWeek'] = (float) $data['workingDaysPerWeek'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('workingHoursPerDay', $data)) {
            $object->setWorkingHoursPerDay($data['workingHoursPerDay']);
        }
        if (\array_key_exists('workingDaysPerWeek', $data)) {
            $object->setWorkingDaysPerWeek($data['workingDaysPerWeek']);
        }
        if (\array_key_exists('timeFormat', $data)) {
            $object->setTimeFormat($data['timeFormat']);
        }
        if (\array_key_exists('defaultUnit', $data)) {
            $object->setDefaultUnit($data['defaultUnit']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['workingHoursPerDay'] = $object->getWorkingHoursPerDay();
        $data['workingDaysPerWeek'] = $object->getWorkingDaysPerWeek();
        $data['timeFormat'] = $object->getTimeFormat();
        $data['defaultUnit'] = $object->getDefaultUnit();
        return $data;
    }
}
