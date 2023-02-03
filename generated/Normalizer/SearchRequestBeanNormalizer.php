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

class SearchRequestBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\SearchRequestBean' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\SearchRequestBean' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\SearchRequestBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('jql', $data)) {
            $object->setJql($data['jql']);
        }
        if (\array_key_exists('startAt', $data)) {
            $object->setStartAt($data['startAt']);
        }
        if (\array_key_exists('maxResults', $data)) {
            $object->setMaxResults($data['maxResults']);
        }
        if (\array_key_exists('fields', $data)) {
            $values = [];
            foreach ($data['fields'] as $value) {
                $values[] = $value;
            }
            $object->setFields($values);
        }
        if (\array_key_exists('validateQuery', $data)) {
            $object->setValidateQuery($data['validateQuery']);
        }
        if (\array_key_exists('expand', $data)) {
            $values_1 = [];
            foreach ($data['expand'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExpand($values_1);
        }
        if (\array_key_exists('properties', $data)) {
            $values_2 = [];
            foreach ($data['properties'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setProperties($values_2);
        }
        if (\array_key_exists('fieldsByKeys', $data)) {
            $object->setFieldsByKeys($data['fieldsByKeys']);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('jql') && null !== $object->getJql()) {
            $data['jql'] = $object->getJql();
        }
        if ($object->isInitialized('startAt') && null !== $object->getStartAt()) {
            $data['startAt'] = $object->getStartAt();
        }
        if ($object->isInitialized('maxResults') && null !== $object->getMaxResults()) {
            $data['maxResults'] = $object->getMaxResults();
        }
        if ($object->isInitialized('fields') && null !== $object->getFields()) {
            $values = [];
            foreach ($object->getFields() as $value) {
                $values[] = $value;
            }
            $data['fields'] = $values;
        }
        if ($object->isInitialized('validateQuery') && null !== $object->getValidateQuery()) {
            $data['validateQuery'] = $object->getValidateQuery();
        }
        if ($object->isInitialized('expand') && null !== $object->getExpand()) {
            $values_1 = [];
            foreach ($object->getExpand() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['expand'] = $values_1;
        }
        if ($object->isInitialized('properties') && null !== $object->getProperties()) {
            $values_2 = [];
            foreach ($object->getProperties() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['properties'] = $values_2;
        }
        if ($object->isInitialized('fieldsByKeys') && null !== $object->getFieldsByKeys()) {
            $data['fieldsByKeys'] = $object->getFieldsByKeys();
        }

        return $data;
    }
}
