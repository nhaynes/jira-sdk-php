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

class IssueTransitionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\IssueTransition' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\IssueTransition' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\IssueTransition();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
            unset($data['name']);
        }
        if (\array_key_exists('to', $data)) {
            $object->setTo($this->denormalizer->denormalize($data['to'], 'JiraSdk\\Api\\Model\\IssueTransitionTo', 'json', $context));
            unset($data['to']);
        }
        if (\array_key_exists('hasScreen', $data)) {
            $object->setHasScreen($data['hasScreen']);
            unset($data['hasScreen']);
        }
        if (\array_key_exists('isGlobal', $data)) {
            $object->setIsGlobal($data['isGlobal']);
            unset($data['isGlobal']);
        }
        if (\array_key_exists('isInitial', $data)) {
            $object->setIsInitial($data['isInitial']);
            unset($data['isInitial']);
        }
        if (\array_key_exists('isAvailable', $data)) {
            $object->setIsAvailable($data['isAvailable']);
            unset($data['isAvailable']);
        }
        if (\array_key_exists('isConditional', $data)) {
            $object->setIsConditional($data['isConditional']);
            unset($data['isConditional']);
        }
        if (\array_key_exists('fields', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['fields'] as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\FieldMetadata', 'json', $context);
            }
            $object->setFields($values);
            unset($data['fields']);
        }
        if (\array_key_exists('expand', $data)) {
            $object->setExpand($data['expand']);
            unset($data['expand']);
        }
        if (\array_key_exists('looped', $data)) {
            $object->setLooped($data['looped']);
            unset($data['looped']);
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_1;
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
        if ($object->isInitialized('looped') && null !== $object->getLooped()) {
            $data['looped'] = $object->getLooped();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
