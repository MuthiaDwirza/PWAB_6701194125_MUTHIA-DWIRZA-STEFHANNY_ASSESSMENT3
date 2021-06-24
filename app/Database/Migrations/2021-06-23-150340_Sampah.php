<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sampah extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_wilayah'         => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_wilayah' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'jenis_sampah' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'berat' => [
				'type'           => 'REAL'
			],
			'tinggi' => [
				'type'           => 'REAL'
			],
		]);
		$this->forge->addPrimaryKey('id_wilayah');
		$this->forge->createTable('Sampah');
	}

	public function down()
	{
		$this->forge->dropTable('Sampah');
	}
}
