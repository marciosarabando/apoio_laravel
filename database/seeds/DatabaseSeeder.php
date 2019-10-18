<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CargoSeeder::class);
        $this->call(ModuloSeeder::class);
        $this->call(PerfilSeeder::class);
        $this->call(PermissaoSeeder::class);
        $this->call(SecaoSeeder::class);
        $this->call(EquipamentoTipoSeeder::class);
        
    }
}
