<?php declare(strict_types=1);

namespace Kes\PluginSkeletonShopware\Migration;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Kes\PluginSkeletonShopware\PluginSkeletonShopware;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1614903457ExampleExtension extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1614903457;
    }

    public function update(Connection $connection): void
    {
        $dataBaseName = PluginSkeletonShopware::DATA_BASE_NAME;

        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `{$dataBaseName}` (
    `id` BINARY(16) NOT NULL,
    `product_id` BINARY(16) NOT NULL,
    `custom_string` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
    `active` TINYINT(1) COLLATE utf8mb4_unicode_ci,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3),
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;
SQL;
        try {
            $connection->executeStatement($sql);
        } catch (Exception $e) {
        }
    }

    public function updateDestructive(Connection $connection): void
    {
        // TODO: Implement updateDestructive() method.
    }
}
