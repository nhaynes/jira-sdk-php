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

class IssueUpdateDetailsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\IssueUpdateDetails' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\IssueUpdateDetails' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\IssueUpdateDetails();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('transition', $data)) {
            $object->setTransition($this->denormalizer->denormalize($data['transition'], 'JiraSdk\\Api\\Model\\IssueUpdateDetailsTransition', 'json', $context));
            unset($data['transition']);
        }
        if (\array_key_exists('fields', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['fields'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setFields($values);
            unset($data['fields']);
        }
        if (\array_key_exists('update', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['update'] as $key_1 => $value_1) {
                $values_2 = [];
                foreach ($value_1 as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, 'JiraSdk\\Api\\Model\\FieldUpdateOperation', 'json', $context);
                }
                $values_1[$key_1] = $values_2;
            }
            $object->setUpdate($values_1);
            unset($data['update']);
        }
        if (\array_key_exists('historyMetadata', $data)) {
            $object->setHistoryMetadata($this->denormalizer->denormalize($data['historyMetadata'], 'JiraSdk\\Api\\Model\\IssueUpdateDetailsHistoryMetadata', 'json', $context));
            unset($data['historyMetadata']);
        }
        if (\array_key_exists('properties', $data)) {
            $values_3 = [];
            foreach ($data['properties'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'JiraSdk\\Api\\Model\\EntityProperty', 'json', $context);
            }
            $object->setProperties($values_3);
            unset($data['properties']);
        }
        foreach ($data as $key_2 => $value_4) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_4;
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
        if ($object->isInitialized('transition') && null !== $object->getTransition()) {
            $data['transition'] = $this->normalizer->normalize($object->getTransition(), 'json', $context);
        }
        if ($object->isInitialized('fields') && null !== $object->getFields()) {
            $values = [];
            foreach ($object->getFields() as $key => $value) {
                $values[$key] = $value;
            }
            $data['fields'] = $values;
        }
        if ($object->isInitialized('update') && null !== $object->getUpdate()) {
            $values_1 = [];
            foreach ($object->getUpdate() as $key_1 => $value_1) {
                $values_2 = [];
                foreach ($value_1 as $value_2) {
                    $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
                }
                $values_1[$key_1] = $values_2;
            }
            $data['update'] = $values_1;
        }
        if ($object->isInitialized('historyMetadata') && null !== $object->getHistoryMetadata()) {
            $data['historyMetadata'] = $this->normalizer->normalize($object->getHistoryMetadata(), 'json', $context);
        }
        if ($object->isInitialized('properties') && null !== $object->getProperties()) {
            $values_3 = [];
            foreach ($object->getProperties() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['properties'] = $values_3;
        }
        foreach ($object as $key_2 => $value_4) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_4;
            }
        }

        return $data;
    }
}
