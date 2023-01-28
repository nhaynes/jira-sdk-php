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

class JiraExpressionEvalRequestBeanContextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\JiraExpressionEvalRequestBeanContext';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\JiraExpressionEvalRequestBeanContext';
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
        $object = new \JiraSdk\Model\JiraExpressionEvalRequestBeanContext();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('issue', $data)) {
            $object->setIssue($this->denormalizer->denormalize($data['issue'], 'JiraSdk\\Model\\JiraExpressionEvalContextBeanIssue', 'json', $context));
            unset($data['issue']);
        }
        if (\array_key_exists('issues', $data)) {
            $object->setIssues($this->denormalizer->denormalize($data['issues'], 'JiraSdk\\Model\\JiraExpressionEvalContextBeanIssues', 'json', $context));
            unset($data['issues']);
        }
        if (\array_key_exists('project', $data)) {
            $object->setProject($this->denormalizer->denormalize($data['project'], 'JiraSdk\\Model\\JiraExpressionEvalContextBeanProject', 'json', $context));
            unset($data['project']);
        }
        if (\array_key_exists('sprint', $data)) {
            $object->setSprint($data['sprint']);
            unset($data['sprint']);
        }
        if (\array_key_exists('board', $data)) {
            $object->setBoard($data['board']);
            unset($data['board']);
        }
        if (\array_key_exists('serviceDesk', $data)) {
            $object->setServiceDesk($data['serviceDesk']);
            unset($data['serviceDesk']);
        }
        if (\array_key_exists('customerRequest', $data)) {
            $object->setCustomerRequest($data['customerRequest']);
            unset($data['customerRequest']);
        }
        if (\array_key_exists('custom', $data)) {
            $values = array();
            foreach ($data['custom'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\CustomContextVariable', 'json', $context);
            }
            $object->setCustom($values);
            unset($data['custom']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        if ($object->isInitialized('issue') && null !== $object->getIssue()) {
            $data['issue'] = $this->normalizer->normalize($object->getIssue(), 'json', $context);
        }
        if ($object->isInitialized('issues') && null !== $object->getIssues()) {
            $data['issues'] = $this->normalizer->normalize($object->getIssues(), 'json', $context);
        }
        if ($object->isInitialized('project') && null !== $object->getProject()) {
            $data['project'] = $this->normalizer->normalize($object->getProject(), 'json', $context);
        }
        if ($object->isInitialized('sprint') && null !== $object->getSprint()) {
            $data['sprint'] = $object->getSprint();
        }
        if ($object->isInitialized('board') && null !== $object->getBoard()) {
            $data['board'] = $object->getBoard();
        }
        if ($object->isInitialized('serviceDesk') && null !== $object->getServiceDesk()) {
            $data['serviceDesk'] = $object->getServiceDesk();
        }
        if ($object->isInitialized('customerRequest') && null !== $object->getCustomerRequest()) {
            $data['customerRequest'] = $object->getCustomerRequest();
        }
        if ($object->isInitialized('custom') && null !== $object->getCustom()) {
            $values = array();
            foreach ($object->getCustom() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['custom'] = $values;
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}
