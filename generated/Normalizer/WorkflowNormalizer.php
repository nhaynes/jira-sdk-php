<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Api\Runtime\Normalizer\CheckArray;
use JiraSdk\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class WorkflowNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\Workflow' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\Workflow' === \get_class($data);
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Api\Model\Workflow();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($this->denormalizer->denormalize($data['id'], 'JiraSdk\\Api\\Model\\PublishedWorkflowId', 'json', $context));
        }
        if (\array_key_exists('description', $data)) {
            $object->setDescription($data['description']);
        }
        if (\array_key_exists('transitions', $data)) {
            $values = [];
            foreach ($data['transitions'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\Transition', 'json', $context);
            }
            $object->setTransitions($values);
        }
        if (\array_key_exists('statuses', $data)) {
            $values_1 = [];
            foreach ($data['statuses'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Api\\Model\\WorkflowStatus', 'json', $context);
            }
            $object->setStatuses($values_1);
        }
        if (\array_key_exists('isDefault', $data)) {
            $object->setIsDefault($data['isDefault']);
        }
        if (\array_key_exists('schemes', $data)) {
            $values_2 = [];
            foreach ($data['schemes'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'JiraSdk\\Api\\Model\\WorkflowSchemeIdName', 'json', $context);
            }
            $object->setSchemes($values_2);
        }
        if (\array_key_exists('projects', $data)) {
            $values_3 = [];
            foreach ($data['projects'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'JiraSdk\\Api\\Model\\ProjectDetails', 'json', $context);
            }
            $object->setProjects($values_3);
        }
        if (\array_key_exists('hasDraftWorkflow', $data)) {
            $object->setHasDraftWorkflow($data['hasDraftWorkflow']);
        }
        if (\array_key_exists('operations', $data)) {
            $object->setOperations($this->denormalizer->denormalize($data['operations'], 'JiraSdk\\Api\\Model\\WorkflowOperations', 'json', $context));
        }
        if (\array_key_exists('created', $data)) {
            $object->setCreated(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['created']));
        }
        if (\array_key_exists('updated', $data)) {
            $object->setUpdated(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['updated']));
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $data['id'] = $this->normalizer->normalize($object->getId(), 'json', $context);
        $data['description'] = $object->getDescription();
        if ($object->isInitialized('transitions') && null !== $object->getTransitions()) {
            $values = [];
            foreach ($object->getTransitions() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['transitions'] = $values;
        }
        if ($object->isInitialized('statuses') && null !== $object->getStatuses()) {
            $values_1 = [];
            foreach ($object->getStatuses() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['statuses'] = $values_1;
        }
        if ($object->isInitialized('isDefault') && null !== $object->getIsDefault()) {
            $data['isDefault'] = $object->getIsDefault();
        }
        if ($object->isInitialized('schemes') && null !== $object->getSchemes()) {
            $values_2 = [];
            foreach ($object->getSchemes() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['schemes'] = $values_2;
        }
        if ($object->isInitialized('projects') && null !== $object->getProjects()) {
            $values_3 = [];
            foreach ($object->getProjects() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['projects'] = $values_3;
        }
        if ($object->isInitialized('hasDraftWorkflow') && null !== $object->getHasDraftWorkflow()) {
            $data['hasDraftWorkflow'] = $object->getHasDraftWorkflow();
        }
        if ($object->isInitialized('operations') && null !== $object->getOperations()) {
            $data['operations'] = $this->normalizer->normalize($object->getOperations(), 'json', $context);
        }
        if ($object->isInitialized('created') && null !== $object->getCreated()) {
            $data['created'] = $object->getCreated()->format('Y-m-d\\TH:i:sP');
        }
        if ($object->isInitialized('updated') && null !== $object->getUpdated()) {
            $data['updated'] = $object->getUpdated()->format('Y-m-d\\TH:i:sP');
        }

        return $data;
    }
}
