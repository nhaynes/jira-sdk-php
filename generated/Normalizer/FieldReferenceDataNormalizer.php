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

class FieldReferenceDataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\FieldReferenceData' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\FieldReferenceData' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\FieldReferenceData();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('value', $data)) {
            $object->setValue($data['value']);
        }
        if (\array_key_exists('displayName', $data)) {
            $object->setDisplayName($data['displayName']);
        }
        if (\array_key_exists('orderable', $data)) {
            $object->setOrderable($data['orderable']);
        }
        if (\array_key_exists('searchable', $data)) {
            $object->setSearchable($data['searchable']);
        }
        if (\array_key_exists('deprecated', $data)) {
            $object->setDeprecated($data['deprecated']);
        }
        if (\array_key_exists('deprecatedSearcherKey', $data)) {
            $object->setDeprecatedSearcherKey($data['deprecatedSearcherKey']);
        }
        if (\array_key_exists('auto', $data)) {
            $object->setAuto($data['auto']);
        }
        if (\array_key_exists('cfid', $data)) {
            $object->setCfid($data['cfid']);
        }
        if (\array_key_exists('operators', $data)) {
            $values = [];
            foreach ($data['operators'] as $value) {
                $values[] = $value;
            }
            $object->setOperators($values);
        }
        if (\array_key_exists('types', $data)) {
            $values_1 = [];
            foreach ($data['types'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setTypes($values_1);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('value') && null !== $object->getValue()) {
            $data['value'] = $object->getValue();
        }
        if ($object->isInitialized('displayName') && null !== $object->getDisplayName()) {
            $data['displayName'] = $object->getDisplayName();
        }
        if ($object->isInitialized('orderable') && null !== $object->getOrderable()) {
            $data['orderable'] = $object->getOrderable();
        }
        if ($object->isInitialized('searchable') && null !== $object->getSearchable()) {
            $data['searchable'] = $object->getSearchable();
        }
        if ($object->isInitialized('deprecated') && null !== $object->getDeprecated()) {
            $data['deprecated'] = $object->getDeprecated();
        }
        if ($object->isInitialized('deprecatedSearcherKey') && null !== $object->getDeprecatedSearcherKey()) {
            $data['deprecatedSearcherKey'] = $object->getDeprecatedSearcherKey();
        }
        if ($object->isInitialized('auto') && null !== $object->getAuto()) {
            $data['auto'] = $object->getAuto();
        }
        if ($object->isInitialized('cfid') && null !== $object->getCfid()) {
            $data['cfid'] = $object->getCfid();
        }
        if ($object->isInitialized('operators') && null !== $object->getOperators()) {
            $values = [];
            foreach ($object->getOperators() as $value) {
                $values[] = $value;
            }
            $data['operators'] = $values;
        }
        if ($object->isInitialized('types') && null !== $object->getTypes()) {
            $values_1 = [];
            foreach ($object->getTypes() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['types'] = $values_1;
        }

        return $data;
    }
}
