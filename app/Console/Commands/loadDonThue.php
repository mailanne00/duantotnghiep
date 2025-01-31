<?php

namespace App\Console\Commands;

use App\Models\LichSuThue;
use App\Models\TaiKhoan;
use Illuminate\Console\Command;

class loadDonThue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:load-don-thue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        LichSuThue::where('trang_thai', '=', '0')
            ->where('expired', '<', now())
            ->update([
                'trang_thai' => '2'
            ]);

        $nguoiDuocThue = LichSuThue::where('trang_thai', '=', '3')
            ->where('expired', '<', now())
            ->get()->pluck('nguoi_duoc_thue');

        LichSuThue::where('trang_thai', '=', '3')
            ->where('expired', '<', now())
            ->update([
                'trang_thai' => '1'
            ]);

        TaiKhoan::whereIn('id', $nguoiDuocThue)->update([
            'trang_thai' => 1
        ]);
    }
}
