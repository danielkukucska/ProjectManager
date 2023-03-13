<?php

declare(strict_types=1);

require_once __DIR__ . '../../../../vendor/autoload.php';

use Phinx\Migration\AbstractMigration;

final class CreateUserTable extends AbstractMigration
{
    public function change()
    {
        $users = $this->table('users');
        $users->addColumn('name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('role', 'string', ['default' => 'regular'])
            ->addIndex('email', ['unique' => true])
            ->create();
    }
}
