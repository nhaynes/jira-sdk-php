<?php

namespace JiraSdk\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Runtime\Normalizer\CheckArray;
use JiraSdk\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ProjectRoleNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\ProjectRole';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\ProjectRole';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Model\ProjectRole();
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
            $values = array();
            foreach ($data['actors'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\RoleActor', 'json', $context);
            }
            $object->setActors($values);
        }
        if (\array_key_exists('scope', $data)) {
            $object->setScope($this->denormalizer->denormalize($data['scope'], 'JiraSdk\\Model\\ProjectRoleScope', 'json', $context));
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
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
