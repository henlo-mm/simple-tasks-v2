<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubtaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('projects.index'));

Route::resource('projects', ProjectController::class);

Route::resource('projects.tasks', TaskController::class)->except(['index']);

Route::patch('projects/{project}/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('projects.tasks.update-status');

Route::post('projects/{project}/tasks/{task}/subtasks', [SubtaskController::class, 'store'])->name('projects.tasks.subtasks.store');
Route::put('projects/{project}/tasks/{task}/subtasks/{subtask}', [SubtaskController::class, 'update'])->name('projects.tasks.subtasks.update');
Route::delete('projects/{project}/tasks/{task}/subtasks/{subtask}', [SubtaskController::class, 'destroy'])->name('projects.tasks.subtasks.destroy');
