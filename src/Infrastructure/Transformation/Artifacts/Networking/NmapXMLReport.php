<?php

declare(strict_types=1);

namespace App\Infrastructure\Transformation\Artifacts\Networking;

use Exception;

final readonly class NmapXMLReport
{
    public function __construct(
        private string $content,
    ) {
    }

    /**
     * Parse nmap XML report and extract hosts with port and service information.
     *
     * @return array Array of hosts with their ports and services, or empty array on error
     *
     * @example
     * $hosts = parseNmapXml($xmlContent);
     * // Returns:
     * // [
     * //     [
     * //         'ip' => '192.168.1.1',
     * //         'hostname' => 'router.local',
     * //         'status' => 'up',
     * //         'ports' => [
     * //             [
     * //                 'number' => 22,
     * //                 'protocol' => 'tcp',
     * //                 'state' => 'open',
     * //                 'service' => 'ssh',
     * //                 'product' => 'OpenSSH',
     * //                 'version' => '7.4'
     * //             ],
     * //             ...
     * //         ]
     * //     ],
     * //     ...
     * // ]
     */
    public function hosts(string $xmlString)
    {
        try {
            // Suppress XML warnings and load the XML
            libxml_use_internal_errors(true);
            $xml = simplexml_load_string($xmlString);

            // Check if XML parsing was successful
            if (false === $xml) {
                $errors = libxml_get_errors();
                throw new Exception('Failed to parse XML: '.$errors[0]->message ?? 'Unknown error');
            }

            $hosts = [];

            // Iterate through each host in the nmap scan
            foreach ($xml->host as $hostElement) {
                $hostData = $this->parseHost($hostElement);
                if (null !== $hostData) {
                    $hosts[] = $hostData;
                }
            }

            libxml_clear_errors();

            return $hosts;
        } catch (Exception $e) {
            error_log('Error parsing nmap XML: '.$e->getMessage());

            return [];
        }
    }

    /**
     * Parse individual host element from nmap XML.
     *
     * @param SimpleXMLElement $hostElement The host XML element
     *
     * @return array|null Host data array or null if host status is down
     */
    private function parseHost($hostElement)
    {
        // Get host status
        $statusElement = $hostElement->status;
        if (!$statusElement) {
            return null;
        }

        $status = (string) $statusElement['state'];

        // Skip hosts that are down
        if ('up' !== $status) {
            return null;
        }

        // Get IP address
        $addresses = $hostElement->address;
        $ipAddress = null;
        $hostname = null;

        foreach ($addresses as $addr) {
            $addrType = (string) $addr['addrtype'];
            if ('ipv4' === $addrType || 'ipv6' === $addrType) {
                $ipAddress = (string) $addr['addr'];
            } elseif ('mac' === $addrType) {
                // MAC address found, continue looking for IP
                continue;
            }
        }

        // Get hostname if available
        $hostnamesElement = $hostElement->hostnames;
        if ($hostnamesElement) {
            foreach ($hostnamesElement->hostname as $h) {
                $hostname = (string) $h['name'];
                break; // Take the first hostname
            }
        }

        if (!$ipAddress) {
            return null;
        }

        // Parse ports
        $ports = [];
        $portsElement = $hostElement->ports;

        if ($portsElement) {
            foreach ($portsElement->port as $portElement) {
                $portData = $this->parsePort($portElement);
                if (null !== $portData) {
                    $ports[] = $portData;
                }
            }
        }

        return [
            'ip' => $ipAddress,
            'hostname' => $hostname,
            'status' => $status,
            'ports' => $ports,
        ];
    }

    public function parsePort($portElement)
    {
        $protocol = (string) $portElement['protocol'];
        $portNumber = (int) $portElement['portid'];

        // Get port state
        $stateElement = $portElement->state;
        if (!$stateElement) {
            return null;
        }

        $state = (string) $stateElement['state'];

        // Only include open ports (you can modify this to include other states)
        if ('open' !== $state) {
            return null;
        }

        // Get service information
        $serviceElement = $portElement->service;
        $service = null;
        $product = null;
        $version = null;
        $extraInfo = null;

        if ($serviceElement) {
            $service = (string) $serviceElement['name'];

            // Get additional service details if available
            if (isset($serviceElement['product'])) {
                $product = (string) $serviceElement['product'];
            }
            if (isset($serviceElement['version'])) {
                $version = (string) $serviceElement['version'];
            }
            if (isset($serviceElement['extrainfo'])) {
                $extraInfo = (string) $serviceElement['extrainfo'];
            }
        }

        return [
            'number' => $portNumber,
            'protocol' => $protocol,
            'state' => $state,
            'service' => $service,
            'product' => $product,
            'version' => $version,
            'extrainfo' => $extraInfo,
        ];
    }
}
