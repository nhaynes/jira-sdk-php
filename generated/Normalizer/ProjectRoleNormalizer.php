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

class ProjectRoleNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\ProjectRole' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\ProjectRole' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\ProjectRole();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('actors', $data)) {
            $values = [];
            foreach ($data['actors'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\RoleActor', 'json', $context);
            }
            $object->setActors($values);
        }
        if (\array_key_exists('scope', $data)) {
            $object->setScope($this->denormalizer->denormalize($data['scope'], 'JiraSdk\\Api\\Model\\ProjectRoleScope', 'json', $context));
        }
        if (\array_key_exists('translatedName', $data)) {
            $object->setTranslatedName($data['translatedName']);
        }
        if (\array_key_exists('currentUserRole', $data)) {
            $object->setCurrentUserRole($data['currentUserRole']);
        }
        if (\array_key_exists('default', $data)) {
            $object->setDefault($data['default']);
        }
        if (\array_key_exists('admin', $data)) {
            $object->setAdmin($data['admin']);
        }
        if (\array_key_exists('roleConfigurable', $data)) {
            $object->setRoleConfigurable($data['roleConfigurable']);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if ($object->isInitialized('translatedName') && null !== $object->getTranslatedName()) {
            $data['translatedName'] = $object->getTranslatedName();
        }
        if ($object->isInitialized('currentUserRole') && null !== $object->getCurrentUserRole()) {
            $data['currentUserRole'] = $object->getCurrentUserRole();
        }

        return $data;
    }
}
