<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = storage_path('app/data/productos.csv');
        $file = fopen($filePath, 'r');
        // Skip the header row
        fgetcsv($file);
        while (($data = fgetcsv($file)) !== false) {
            Producto::create([
                'nombre' => $data[0],
                'precio' => $data[1],
                'descripcion' => $data[2],
                'imagen' => 'productos/' . $data[3],
            ]);
        }
        fclose($file);
    }
}
