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

class FilterNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\Filter' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\Filter' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\Filter();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('owner', $data)) {
            $object->setOwner($this->denormalizer->denormalize($data['owner'], 'JiraSdk\\Api\\Model\\FilterOwner', 'json', $context));
        }
        if (\array_key_exists('jql', $data)) {
            $object->setJql($data['jql']);
        }
        if (\array_key_exists('viewUrl', $data)) {
            $object->setViewUrl($data['viewUrl']);
        }
        if (\array_key_exists('searchUrl', $data)) {
            $object->setSearchUrl($data['searchUrl']);
        }
        if (\array_key_exists('favourite', $data)) {
            $object->setFavourite($data['favourite']);
        }
        if (\array_key_exists('favouritedCount', $data)) {
            $object->setFavouritedCount($data['favouritedCount']);
        }
        if (\array_key_exists('sharePermissions', $data)) {
            $values = [];
            foreach ($data['sharePermissions'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\SharePermission', 'json', $context);
            }
            $object->setSharePermissions($values);
        }
        if (\array_key_exists('editPermissions', $data)) {
            $values_1 = [];
            foreach ($data['editPermissions'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Api\\Model\\SharePermission', 'json', $context);
            }
            $object->setEditPermissions($values_1);
        }
        if (\array_key_exists('sharedUsers', $data)) {
            $object->setSharedUsers($this->denormalizer->denormalize($data['sharedUsers'], 'JiraSdk\\Api\\Model\\FilterSharedUsers', 'json', $context));
        }
        if (\array_key_exists('subscriptions', $data)) {
            $object->setSubscriptions($this->denormalizer->denormalize($data['subscriptions'], 'JiraSdk\\Api\\Model\\FilterSubscriptions', 'json', $context));
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $data['name'] = $object->getName();
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if ($object->isInitialized('jql') && null !== $object->getJql()) {
            $data['jql'] = $object->getJql();
        }
        if ($object->isInitialized('favourite') && null !== $object->getFavourite()) {
            $data['favourite'] = $object->getFavourite();
        }
        if ($object->isInitialized('sharePermissions') && null !== $object->getSharePermissions()) {
            $values = [];
            foreach ($object->getSharePermissions() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['sharePermissions'] = $values;
        }
        if ($object->isInitialized('editPermissions') && null !== $object->getEditPermissions()) {
            $values_1 = [];
            foreach ($object->getEditPermissions() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['editPermissions'] = $values_1;
        }

        return $data;
    }
}
