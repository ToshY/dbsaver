<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Backup;
use App\Entity\Database;
use App\Repository\BackupRepository;
use Symfony\Component\HttpFoundation\File\File;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Backup>
 *
 * @method static       Backup|Proxy createOne(array $attributes = [])
 * @method static       Backup[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static       Backup|Proxy find(object|array|mixed $criteria)
 * @method static       Backup|Proxy findOrCreate(array $attributes)
 * @method static       Backup|Proxy first(string $sortedField = 'id')
 * @method static       Backup|Proxy last(string $sortedField = 'id')
 * @method static       Backup|Proxy random(array $attributes = [])
 * @method static       Backup|Proxy randomOrCreate(array $attributes = [])
 * @method static       Backup[]|Proxy[] all()
 * @method static       Backup[]|Proxy[] findBy(array $attributes)
 * @method static       Backup[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static       Backup[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static       BackupRepository|RepositoryProxy repository()
 * @method Backup|Proxy create(array|callable $attributes = [])
 */
final class BackupFactory extends ModelFactory
{
    /**
     * @return array<string, string|File|Proxy<Database>>
     */
    protected function getDefaults(): array
    {
        return [
            'context' => self::faker()->randomElement([Backup::CONTEXT_AUTOMATIC, Backup::CONTEXT_MANUAL]),
            'backupFile' => self::faker()->getSqlFile(),
            'database' => DatabaseFactory::random(),
        ];
    }

    protected static function getClass(): string
    {
        return Backup::class;
    }
}
