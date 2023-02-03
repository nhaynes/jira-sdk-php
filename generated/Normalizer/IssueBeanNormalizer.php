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

class IssueBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\IssueBean' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\IssueBean' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\IssueBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('expand', $data)) {
            $object->setExpand($data['expand']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
        }
        if (\array_key_exists('key', $data)) {
            $object->setKey($data['key']);
        }
        if (\array_key_exists('renderedFields', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['renderedFields'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setRenderedFields($values);
        }
        if (\array_key_exists('properties', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['properties'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setProperties($values_1);
        }
        if (\array_key_exists('names', $data)) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['names'] as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setNames($values_2);
        }
        if (\array_key_exists('schema', $data)) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['schema'] as $key_3 => $value_3) {
                $values_3[$key_3] = $this->denormalizer->denormalize($value_3, 'JiraSdk\\Api\\Model\\JsonTypeBean', 'json', $context);
            }
            $object->setSchema($values_3);
        }
        if (\array_key_exists('transitions', $data)) {
            $values_4 = [];
            foreach ($data['transitions'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, 'JiraSdk\\Api\\Model\\IssueTransition', 'json', $context);
            }
            $object->setTransitions($values_4);
        }
        if (\array_key_exists('operations', $data)) {
            $object->setOperations($this->denormalizer->denormalize($data['operations'], 'JiraSdk\\Api\\Model\\IssueBeanOperations', 'json', $context));
        }
        if (\array_key_exists('editmeta', $data)) {
            $object->setEditmeta($this->denormalizer->denormalize($data['editmeta'], 'JiraSdk\\Api\\Model\\IssueBeanEditmeta', 'json', $context));
        }
        if (\array_key_exists('changelog', $data)) {
            $object->setChangelog($this->denormalizer->denormalize($data['changelog'], 'JiraSdk\\Api\\Model\\IssueBeanChangelog', 'json', $context));
        }
        if (\array_key_exists('versionedRepresentations', $data)) {
            $values_5 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['versionedRepresentations'] as $key_4 => $value_5) {
                $values_6 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($value_5 as $key_5 => $value_6) {
                    $values_6[$key_5] = $value_6;
                }
                $values_5[$key_4] = $values_6;
            }
            $object->setVersionedRepresentations($values_5);
        }
        if (\array_key_exists('fieldsToInclude', $data)) {
            $object->setFieldsToInclude($this->denormalizer->denormalize($data['fieldsToInclude'], 'JiraSdk\\Api\\Model\\IncludedFields', 'json', $context));
        }
        if (\array_key_exists('fields', $data)) {
            $values_7 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['fields'] as $key_6 => $value_7) {
                $values_7[$key_6] = $value_7;
            }
            $object->setFields($values_7);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('fieldsToInclude') && null !== $object->getFieldsToInclude()) {
            $data['fieldsToInclude'] = $this->normalizer->normalize($object->getFieldsToInclude(), 'json', $context);
        }
        if ($object->isInitialized('fields') && null !== $object->getFields()) {
            $values = [];
            foreach ($object->getFields() as $key => $value) {
                $values[$key] = $value;
            }
            $data['fields'] = $values;
        }

        return $data;
    }
}
