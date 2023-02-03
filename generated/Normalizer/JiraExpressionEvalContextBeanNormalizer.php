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

class JiraExpressionEvalContextBeanNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\JiraExpressionEvalContextBean' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\JiraExpressionEvalContextBean' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\JiraExpressionEvalContextBean();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('issue', $data)) {
            $object->setIssue($this->denormalizer->denormalize($data['issue'], 'JiraSdk\\Api\\Model\\JiraExpressionEvalContextBeanIssue', 'json', $context));
        }
        if (\array_key_exists('issues', $data)) {
            $object->setIssues($this->denormalizer->denormalize($data['issues'], 'JiraSdk\\Api\\Model\\JiraExpressionEvalContextBeanIssues', 'json', $context));
        }
        if (\array_key_exists('project', $data)) {
            $object->setProject($this->denormalizer->denormalize($data['project'], 'JiraSdk\\Api\\Model\\JiraExpressionEvalContextBeanProject', 'json', $context));
        }
        if (\array_key_exists('sprint', $data)) {
            $object->setSprint($data['sprint']);
        }
        if (\array_key_exists('board', $data)) {
            $object->setBoard($data['board']);
        }
        if (\array_key_exists('serviceDesk', $data)) {
            $object->setServiceDesk($data['serviceDesk']);
        }
        if (\array_key_exists('customerRequest', $data)) {
            $object->setCustomerRequest($data['customerRequest']);
        }
        if (\array_key_exists('custom', $data)) {
            $values = [];
            foreach ($data['custom'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Api\\Model\\CustomContextVariable', 'json', $context);
            }
            $object->setCustom($values);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
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
            $values = [];
            foreach ($object->getCustom() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['custom'] = $values;
        }

        return $data;
    }
}
