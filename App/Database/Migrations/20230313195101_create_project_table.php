<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateProjectTable extends AbstractMigration
{
    public function change()
    {
        $projects = $this->table('projects');
        $projects->addColumn('name', 'string')
            ->addColumn('description', 'string')
            ->addColumn('start_date', 'datetime')
            ->addColumn('end_date', 'datetime')
            ->create();
    }
}
