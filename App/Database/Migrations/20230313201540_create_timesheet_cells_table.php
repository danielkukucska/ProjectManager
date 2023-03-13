<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTimesheetCellsTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('timesheet_cells');
        $table->addColumn('task_id', 'integer', ["signed" => false])
            ->addColumn('hours_worked', 'integer')
            ->addColumn('date', 'date')
            ->addForeignKey('task_id', 'tasks', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
    }
}
