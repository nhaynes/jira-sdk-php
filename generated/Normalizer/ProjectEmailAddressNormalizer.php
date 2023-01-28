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

class ProjectEmailAddressNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\ProjectEmailAddress';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\ProjectEmailAddress';
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
        $object = new \JiraSdk\Model\ProjectEmailAddress();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('emailAddress', $data)) {
            $object->setEmailAddress($data['emailAddress']);
        }
        if (\array_key_exists('emailAddressStatus', $data)) {
            $values = array();
            foreach ($data['emailAddressStatus'] as $value) {
                $values[] = $value;
            }
            $object->setEmailAddressStatus($values);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('emailAddress') && null !== $object->getEmailAddress()) {
            $data['emailAddress'] = $object->getEmailAddress();
        }
        if ($object->isInitialized('emailAddressStatus') && null !== $object->getEmailAddressStatus()) {
            $values = array();
            foreach ($object->getEmailAddressStatus() as $value) {
                $values[] = $value;
            }
            $data['emailAddressStatus'] = $values;
        }
        return $data;
    }
}
