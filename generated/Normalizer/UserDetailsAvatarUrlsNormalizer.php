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

class UserDetailsAvatarUrlsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\UserDetailsAvatarUrls';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\UserDetailsAvatarUrls';
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
        $object = new \JiraSdk\Model\UserDetailsAvatarUrls();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('16x16', $data)) {
            $object->set16x16($data['16x16']);
            unset($data['16x16']);
        }
        if (\array_key_exists('24x24', $data)) {
            $object->set24x24($data['24x24']);
            unset($data['24x24']);
        }
        if (\array_key_exists('32x32', $data)) {
            $object->set32x32($data['32x32']);
            unset($data['32x32']);
        }
        if (\array_key_exists('48x48', $data)) {
            $object->set48x48($data['48x48']);
            unset($data['48x48']);
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
        if ($object->isInitialized('n16x16') && null !== $object->get16x16()) {
            $data['16x16'] = $object->get16x16();
        }
        if ($object->isInitialized('n24x24') && null !== $object->get24x24()) {
            $data['24x24'] = $object->get24x24();
        }
        if ($object->isInitialized('n32x32') && null !== $object->get32x32()) {
            $data['32x32'] = $object->get32x32();
        }
        if ($object->isInitialized('n48x48') && null !== $object->get48x48()) {
            $data['48x48'] = $object->get48x48();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}
