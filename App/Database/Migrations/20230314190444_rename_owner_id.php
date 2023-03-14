<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class RenameOwnerId extends AbstractMigration
{
    public function change(): void
    {
        $this->table("projects")
            ->renameColumn('project_owner_id', 'owner_id')
            ->save();
    }
}
