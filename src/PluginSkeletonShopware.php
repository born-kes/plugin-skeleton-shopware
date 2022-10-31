<?php declare(strict_types=1);

namespace Kes\PluginSkeletonShopware;

use Doctrine\DBAL\Connection;
use Kes\PluginSkeletonShopware\Migration\Migration1614903457ExampleExtension;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class PluginSkeletonShopware extends Plugin
{
    const DATA_BASE_NAME = 'kes_example';

    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);

        $dataBaseName = self::DATA_BASE_NAME;
        $migrationClassNames = [
            Migration1614903457ExampleExtension::class
        ];

        if ($uninstallContext->keepUserData()) {
            return;
        }

        $connection = $this->container->get(Connection::class);

        $connection->executeStatement("DROP TABLE IF EXISTS `{$dataBaseName}`;");
        foreach ($migrationClassNames as $migrationClassName) {
            $connection->executeStatement("DELETE FROM `migration` WHERE `class` = :className LIMIT 1;", [':className' => $migrationClassName]);
        }
    }
}
