<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class RenameTimesheetTable extends AbstractMigration
{
    public function change(): void
    {


        $this->table("timesheet")
            ->rename("timesheets")
            ->save();
    }
}
