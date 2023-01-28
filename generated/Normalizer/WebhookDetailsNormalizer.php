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

class WebhookDetailsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\WebhookDetails';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\WebhookDetails';
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
        $object = new \JiraSdk\Model\WebhookDetails();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('jqlFilter', $data)) {
            $object->setJqlFilter($data['jqlFilter']);
        }
        if (\array_key_exists('fieldIdsFilter', $data)) {
            $values = array();
            foreach ($data['fieldIdsFilter'] as $value) {
                $values[] = $value;
            }
            $object->setFieldIdsFilter($values);
        }
        if (\array_key_exists('issuePropertyKeysFilter', $data)) {
            $values_1 = array();
            foreach ($data['issuePropertyKeysFilter'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setIssuePropertyKeysFilter($values_1);
        }
        if (\array_key_exists('events', $data)) {
            $values_2 = array();
            foreach ($data['events'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setEvents($values_2);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['jqlFilter'] = $object->getJqlFilter();
        if ($object->isInitialized('fieldIdsFilter') && null !== $object->getFieldIdsFilter()) {
            $values = array();
            foreach ($object->getFieldIdsFilter() as $value) {
                $values[] = $value;
            }
            $data['fieldIdsFilter'] = $values;
        }
        if ($object->isInitialized('issuePropertyKeysFilter') && null !== $object->getIssuePropertyKeysFilter()) {
            $values_1 = array();
            foreach ($object->getIssuePropertyKeysFilter() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['issuePropertyKeysFilter'] = $values_1;
        }
        $values_2 = array();
        foreach ($object->getEvents() as $value_2) {
            $values_2[] = $value_2;
        }
        $data['events'] = $values_2;
        return $data;
    }
}
