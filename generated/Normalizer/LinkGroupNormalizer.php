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

class LinkGroupNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\LinkGroup';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\LinkGroup';
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
        $object = new \JiraSdk\Model\LinkGroup();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        if (\array_key_exists('styleClass', $data)) {
            $object->setStyleClass($data['styleClass']);
        }
        if (\array_key_exists('header', $data)) {
            $object->setHeader($this->denormalizer->denormalize($data['header'], 'JiraSdk\\Model\\SimpleLink', 'json', $context));
        }
        if (\array_key_exists('weight', $data)) {
            $object->setWeight($data['weight']);
        }
        if (\array_key_exists('links', $data)) {
            $values = array();
            foreach ($data['links'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\SimpleLink', 'json', $context);
            }
            $object->setLinks($values);
        }
        if (\array_key_exists('groups', $data)) {
            $values_1 = array();
            foreach ($data['groups'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\LinkGroup', 'json', $context);
            }
            $object->setGroups($values_1);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if ($object->isInitialized('styleClass') && null !== $object->getStyleClass()) {
            $data['styleClass'] = $object->getStyleClass();
        }
        if ($object->isInitialized('header') && null !== $object->getHeader()) {
            $data['header'] = $this->normalizer->normalize($object->getHeader(), 'json', $context);
        }
        if ($object->isInitialized('weight') && null !== $object->getWeight()) {
            $data['weight'] = $object->getWeight();
        }
        if ($object->isInitialized('links') && null !== $object->getLinks()) {
            $values = array();
            foreach ($object->getLinks() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['links'] = $values;
        }
        if ($object->isInitialized('groups') && null !== $object->getGroups()) {
            $values_1 = array();
            foreach ($object->getGroups() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['groups'] = $values_1;
        }
        return $data;
    }
}
