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

class SanitizedJqlQueryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\SanitizedJqlQuery' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\SanitizedJqlQuery' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\SanitizedJqlQuery();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('initialQuery', $data)) {
            $object->setInitialQuery($data['initialQuery']);
        }
        if (\array_key_exists('sanitizedQuery', $data) && null !== $data['sanitizedQuery']) {
            $object->setSanitizedQuery($data['sanitizedQuery']);
        } elseif (\array_key_exists('sanitizedQuery', $data) && null === $data['sanitizedQuery']) {
            $object->setSanitizedQuery(null);
        }
        if (\array_key_exists('errors', $data)) {
            $object->setErrors($this->denormalizer->denormalize($data['errors'], 'JiraSdk\\Api\\Model\\SanitizedJqlQueryErrors', 'json', $context));
        }
        if (\array_key_exists('accountId', $data) && null !== $data['accountId']) {
            $object->setAccountId($data['accountId']);
        } elseif (\array_key_exists('accountId', $data) && null === $data['accountId']) {
            $object->setAccountId(null);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('initialQuery') && null !== $object->getInitialQuery()) {
            $data['initialQuery'] = $object->getInitialQuery();
        }
        if ($object->isInitialized('sanitizedQuery') && null !== $object->getSanitizedQuery()) {
            $data['sanitizedQuery'] = $object->getSanitizedQuery();
        }
        if ($object->isInitialized('errors') && null !== $object->getErrors()) {
            $data['errors'] = $this->normalizer->normalize($object->getErrors(), 'json', $context);
        }
        if ($object->isInitialized('accountId') && null !== $object->getAccountId()) {
            $data['accountId'] = $object->getAccountId();
        }

        return $data;
    }
}
