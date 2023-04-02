<?php
/**
 * Snapshots
 *
 * @since     Mar 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */

namespace Qdrant\Endpoints;

use Qdrant\Exception\InvalidArgumentException;
use Qdrant\Response;

class Snapshots extends AbstractEndpoint
{
    /**
     * # List of storage snapshots
     * Get list of snapshots of the whole storage
     *
     * @throws InvalidArgumentException
     */
    public function get(): Response
    {
        return $this->client->execute(
            $this->createRequest('GET', '/snapshots')
        );
    }

    /**
     * # Create storage snapshot
     * Create new snapshot of the whole storage
     *
     * @throws InvalidArgumentException
     */
    public function create(array $params): Response
    {
        return $this->client->execute(
            $this->createRequest('POST', '/snapshots', $params)
        );
    }

    /**
     * # Delete storage snapshot
     * Delete snapshot of the whole storage
     *
     * @throws InvalidArgumentException
     */
    public function delete(string $name): Response
    {
        return $this->client->execute(
            $this->createRequest('DELETE', '/snapshots/' . $name)
        );
    }

    /**
     * # Download storage snapshot
     * Download specified snapshot of the whole storage as a file
     *
     * @throws InvalidArgumentException
     */
    public function download(string $name): Response
    {
        return $this->client->execute(
            $this->createRequest('GET', '/snapshots/' . $name)
        );
    }
}