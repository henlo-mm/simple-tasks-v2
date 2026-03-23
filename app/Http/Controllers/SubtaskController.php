<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    public function store(Request $request, Project $project, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'estimated_hours' => 'required|numeric|min:0',
        ]);

        $task->subtasks()->create($validated);

        return redirect()->route('projects.tasks.show', [$project, $task])->with('success', 'Subtarea creada.');
    }

    public function update(Request $request, Project $project, Task $task, $subtaskId)
    {
        $subtask = $task->subtasks()->findOrFail($subtaskId);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:backlog,en_progreso,testing,terminada',
            'estimated_hours' => 'required|numeric|min:0',
        ]);

        $subtask->update($validated);

        return redirect()->route('projects.tasks.show', [$project, $task])->with('success', 'Subtarea actualizada.');
    }

    public function destroy(Project $project, Task $task, $subtaskId)
    {
        $subtask = $task->subtasks()->findOrFail($subtaskId);
        $subtask->delete();

        return redirect()->route('projects.tasks.show', [$project, $task])->with('success', 'Subtarea eliminada.');
    }
}
