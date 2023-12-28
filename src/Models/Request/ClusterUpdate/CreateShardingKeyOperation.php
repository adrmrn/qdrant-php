<?php
/**
 * @since     Dec 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */

namespace Qdrant\Models\Request\ClusterUpdate;

class CreateShardingKeyOperation implements Operation
{
    protected string $shardKey;
    protected ?int $shardsNumber = null;
    protected ?int $replicationFactor = null;
    protected ?int $placement = null;

    public function __construct(string $shardKey)
    {
        $this->shardKey = $shardKey;
    }

    public function getKey(): string
    {
        return 'create_sharding_key';
    }

    public function toArray(): array
    {
        return array_filter([
            'shard_key' => $this->shardKey,
            'shards_number' => $this->shardsNumber,
            'replication_factor' => $this->replicationFactor,
            'placement' => $this->placement,
        ], static function($v) { return $v !== null; });
    }

    public function setShardsNumber(int $shardsNumber): CreateShardingKeyOperation
    {
        $this->shardsNumber = $shardsNumber;

        return $this;
    }

    public function setPlacement(int $placement): CreateShardingKeyOperation
    {
        $this->placement = $placement;

        return $this;
    }

    public function setReplicationFactor(int $replicationFactor): CreateShardingKeyOperation
    {
        $this->replicationFactor = $replicationFactor;

        return $this;
    }
}