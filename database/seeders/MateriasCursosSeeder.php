<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Materia;
use App\Models\Curso;

class MateriasCursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Materias académicas
        $materias = [
            ['nombre' => 'Matemática', 'codigo' => 'MAT101', 'creditos' => 4],
            ['nombre' => 'Lenguaje', 'codigo' => 'LEN101', 'creditos' => 3],
            ['nombre' => 'Ciencia', 'codigo' => 'CIE101', 'creditos' => 4],
            ['nombre' => 'Tecnología', 'codigo' => 'TEC101', 'creditos' => 3],
        ];

        foreach ($materias as $materia) {
            Materia::create($materia);
        }

        // Cursos artísticos
        $cursos = [
            ['nombre' => 'Guitarra', 'codigo' => 'CURS001', 'descripcion' => 'Curso de guitarra básica'],
            ['nombre' => 'Danza', 'codigo' => 'CURS002', 'descripcion' => 'Curso de danza moderna'],
        ];

        foreach ($cursos as $curso) {
            Curso::create($curso);
        }
    }
}
