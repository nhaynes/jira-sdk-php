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

class BulkProjectPermissionGrantsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\BulkProjectPermissionGrants';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\BulkProjectPermissionGrants';
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
        $object = new \JiraSdk\Model\BulkProjectPermissionGrants();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('permission', $data)) {
            $object->setPermission($data['permission']);
        }
        if (\array_key_exists('issues', $data)) {
            $values = array();
            foreach ($data['issues'] as $value) {
                $values[] = $value;
            }
            $object->setIssues($values);
        }
        if (\array_key_exists('projects', $data)) {
            $values_1 = array();
            foreach ($data['projects'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setProjects($values_1);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['permission'] = $object->getPermission();
        $values = array();
        foreach ($object->getIssues() as $value) {
            $values[] = $value;
        }
        $data['issues'] = $values;
        $values_1 = array();
        foreach ($object->getProjects() as $value_1) {
            $values_1[] = $value_1;
        }
        $data['projects'] = $values_1;
        return $data;
    }
}
