<?php

namespace App\Imports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;

class AlumniImport implements ToModel, WithStartRow
{

    public $berhasil = 0;
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Cek duplikat berdasarkan username atau nomor_induk
            if (Alumni::where('username', $row['username'])->orWhere('nomor_induk', $row['nomor_induk'])->exists()) {
                continue; // skip
            }

            $this->berhasil++; // Tambah hitung
        }}
        
    public function startRow(): int
    {
        return 2; // Mulai dari baris ke-2
    }
    public function model(array $row)
    {

         // Cek jika sudah ada berdasarkan username atau nomor induk
        if (Alumni::where('username', $row[8])->orWhere('nomor_induk', $row[9])->exists()) {
            // Lewati baris ini
            return null;
        }
        
        $tanggalLahir = null;

        if (!empty($row[3])) {
            try {
                // Coba parse tanggal, lalu format jadi YYYY-MM-DD
                $tanggalLahir = Carbon::parse($row[3])->format('Y-m-d');
            } catch (\Exception $e) {
                // Jika error parsing, tetap null
                $tanggalLahir = null;
            }
        }

        return new Alumni([
            // 'id' => (int)$row['id'],
            'nama' => $row[1],
            'tempat_lahir' => $row[2],
            // 'tanggal_lahir' => $row[3],
            'tanggal_lahir' => $tanggalLahir,
            // 'tanggal_lahir' => Carbon::createFromFormat('Y/m/d', $row[3])->format('Y-m-d'),
            'no_telepon' => $row[4],
            'nama_ortu' => $row[5],
            'pekerjaan_ortu' => $row[6],
            'alamat' => $row[7],
            'username' => $row[8],
            'nomor_induk' => $row[9],
            'jurusan' => $row[10],
            'tahun_lulus' => $row[11],
            'status' => $row[12],
            'nama_perusahaan' => $row[13],
            'tahun_bekerja' => $row[14],
            'informasi_pekerjaan' => $row[15],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

