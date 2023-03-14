<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AdjustTimesheetModels extends AbstractMigration
{
    public function change(): void
    {
        $this->table("timesheet_lines")
            ->addColumn("task_id", "integer", ["signed" => false])
            ->addForeignKey('task_id', 'tasks', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addIndex(['timesheet_id', 'task_id'], ['unique' => true])
            ->update();

        $this->table("timesheet_cells")
            ->dropForeignKey('task_id')
            ->removeColumn('task_id')
            ->save();
    }
}
