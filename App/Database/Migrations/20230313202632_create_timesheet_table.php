<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTimesheetTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('timesheet');
        $table->addColumn('user_id', 'integer', ["signed" => false])
            ->addColumn('start_date', 'datetime')
            ->addColumn('end_date', 'datetime')
            ->create();
    }
}
