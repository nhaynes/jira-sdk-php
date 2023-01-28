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

class BulkPermissionsRequestBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\BulkPermissionsRequestBean';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\BulkPermissionsRequestBean';
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
        $object = new \JiraSdk\Model\BulkPermissionsRequestBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('projectPermissions', $data)) {
            $values = array();
            foreach ($data['projectPermissions'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\BulkProjectPermissions', 'json', $context);
            }
            $object->setProjectPermissions($values);
        }
        if (\array_key_exists('globalPermissions', $data)) {
            $values_1 = array();
            foreach ($data['globalPermissions'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setGlobalPermissions($values_1);
        }
        if (\array_key_exists('accountId', $data)) {
            $object->setAccountId($data['accountId']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('projectPermissions') && null !== $object->getProjectPermissions()) {
            $values = array();
            foreach ($object->getProjectPermissions() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['projectPermissions'] = $values;
        }
        if ($object->isInitialized('globalPermissions') && null !== $object->getGlobalPermissions()) {
            $values_1 = array();
            foreach ($object->getGlobalPermissions() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['globalPermissions'] = $values_1;
        }
        if ($object->isInitialized('accountId') && null !== $object->getAccountId()) {
            $data['accountId'] = $object->getAccountId();
        }
        return $data;
    }
}
