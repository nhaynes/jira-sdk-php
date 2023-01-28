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

class RichTextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\RichText';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\RichText';
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
        $object = new \JiraSdk\Model\RichText();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('empty', $data)) {
            $object->setEmpty($data['empty']);
            unset($data['empty']);
        }
        if (\array_key_exists('finalised', $data)) {
            $object->setFinalised($data['finalised']);
            unset($data['finalised']);
        }
        if (\array_key_exists('valueSet', $data)) {
            $object->setValueSet($data['valueSet']);
            unset($data['valueSet']);
        }
        if (\array_key_exists('emptyAdf', $data)) {
            $object->setEmptyAdf($data['emptyAdf']);
            unset($data['emptyAdf']);
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
        if ($object->isInitialized('empty') && null !== $object->getEmpty()) {
            $data['empty'] = $object->getEmpty();
        }
        if ($object->isInitialized('finalised') && null !== $object->getFinalised()) {
            $data['finalised'] = $object->getFinalised();
        }
        if ($object->isInitialized('valueSet') && null !== $object->getValueSet()) {
            $data['valueSet'] = $object->getValueSet();
        }
        if ($object->isInitialized('emptyAdf') && null !== $object->getEmptyAdf()) {
            $data['emptyAdf'] = $object->getEmptyAdf();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}
