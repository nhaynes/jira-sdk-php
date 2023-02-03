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

class CustomContextVariableNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\CustomContextVariable' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\CustomContextVariable' === \get_class($data);
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (\array_key_exists('type', $data) && 'user' === $data['type']) {
            return $this->denormalizer->denormalize($data, 'JiraSdk\\Api\\Model\\UserContextVariable', $format, $context);
        }
        if (\array_key_exists('type', $data) && 'issue' === $data['type']) {
            return $this->denormalizer->denormalize($data, 'JiraSdk\\Api\\Model\\IssueContextVariable', $format, $context);
        }
        if (\array_key_exists('type', $data) && 'json' === $data['type']) {
            return $this->denormalizer->denormalize($data, 'JiraSdk\\Api\\Model\\JsonContextVariable', $format, $context);
        }
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Api\Model\CustomContextVariable();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('type', $data)) {
            $object->setType($data['type']);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getType() && 'user' === $object->getType()) {
            return $this->normalizer->normalize($object, $format, $context);
        }
        if (null !== $object->getType() && 'issue' === $object->getType()) {
            return $this->normalizer->normalize($object, $format, $context);
        }
        if (null !== $object->getType() && 'json' === $object->getType()) {
            return $this->normalizer->normalize($object, $format, $context);
        }
        $data['type'] = $object->getType();

        return $data;
    }
}
