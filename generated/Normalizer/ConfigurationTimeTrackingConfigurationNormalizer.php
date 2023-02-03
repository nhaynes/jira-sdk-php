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

class ConfigurationTimeTrackingConfigurationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\ConfigurationTimeTrackingConfiguration' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\ConfigurationTimeTrackingConfiguration' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\ConfigurationTimeTrackingConfiguration();
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
            unset($data['workingHoursPerDay']);
        }
        if (\array_key_exists('workingDaysPerWeek', $data)) {
            $object->setWorkingDaysPerWeek($data['workingDaysPerWeek']);
            unset($data['workingDaysPerWeek']);
        }
        if (\array_key_exists('timeFormat', $data)) {
            $object->setTimeFormat($data['timeFormat']);
            unset($data['timeFormat']);
        }
        if (\array_key_exists('defaultUnit', $data)) {
            $object->setDefaultUnit($data['defaultUnit']);
            unset($data['defaultUnit']);
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
        $data['workingHoursPerDay'] = $object->getWorkingHoursPerDay();
        $data['workingDaysPerWeek'] = $object->getWorkingDaysPerWeek();
        $data['timeFormat'] = $object->getTimeFormat();
        $data['defaultUnit'] = $object->getDefaultUnit();
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
