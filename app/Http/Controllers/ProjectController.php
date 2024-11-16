<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projects()
    {
        $projects = Project::all();
        return view('admin.projects.projects', compact('projects'));
    }

    public function projectCreate()
    {
        return view('admin.projects.addProject');
    }

    public function addProject(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePaths = [];

        // Image upload logic
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $path = 'assets/upload/projects/';
                $image->move(public_path($path), $imageName);
                $imagePaths[] = "$path$imageName";
            }
        }

        Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'photos' => json_encode($imagePaths),
        ]);

        return redirect()->route('projects.create')->with('success', 'Project created successfully.');
    }

    public function viewProject($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.viewProject', compact('project'));
    }

    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.editProject', compact('project'));
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Image upload logic
        $imagePaths = json_decode($project->photos, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $path = 'assets/upload/projects/';
                $image->move(public_path($path), $imageName);
                $imagePaths[] = "$path$imageName";
            }
        }

        $project->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'photos' => json_encode(array_unique($imagePaths)), // Ensure unique paths
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    public function removeImage(Request $request, $projectId)
    {
        $project = Project::findOrFail($projectId);
        $index = $request->input('image_index');

        $images = json_decode($project->photos, true);

        if (is_array($images) && isset($images[$index])) {
            \Storage::disk('public')->delete($images[$index]);
            unset($images[$index]);

            $project->update([
                'photos' => json_encode(array_values($images))
            ]);

            return redirect()->back()->with('success', 'Image removed successfully.');
        }

        return redirect()->back()->with('error', 'Image not found.');
    }

    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('User.projects.show', compact('project'));
    }
}
