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

class DashboardGadgetSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\DashboardGadgetSettings';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\DashboardGadgetSettings';
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
        $object = new \JiraSdk\Model\DashboardGadgetSettings();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('moduleKey', $data)) {
            $object->setModuleKey($data['moduleKey']);
        }
        if (\array_key_exists('uri', $data)) {
            $object->setUri($data['uri']);
        }
        if (\array_key_exists('color', $data)) {
            $object->setColor($data['color']);
        }
        if (\array_key_exists('position', $data)) {
            $object->setPosition($this->denormalizer->denormalize($data['position'], 'JiraSdk\\Model\\DashboardGadgetSettingsPosition', 'json', $context));
        }
        if (\array_key_exists('title', $data)) {
            $object->setTitle($data['title']);
        }
        if (\array_key_exists('ignoreUriAndModuleKeyValidation', $data)) {
            $object->setIgnoreUriAndModuleKeyValidation($data['ignoreUriAndModuleKeyValidation']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('moduleKey') && null !== $object->getModuleKey()) {
            $data['moduleKey'] = $object->getModuleKey();
        }
        if ($object->isInitialized('uri') && null !== $object->getUri()) {
            $data['uri'] = $object->getUri();
        }
        if ($object->isInitialized('color') && null !== $object->getColor()) {
            $data['color'] = $object->getColor();
        }
        if ($object->isInitialized('position') && null !== $object->getPosition()) {
            $data['position'] = $this->normalizer->normalize($object->getPosition(), 'json', $context);
        }
        if ($object->isInitialized('title') && null !== $object->getTitle()) {
            $data['title'] = $object->getTitle();
        }
        if ($object->isInitialized('ignoreUriAndModuleKeyValidation') && null !== $object->getIgnoreUriAndModuleKeyValidation()) {
            $data['ignoreUriAndModuleKeyValidation'] = $object->getIgnoreUriAndModuleKeyValidation();
        }
        return $data;
    }
}
