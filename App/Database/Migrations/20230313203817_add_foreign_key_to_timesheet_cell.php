<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddForeignKeyToTimesheetCell extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table("timesheet_cells");

        $table->addColumn('timesheet_line_id', 'integer', ["signed" => false])
            ->addForeignKey('timesheet_line_id', 'timesheet_lines', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->save();
    }
}
