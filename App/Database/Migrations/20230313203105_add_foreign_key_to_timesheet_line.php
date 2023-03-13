<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddForeignKeyToTimesheetLine extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table("timesheet_lines");

        $table->changeColumn('timesheet_id', 'integer', ["signed" => false])
            ->addForeignKey('timesheet_id', 'timesheets', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->save();
    }
}
