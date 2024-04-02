<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Backup;

class BackupProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Crear un nuevo registro de backup en la base de datos
        $backup = new Backup();
        $backup->status = 'pending';
        $backup->url = 'http://localhost';
        $backup->name='Backup';
        $backup->save();

        // Definir la ruta donde se almacenará el backup
        $storagePath = storage_path().'/app/public/backups/';
        $date = now()->format('Y-m-d_H-i-s');
        $name='backup_'.$date.'.sql';

        // Crear el comando completo para ejecutar mysqldump
        $command = "C:\\xampp\\mysql\\bin\\mysqldump -u root --databases aapos > ".$storagePath."backup_".$date.".sql";

        // Ejecutar el comando
        exec($command, $output, $err);
        sleep(5);
        $backup->status='done';
        $backup->name=$name;
        $backup->url='http://127.0.0.1:8000/storage/backups/backup_'.$date.'.sql';
        $backup->save();
    }
}
