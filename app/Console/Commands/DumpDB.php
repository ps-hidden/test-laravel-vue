<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DumpDB extends Command
{
    protected $signature = 'dump_db';

    public function handle()
    {
        $db   = config('database.connections.'.config('database.default'));
        $dir  = storage_path('dump_db_'. date('Y-m-d') .'.sql');
        $cred = "--user={$db['username']} --password={$db['password']}";
        $host = "--host={$db['host']} {$db['database']}";

        exec("mysqldump {$cred} {$host} --result-file={$dir} 2>&1");
        $this->comment('Done');
    }
}
