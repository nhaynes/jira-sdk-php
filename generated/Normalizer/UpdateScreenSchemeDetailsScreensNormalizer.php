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

class UpdateScreenSchemeDetailsScreensNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\UpdateScreenSchemeDetailsScreens';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\UpdateScreenSchemeDetailsScreens';
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
        $object = new \JiraSdk\Model\UpdateScreenSchemeDetailsScreens();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('edit', $data)) {
            $object->setEdit($data['edit']);
            unset($data['edit']);
        }
        if (\array_key_exists('create', $data)) {
            $object->setCreate($data['create']);
            unset($data['create']);
        }
        if (\array_key_exists('view', $data)) {
            $object->setView($data['view']);
            unset($data['view']);
        }
        if (\array_key_exists('default', $data)) {
            $object->setDefault($data['default']);
            unset($data['default']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('edit') && null !== $object->getEdit()) {
            $data['edit'] = $object->getEdit();
        }
        if ($object->isInitialized('create') && null !== $object->getCreate()) {
            $data['create'] = $object->getCreate();
        }
        if ($object->isInitialized('view') && null !== $object->getView()) {
            $data['view'] = $object->getView();
        }
        if ($object->isInitialized('default') && null !== $object->getDefault()) {
            $data['default'] = $object->getDefault();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}
