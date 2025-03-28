<?php

namespace Pterodactyl\Repositories\Wings;

use Webmozart\Assert\Assert;
use Pterodactyl\Models\Server;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\TransferException;
use Pterodactyl\Exceptions\Http\Connection\DaemonConnectionException;

class DaemonServerRepository extends DaemonRepository
{
    /**
     * Returns details about a server from the Daemon instance.
     *
     * @throws DaemonConnectionException
     */
    public function getDetails(): array
    {
        Assert::isInstanceOf($this->server, Server::class);

        try {
            $response = $this->getHttpClient()->get(
                sprintf('/api/servers/%s', $this->server->uuid)
            );
        } catch (TransferException $exception) {
            throw new DaemonConnectionException($exception, false);
        }

        return json_decode($response->getBody()->__toString(), true);
    }

    /**
     * Creates a new server on the Wings daemon.
     *
     * @throws DaemonConnectionException
     */
    public function create(bool $startOnCompletion = true): void
    {
        Assert::isInstanceOf($this->server, Server::class);

        try {
            $this->getHttpClient()->post('/api/servers', [
                'json' => [
                    'uuid' => $this->server->uuid,
                    'start_on_completion' => $startOnCompletion,
                ],
            ]);
        } catch (GuzzleException $exception) {
            throw new DaemonConnectionException($exception);
        }
    }

    /**
     * Triggers a server sync on Wings.
     *
     * @throws DaemonConnectionException
     */
    public function sync(): void
    {
        Assert::isInstanceOf($this->server, Server::class);

        try {
            $this->getHttpClient()->post("/api/servers/{$this->server->uuid}/sync");
        } catch (GuzzleException $exception) {
            throw new DaemonConnectionException($exception);
        }
    }

    /**
     * Delete a server from the daemon, forcibly if passed.
     *
     * @throws DaemonConnectionException
     */
    public function delete(): void
    {
        Assert::isInstanceOf($this->server, Server::class);

        try {
            $this->getHttpClient()->delete('/api/servers/' . $this->server->uuid);
        } catch (TransferException $exception) {
            throw new DaemonConnectionException($exception);
        }
    }

    /**
     * Reinstall a server on the daemon.
     *
     * @throws DaemonConnectionException
     */
    public function reinstall(): void
    {
        Assert::isInstanceOf($this->server, Server::class);

        try {
            $this->getHttpClient()->post(sprintf(
                '/api/servers/%s/reinstall',
                $this->server->uuid
            ));
        } catch (TransferException $exception) {
            throw new DaemonConnectionException($exception);
        }
    }

    /**
     * Requests the daemon to create a full archive of the server. Once the daemon is finished
     * they will send a POST request to "/api/remote/servers/{uuid}/archive" with a boolean.
     *
     * @throws DaemonConnectionException
     */
    public function requestArchive(): void
    {
        Assert::isInstanceOf($this->server, Server::class);

        try {
            $this->getHttpClient()->post(sprintf(
                '/api/servers/%s/archive',
                $this->server->uuid
            ));
        } catch (TransferException $exception) {
            throw new DaemonConnectionException($exception);
        }
    }

    /**
     * Revokes a single user's JTI by using their ID. This is simply a helper function to
     * make it easier to revoke tokens on the fly. This ensures that the JTI key is formatted
     * correctly and avoids any costly mistakes in the codebase.
     *
     * @throws DaemonConnectionException
     */
    public function revokeUserJTI(int $id): void
    {
        Assert::isInstanceOf($this->server, Server::class);

        $this->revokeJTIs([md5($id . $this->server->uuid)]);
    }

    /**
     * Revokes an array of JWT JTI's by marking any token generated before the current time on
     * the Wings instance as being invalid.
     *
     * @throws DaemonConnectionException
     */
    protected function revokeJTIs(array $jtis): void
    {
        Assert::isInstanceOf($this->server, Server::class);

        try {
            $this->getHttpClient()
                ->post(sprintf('/api/servers/%s/ws/deny', $this->server->uuid), [
                    'json' => ['jtis' => $jtis],
                ]);
        } catch (TransferException $exception) {
            throw new DaemonConnectionException($exception);
        }
    }

    /**
     * Disconnect active SFTP sessions for a specific user on the server.
     *
     * @throws DaemonConnectionException
     */
    public function disconnectSFTP(string $username): void
    {
        Assert::isInstanceOf($this->server, Server::class);
        $sftpUsername = $username . '.' . $this->server->uuidShort;

        try {
            $this->getHttpClient()
                ->delete(sprintf('/api/servers/%s/sftp/disconnect', $this->server->uuid), [
                    'json' => ['username' => $sftpUsername],
                ]);
        } catch (TransferException $exception) {
            throw new DaemonConnectionException($exception);
        }
    }
}
