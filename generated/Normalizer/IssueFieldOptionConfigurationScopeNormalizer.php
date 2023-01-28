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

class IssueFieldOptionConfigurationScopeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\IssueFieldOptionConfigurationScope';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\IssueFieldOptionConfigurationScope';
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
        $object = new \JiraSdk\Model\IssueFieldOptionConfigurationScope();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('projects', $data)) {
            $values = array();
            foreach ($data['projects'] as $value) {
                $values[] = $value;
            }
            $object->setProjects($values);
            unset($data['projects']);
        }
        if (\array_key_exists('projects2', $data)) {
            $values_1 = array();
            foreach ($data['projects2'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Model\\ProjectScopeBean', 'json', $context);
            }
            $object->setProjects2($values_1);
            unset($data['projects2']);
        }
        if (\array_key_exists('global', $data)) {
            $object->setGlobal($this->denormalizer->denormalize($data['global'], 'JiraSdk\\Model\\IssueFieldOptionScopeBeanGlobal', 'json', $context));
            unset($data['global']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
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
        if ($object->isInitialized('projects') && null !== $object->getProjects()) {
            $values = array();
            foreach ($object->getProjects() as $value) {
                $values[] = $value;
            }
            $data['projects'] = $values;
        }
        if ($object->isInitialized('projects2') && null !== $object->getProjects2()) {
            $values_1 = array();
            foreach ($object->getProjects2() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['projects2'] = $values_1;
        }
        if ($object->isInitialized('global') && null !== $object->getGlobal()) {
            $data['global'] = $this->normalizer->normalize($object->getGlobal(), 'json', $context);
        }
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }
        return $data;
    }
}
