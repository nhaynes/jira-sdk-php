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

class EventNotificationFieldNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\EventNotificationField' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\EventNotificationField' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\EventNotificationField();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        if (\array_key_exists('key', $data)) {
            $object->setKey($data['key']);
            unset($data['key']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
            unset($data['name']);
        }
        if (\array_key_exists('custom', $data)) {
            $object->setCustom($data['custom']);
            unset($data['custom']);
        }
        if (\array_key_exists('orderable', $data)) {
            $object->setOrderable($data['orderable']);
            unset($data['orderable']);
        }
        if (\array_key_exists('navigable', $data)) {
            $object->setNavigable($data['navigable']);
            unset($data['navigable']);
        }
        if (\array_key_exists('searchable', $data)) {
            $object->setSearchable($data['searchable']);
            unset($data['searchable']);
        }
        if (\array_key_exists('clauseNames', $data)) {
            $values = [];
            foreach ($data['clauseNames'] as $value) {
                $values[] = $value;
            }
            $object->setClauseNames($values);
            unset($data['clauseNames']);
        }
        if (\array_key_exists('scope', $data)) {
            $object->setScope($this->denormalizer->denormalize($data['scope'], 'JiraSdk\\Api\\Model\\FieldDetailsScope', 'json', $context));
            unset($data['scope']);
        }
        if (\array_key_exists('schema', $data)) {
            $object->setSchema($this->denormalizer->denormalize($data['schema'], 'JiraSdk\\Api\\Model\\FieldDetailsSchema', 'json', $context));
            unset($data['schema']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if ($object->isInitialized('key') && null !== $object->getKey()) {
            $data['key'] = $object->getKey();
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if ($object->isInitialized('custom') && null !== $object->getCustom()) {
            $data['custom'] = $object->getCustom();
        }
        if ($object->isInitialized('orderable') && null !== $object->getOrderable()) {
            $data['orderable'] = $object->getOrderable();
        }
        if ($object->isInitialized('navigable') && null !== $object->getNavigable()) {
            $data['navigable'] = $object->getNavigable();
        }
        if ($object->isInitialized('searchable') && null !== $object->getSearchable()) {
            $data['searchable'] = $object->getSearchable();
        }
        if ($object->isInitialized('clauseNames') && null !== $object->getClauseNames()) {
            $values = [];
            foreach ($object->getClauseNames() as $value) {
                $values[] = $value;
            }
            $data['clauseNames'] = $values;
        }
        if ($object->isInitialized('scope') && null !== $object->getScope()) {
            $data['scope'] = $this->normalizer->normalize($object->getScope(), 'json', $context);
        }
        if ($object->isInitialized('schema') && null !== $object->getSchema()) {
            $data['schema'] = $this->normalizer->normalize($object->getSchema(), 'json', $context);
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }
}
