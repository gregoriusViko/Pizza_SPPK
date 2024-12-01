<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DataController extends Controller
{
    function dataTampil()
    {
        // Lokasi file CSV
        $path = 'kode_python/pizza_sales_modified.csv';

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

        $csvData = array_slice($csvData, 0, 30);

        // Mengirimkan data CSV ke view untuk ditampilkan
        return view('lihat_data', compact(['csvData', 'title']));
    }

    function dataKelompok()
    {
        // Lokasi file CSV
        $path = 'kode_python/pizza_sales_modified.csv';

        // Data CSV yang dibaca
        $csvData = [];

        // Membuka file CSV
        if ($handle = fopen($path, 'r')) {
            $title = fgetcsv($handle); // Membaca baris pertama (judul)

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
            $startDate = new \DateTime('2015-01-01'); // Tanggal mulai 1 Januari
            $interval = new \DateInterval('P5D'); // Interval 5 hari

            // Tentukan grup berdasarkan interval 5 hari
            $period = new \DatePeriod($startDate, $interval, new \DateTime('2015-12-31'));

            foreach ($period as $range) {
                if ($date >= $range && $date < $range->add($interval)) {
                    $groupedData[$range->format('Y-m-d')][] = $row;
                    break;
                }
            }
        }
        // Mengirimkan data yang telah dikelompokkan ke view
        // dd($csvData);
        return view('Pengolahan_2', compact('groupedData', 'title'));
    }
}
