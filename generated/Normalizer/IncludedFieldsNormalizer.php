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

class IncludedFieldsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\IncludedFields' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\IncludedFields' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\IncludedFields();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('actuallyIncluded', $data)) {
            $values = [];
            foreach ($data['actuallyIncluded'] as $value) {
                $values[] = $value;
            }
            $object->setActuallyIncluded($values);
        }
        if (\array_key_exists('excluded', $data)) {
            $values_1 = [];
            foreach ($data['excluded'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExcluded($values_1);
        }
        if (\array_key_exists('included', $data)) {
            $values_2 = [];
            foreach ($data['included'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setIncluded($values_2);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('actuallyIncluded') && null !== $object->getActuallyIncluded()) {
            $values = [];
            foreach ($object->getActuallyIncluded() as $value) {
                $values[] = $value;
            }
            $data['actuallyIncluded'] = $values;
        }
        if ($object->isInitialized('excluded') && null !== $object->getExcluded()) {
            $values_1 = [];
            foreach ($object->getExcluded() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['excluded'] = $values_1;
        }
        if ($object->isInitialized('included') && null !== $object->getIncluded()) {
            $values_2 = [];
            foreach ($object->getIncluded() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['included'] = $values_2;
        }

        return $data;
    }
}
