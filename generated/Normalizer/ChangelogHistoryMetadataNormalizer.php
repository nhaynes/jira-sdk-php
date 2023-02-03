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

class ChangelogHistoryMetadataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\ChangelogHistoryMetadata' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\ChangelogHistoryMetadata' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\ChangelogHistoryMetadata();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('type', $data)) {
            $object->setType($data['type']);
            unset($data['type']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
            unset($data['description']);
        }
        if (\array_key_exists('descriptionKey', $data)) {
            $object->setDescriptionKey($data['descriptionKey']);
            unset($data['descriptionKey']);
        }
        if (\array_key_exists('activityDescription', $data)) {
            $object->setActivityDescription($data['activityDescription']);
            unset($data['activityDescription']);
        }
        if (\array_key_exists('activityDescriptionKey', $data)) {
            $object->setActivityDescriptionKey($data['activityDescriptionKey']);
            unset($data['activityDescriptionKey']);
        }
        if (\array_key_exists('emailDescription', $data)) {
            $object->setEmailDescription($data['emailDescription']);
            unset($data['emailDescription']);
        }
        if (\array_key_exists('emailDescriptionKey', $data)) {
            $object->setEmailDescriptionKey($data['emailDescriptionKey']);
            unset($data['emailDescriptionKey']);
        }
        if (\array_key_exists('actor', $data)) {
            $object->setActor($this->denormalizer->denormalize($data['actor'], 'JiraSdk\\Api\\Model\\HistoryMetadataActor', 'json', $context));
            unset($data['actor']);
        }
        if (\array_key_exists('generator', $data)) {
            $object->setGenerator($this->denormalizer->denormalize($data['generator'], 'JiraSdk\\Api\\Model\\HistoryMetadataGenerator', 'json', $context));
            unset($data['generator']);
        }
        if (\array_key_exists('cause', $data)) {
            $object->setCause($this->denormalizer->denormalize($data['cause'], 'JiraSdk\\Api\\Model\\HistoryMetadataCause', 'json', $context));
            unset($data['cause']);
        }
        if (\array_key_exists('extraData', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['extraData'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setExtraData($values);
            unset($data['extraData']);
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
        if ($object->isInitialized('type') && null !== $object->getType()) {
            $data['type'] = $object->getType();
        }
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if ($object->isInitialized('descriptionKey') && null !== $object->getDescriptionKey()) {
            $data['descriptionKey'] = $object->getDescriptionKey();
        }
        if ($object->isInitialized('activityDescription') && null !== $object->getActivityDescription()) {
            $data['activityDescription'] = $object->getActivityDescription();
        }
        if ($object->isInitialized('activityDescriptionKey') && null !== $object->getActivityDescriptionKey()) {
            $data['activityDescriptionKey'] = $object->getActivityDescriptionKey();
        }
        if ($object->isInitialized('emailDescription') && null !== $object->getEmailDescription()) {
            $data['emailDescription'] = $object->getEmailDescription();
        }
        if ($object->isInitialized('emailDescriptionKey') && null !== $object->getEmailDescriptionKey()) {
            $data['emailDescriptionKey'] = $object->getEmailDescriptionKey();
        }
        if ($object->isInitialized('actor') && null !== $object->getActor()) {
            $data['actor'] = $this->normalizer->normalize($object->getActor(), 'json', $context);
        }
        if ($object->isInitialized('generator') && null !== $object->getGenerator()) {
            $data['generator'] = $this->normalizer->normalize($object->getGenerator(), 'json', $context);
        }
        if ($object->isInitialized('cause') && null !== $object->getCause()) {
            $data['cause'] = $this->normalizer->normalize($object->getCause(), 'json', $context);
        }
        if ($object->isInitialized('extraData') && null !== $object->getExtraData()) {
            $values = [];
            foreach ($object->getExtraData() as $key => $value) {
                $values[$key] = $value;
            }
            $data['extraData'] = $values;
        }
        foreach ($object as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_1;
            }
        }

        return $data;
    }
}
