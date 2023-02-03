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

class RemoveOptionFromIssuesResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\RemoveOptionFromIssuesResult' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\RemoveOptionFromIssuesResult' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\RemoveOptionFromIssuesResult();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('modifiedIssues', $data)) {
            $values = [];
            foreach ($data['modifiedIssues'] as $value) {
                $values[] = $value;
            }
            $object->setModifiedIssues($values);
        }
        if (\array_key_exists('unmodifiedIssues', $data)) {
            $values_1 = [];
            foreach ($data['unmodifiedIssues'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setUnmodifiedIssues($values_1);
        }
        if (\array_key_exists('errors', $data)) {
            $object->setErrors($this->denormalizer->denormalize($data['errors'], 'JiraSdk\\Api\\Model\\RemoveOptionFromIssuesResultErrors', 'json', $context));
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('modifiedIssues') && null !== $object->getModifiedIssues()) {
            $values = [];
            foreach ($object->getModifiedIssues() as $value) {
                $values[] = $value;
            }
            $data['modifiedIssues'] = $values;
        }
        if ($object->isInitialized('unmodifiedIssues') && null !== $object->getUnmodifiedIssues()) {
            $values_1 = [];
            foreach ($object->getUnmodifiedIssues() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['unmodifiedIssues'] = $values_1;
        }
        if ($object->isInitialized('errors') && null !== $object->getErrors()) {
            $data['errors'] = $this->normalizer->normalize($object->getErrors(), 'json', $context);
        }

        return $data;
    }
}
