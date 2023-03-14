<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class RenameAssigneesTable extends AbstractMigration
{

    public function change(): void
    {
        $table = $this->table('assignees');
        $table
            ->rename('users_tasks')
            ->update();
    }
}
