<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FixForeignKeys extends AbstractMigration
{

    public function change(): void
    {
        $this->table("projects")
            ->addColumn("project_owner_id", "integer", ["signed" => false])
            ->addForeignKey('project_owner_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->save();

        $this->table("timesheet")
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->save();

        $this->table("timesheet_lines")
            ->addForeignKey('timesheet_id', 'timesheets', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->save();
    }
}
