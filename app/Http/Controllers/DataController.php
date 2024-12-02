<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DataController extends Controller
{
    public function dataTampil(Request $request)
    {
        $path = 'kode_python/pizza_sales_modified.csv';
        $hasil = $this->bacaCsv($path);
        $csvData = $hasil[0];
        $title = $hasil[1];
        
        $totalData = count($csvData); // Total data
        $perPage = ceil($totalData / 10); // Jumlah data per tab (10 tab)
        $page = $request->input('page', 1); // Mengambil halaman yang diminta (default halaman 1)
        $offset = ($page - 1) * $perPage; // Menghitung offset untuk data yang akan ditampilkan
        $paginatedData = array_slice($csvData, $offset, $perPage); // Menampilkan bagian data sesuai halaman

        // Mengirimkan data ke view untuk ditampilkan
        return view('lihat_data', compact(['paginatedData', 'title', 'totalData']));
    }


    function dataKelompok(Request $request)
    {
        $request->validate([
            'hari' => 'required|numeric',
            'min_sup' => 'required|numeric|max:100',
            'min_conf' => 'required|numeric|max:100',
        ]);

        // Lokasi file CSV
        $path = 'kode_python/pizza_sales_modified.csv';

        // Data CSV yang dibaca
        $csvData = [];

        // Membuka file CSV
        if ($handle = fopen($path, 'r')) {
            $title = fgetcsv($handle); // Membaca baris pertama (judul)
            $title[] = array_splice($title, 2, 1)[0];
            $title[] = array_splice($title, 2, 1)[0];

            while ($data = fgetcsv($handle, 1000, ',')) {
                // Misalkan kolom tanggal ada di indeks 0, ubah tanggal menjadi objek DateTime
                $date = \DateTime::createFromFormat('d-m-Y', str_replace('/', '-', array_splice($data, 2, 1)[0])); // Ubah sesuai format tanggal di CSV
                if ($date) {
                    $data[] = $date; // Menambahkan objek DateTime ke data
                }
                $csvData[] = $data;
            }

            // Menutup file setelah selesai
            fclose($handle);
        }

        // Mengelompokkan data per 5 hari
        $groupedData = [];
        foreach ($csvData as $row) {
            $date = $row[count($row) - 1]; // Ambil objek DateTime dari data terakhir
            $row[] = array_splice($row, 2, 1)[0];
            $startDate = new \DateTime('2015-01-01'); // Tanggal mulai 1 Januari
            $interval = new \DateInterval('P'.$request->hari.'D'); // Interval 5 hari

            // Tentukan grup berdasarkan interval 5 hari
            $period = new \DatePeriod($startDate, $interval, new \DateTime('2015-12-31'));

            foreach ($period as $range) {
                if ($date >= $range && $date < $range->add($interval)) {
                    $groupedData[$range->format('Y-m-d')][] = $row;
                    break;
                }
            }
        }

        $totalKelompok = count($groupedData);
        $page = $request->input('page', 1);
        $offset = ($page -1 )* $totalKelompok;
        $paginated = array_slice ($groupedData, $offset, $totalKelompok);
        // Mengirimkan data yang telah dikelompokkan ke view
        // dd($csvData);
        return view('Pengolahan_2', compact('paginated', 'title', 'request'));
    }

    function dataTabular(Request $request){
        $request->validate([
            'hari' => 'required|numeric',
            'min_sup' => 'required|numeric|max:100',
            'min_conf' => 'required|numeric|max:100',
        ]);

        $process = new Process(['python3', 'kode_python/convert_to_tabular.py', $request->hari]);
        $process->run();
        
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $path = 'kode_python/tabel_tabular.csv';
        $hasil = $this->bacaCsv($path);

        $csvData = $hasil[0];
        $title = $hasil[1];

        return view('Pengolahan_3', compact(['csvData', 'title', 'request']));
    }

    function minSupport(Request $request){
        $request->validate([
            'min_sup' => 'required|numeric|max:100',
            'min_conf' => 'required|numeric|max:100',
        ]);
        $process = new Process(['python3', 'kode_python/min_sup.py', $request->min_sup]);
        $process->run();
        
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $path = 'kode_python/support_value.csv';
        $hasil = $this->bacaCsv($path);

        $csvData = $hasil[0];
        $title = $hasil[1];
    }

    public function bacaCsv($path)
    {
        // Data CSV yang dibaca
        $csvData = [];

        // Membuka file CSV
        if ($handle = fopen($path, 'r')) {
            $title = fgetcsv($handle); // Membaca baris pertama (judul)
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                // Menyimpan setiap baris data ke dalam array
                $csvData[] = $data;
            }

            // Menutup file setelah selesai
            fclose($handle);
        }

        return [$csvData, $title];
    }
}
