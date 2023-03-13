<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTimesheetLineTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('timesheet_lines');
        $table->create();

        $this->table('timesheet_line_cells')
            ->addColumn('timesheet_cell_id', 'integer', ["signed" => false])
            ->addColumn('timesheet_line_id', 'integer', ["signed" => false])
            ->addForeignKey('timesheet_cell_id', 'timesheet_cells', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('timesheet_line_id', 'timesheet_lines', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
    }
}
