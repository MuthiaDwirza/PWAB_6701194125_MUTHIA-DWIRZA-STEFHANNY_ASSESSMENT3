<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SampahSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama_wilayah' => 'Dayeuh Kolot',
				'jenis_sampah' => 'Kardus Bekas',
				'berat' => '2.2',
				'tinggi' => '3.1'
			],
			[
				'nama_wilayah' => 'Sukapura',
				'jenis_sampah' => 'Buku Bekas',
				'berat' => '4.5',
				'tinggi' => '5.1'
			]
		];
		$this->db->table('sampah')->insertBatch($data);
	}
}
