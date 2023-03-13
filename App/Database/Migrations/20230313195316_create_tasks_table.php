<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTasksTable extends AbstractMigration
{
    public function change()
    {
        $tasks = $this->table('tasks');
        $tasks->addColumn('name', 'string')
            ->addColumn('description', 'text')
            ->addColumn('project_id', 'integer', ["signed" => false])
            ->addColumn('status', 'string')
            ->addForeignKey('project_id', 'projects', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

        $assignees = $this->table('assignees');
        $assignees->addColumn('task_id', 'integer', ["signed" => false])
            ->addColumn('user_id', 'integer', ["signed" => false])
            ->addForeignKey('task_id', 'tasks', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
    }
}
