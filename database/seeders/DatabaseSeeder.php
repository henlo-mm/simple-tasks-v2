<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\Subtask;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::create([
            'name' => 'Rediseño del Portal Web',
            'description' => 'Modernizar el portal web corporativo con nuevo diseño y funcionalidades.',
            'deadline' => now()->addDays(30),
        ]);

        $task1 = Task::create([
            'project_id' => $project->id,
            'title' => 'Diseñar nueva landing page',
            'description' => 'Crear el diseño de la nueva landing page con secciones de hero, features y testimonios.',
            'priority' => 'alta',
            'status' => 'en_progreso',
            'estimated_hours' => 8,
        ]);

        Subtask::create(['task_id' => $task1->id, 'title' => 'Wireframe en Figma', 'status' => 'terminada', 'estimated_hours' => 3]);
        Subtask::create(['task_id' => $task1->id, 'title' => 'Maquetación HTML/CSS', 'status' => 'en_progreso', 'estimated_hours' => 4]);
        Subtask::create(['task_id' => $task1->id, 'title' => 'Animaciones de scroll', 'status' => 'backlog', 'estimated_hours' => 2]);

        $task2 = Task::create([
            'project_id' => $project->id,
            'title' => 'Migrar base de datos',
            'description' => 'Migrar la base de datos de MySQL 5.7 a PostgreSQL 16.',
            'priority' => 'alta',
            'status' => 'terminada',
            'estimated_hours' => 12,
        ]);

        Subtask::create(['task_id' => $task2->id, 'title' => 'Exportar schema', 'status' => 'terminada', 'estimated_hours' => 2]);
        Subtask::create(['task_id' => $task2->id, 'title' => 'Convertir queries', 'status' => 'en_progreso', 'estimated_hours' => 6]);
        Subtask::create(['task_id' => $task2->id, 'title' => 'Verificar integridad', 'status' => 'backlog', 'estimated_hours' => 4]);

        $task3 = Task::create([
            'project_id' => $project->id,
            'title' => 'Implementar autenticación OAuth',
            'description' => 'Agregar login con Google y GitHub.',
            'priority' => 'media',
            'status' => 'backlog',
            'estimated_hours' => 6,
        ]);

        Subtask::create(['task_id' => $task3->id, 'title' => 'Configurar providers', 'status' => 'backlog', 'estimated_hours' => 2]);
        Subtask::create(['task_id' => $task3->id, 'title' => 'UI de login social', 'status' => 'backlog', 'estimated_hours' => 3]);

        Task::create([
            'project_id' => $project->id,
            'title' => '',
            'description' => 'Esta tarea fue creada sin titulo por un error de validación.',
            'priority' => 'baja',
            'status' => 'backlog',
            'estimated_hours' => 2,
        ]);

        Task::create([
            'project_id' => $project->id,
            'title' => 'Optimizar imágenes',
            'description' => 'Comprimir y convertir imágenes a WebP.',
            'priority' => 'baja',
            'status' => 'testing',
            'estimated_hours' => 3,
        ]);
    }
}
