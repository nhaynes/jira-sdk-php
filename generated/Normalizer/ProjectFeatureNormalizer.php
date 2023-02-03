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

class ProjectFeatureNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\ProjectFeature' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\ProjectFeature' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\ProjectFeature();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('projectId', $data)) {
            $object->setProjectId($data['projectId']);
        }
        if (\array_key_exists('state', $data)) {
            $object->setState($data['state']);
        }
        if (\array_key_exists('toggleLocked', $data)) {
            $object->setToggleLocked($data['toggleLocked']);
        }
        if (\array_key_exists('feature', $data)) {
            $object->setFeature($data['feature']);
        }
        if (\array_key_exists('prerequisites', $data)) {
            $values = [];
            foreach ($data['prerequisites'] as $value) {
                $values[] = $value;
            }
            $object->setPrerequisites($values);
        }
        if (\array_key_exists('localisedName', $data)) {
            $object->setLocalisedName($data['localisedName']);
        }
        if (\array_key_exists('localisedDescription', $data)) {
            $object->setLocalisedDescription($data['localisedDescription']);
        }
        if (\array_key_exists('imageUri', $data)) {
            $object->setImageUri($data['imageUri']);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('projectId') && null !== $object->getProjectId()) {
            $data['projectId'] = $object->getProjectId();
        }
        if ($object->isInitialized('state') && null !== $object->getState()) {
            $data['state'] = $object->getState();
        }
        if ($object->isInitialized('toggleLocked') && null !== $object->getToggleLocked()) {
            $data['toggleLocked'] = $object->getToggleLocked();
        }
        if ($object->isInitialized('feature') && null !== $object->getFeature()) {
            $data['feature'] = $object->getFeature();
        }
        if ($object->isInitialized('prerequisites') && null !== $object->getPrerequisites()) {
            $values = [];
            foreach ($object->getPrerequisites() as $value) {
                $values[] = $value;
            }
            $data['prerequisites'] = $values;
        }
        if ($object->isInitialized('localisedName') && null !== $object->getLocalisedName()) {
            $data['localisedName'] = $object->getLocalisedName();
        }
        if ($object->isInitialized('localisedDescription') && null !== $object->getLocalisedDescription()) {
            $data['localisedDescription'] = $object->getLocalisedDescription();
        }
        if ($object->isInitialized('imageUri') && null !== $object->getImageUri()) {
            $data['imageUri'] = $object->getImageUri();
        }

        return $data;
    }
}
