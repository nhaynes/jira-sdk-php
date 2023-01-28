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

class IssueTypeSchemeProjectsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\IssueTypeSchemeProjects';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\IssueTypeSchemeProjects';
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
        $object = new \JiraSdk\Model\IssueTypeSchemeProjects();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('issueTypeScheme', $data)) {
            $object->setIssueTypeScheme($this->denormalizer->denormalize($data['issueTypeScheme'], 'JiraSdk\\Model\\IssueTypeSchemeProjectsIssueTypeScheme', 'json', $context));
        }
        if (\array_key_exists('projectIds', $data)) {
            $values = array();
            foreach ($data['projectIds'] as $value) {
                $values[] = $value;
            }
            $object->setProjectIds($values);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['issueTypeScheme'] = $this->normalizer->normalize($object->getIssueTypeScheme(), 'json', $context);
        $values = array();
        foreach ($object->getProjectIds() as $value) {
            $values[] = $value;
        }
        $data['projectIds'] = $values;
        return $data;
    }
}
