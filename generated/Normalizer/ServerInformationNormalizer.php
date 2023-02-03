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

class ServerInformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\ServerInformation' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\ServerInformation' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\ServerInformation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('baseUrl', $data)) {
            $object->setBaseUrl($data['baseUrl']);
        }
        if (\array_key_exists('version', $data)) {
            $object->setVersion($data['version']);
        }
        if (\array_key_exists('versionNumbers', $data)) {
            $values = [];
            foreach ($data['versionNumbers'] as $value) {
                $values[] = $value;
            }
            $object->setVersionNumbers($values);
        }
        if (\array_key_exists('deploymentType', $data)) {
            $object->setDeploymentType($data['deploymentType']);
        }
        if (\array_key_exists('buildNumber', $data)) {
            $object->setBuildNumber($data['buildNumber']);
        }
        if (\array_key_exists('buildDate', $data)) {
            $object->setBuildDate(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['buildDate']));
        }
        if (\array_key_exists('serverTime', $data)) {
            $object->setServerTime(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['serverTime']));
        }
        if (\array_key_exists('scmInfo', $data)) {
            $object->setScmInfo($data['scmInfo']);
        }
        if (\array_key_exists('serverTitle', $data)) {
            $object->setServerTitle($data['serverTitle']);
        }
        if (\array_key_exists('healthChecks', $data)) {
            $values_1 = [];
            foreach ($data['healthChecks'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Api\\Model\\HealthCheckResult', 'json', $context);
            }
            $object->setHealthChecks($values_1);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('baseUrl') && null !== $object->getBaseUrl()) {
            $data['baseUrl'] = $object->getBaseUrl();
        }
        if ($object->isInitialized('version') && null !== $object->getVersion()) {
            $data['version'] = $object->getVersion();
        }
        if ($object->isInitialized('versionNumbers') && null !== $object->getVersionNumbers()) {
            $values = [];
            foreach ($object->getVersionNumbers() as $value) {
                $values[] = $value;
            }
            $data['versionNumbers'] = $values;
        }
        if ($object->isInitialized('deploymentType') && null !== $object->getDeploymentType()) {
            $data['deploymentType'] = $object->getDeploymentType();
        }
        if ($object->isInitialized('buildNumber') && null !== $object->getBuildNumber()) {
            $data['buildNumber'] = $object->getBuildNumber();
        }
        if ($object->isInitialized('buildDate') && null !== $object->getBuildDate()) {
            $data['buildDate'] = $object->getBuildDate()->format('Y-m-d\\TH:i:sP');
        }
        if ($object->isInitialized('serverTime') && null !== $object->getServerTime()) {
            $data['serverTime'] = $object->getServerTime()->format('Y-m-d\\TH:i:sP');
        }
        if ($object->isInitialized('scmInfo') && null !== $object->getScmInfo()) {
            $data['scmInfo'] = $object->getScmInfo();
        }
        if ($object->isInitialized('serverTitle') && null !== $object->getServerTitle()) {
            $data['serverTitle'] = $object->getServerTitle();
        }
        if ($object->isInitialized('healthChecks') && null !== $object->getHealthChecks()) {
            $values_1 = [];
            foreach ($object->getHealthChecks() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['healthChecks'] = $values_1;
        }

        return $data;
    }
}
