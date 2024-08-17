<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Techstack;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Main extends Controller
{
    public function indexpage()
    {
        $currentProject = Project::where('priorityrank', '=', 1)->get();

        if (count($currentProject) > 0) {
            $overview = $currentProject[0];
        } else {
            $overview = 'empty';
        }

        return view('overview', [
            'title'     => 'Projects Overview 👁️👅👁️',
            'count'     => Project::countAll(),
            'overview'  => $overview
        ]);
    }

    public function allpage()
    {
        $projects = Project::displayProjects()->paginate(8);

        // PROCESSING TECHSTACK ARRAY FORMAT FOR USER
        $getAllDataTechStack = Techstack::all();

        $i = 0;
        foreach ($projects as $project) {
            $techstack = [];
            $arr = $project->techstack_ids;

            $j = 0;
            foreach ($arr as $techstack_id) {
                foreach ($getAllDataTechStack as $eachDataTechstack) {
                    if ($techstack_id == $eachDataTechstack['id']) {
                        $data = [
                            'name'    => $eachDataTechstack['name'],
                            'color'   => $eachDataTechstack['color'],
                            'palette' => $eachDataTechstack['palette']
                        ];

                        $techstack[$j++] = $data;
                        break;
                    }
                }
            }

            $techstack =  array_reverse($techstack);
            $project['techstack'] = $techstack;
            $projects[$i++] = $project;
        }

        return view('all', [
            'title' => 'All Projects 💩',
            'projects' => $projects,
            'count' => Project::countAll()
        ]);
    }

    public function projectdetailpage(Project $project)
    {
        return view('projectdetail', [
            'title' => 'Project Detail 👻',
            'project' => $project,
            'count' => Project::countAll()
        ]);
    }

    public function projecteditpage(Project $project)
    {
        // PROCESSING TECHSTACK ARRAY FORMAT FOR USER
        $getAllDataTechStack = Techstack::all();

        $techstack = [];
        $arr = $project->techstack_ids;
        $j = 0;
        foreach ($arr as $techstack_id) {
            foreach ($getAllDataTechStack as $eachDataTechstack) {
                if ($techstack_id == $eachDataTechstack['id']) {
                    $data = [
                        'lowercase'    => $eachDataTechstack['lowercase'],
                        'color'   => $eachDataTechstack['color'],
                        'palette' => $eachDataTechstack['palette']
                    ];

                    $techstack[$j++] = $data;
                    break;
                }
            }
        }
        $techstack = array_reverse($techstack);

        $strtechstack = '';
        foreach ($techstack as $eachtechstack) {
            $strtechstack = $strtechstack . $eachtechstack['lowercase'] . ', ';
        }

        $project['techstack'] = substr($strtechstack, 0, -2);

        return view('editproject', [
            'title' => 'Edit Project ->',
            'project' => $project,
            'count' => Project::countAll()
        ]);
    }

    // CRUD

    public function createproject(Request $request)
    {
        // TODO CREATE VALIDATION TO LIMIT IMAGE SIZE

        // PROCESSING REQUEST PRIORITY RANK
        $prioritycheck = Project::where('priorityrank', '=', $request->priorityrank)->get();

        // refreshing the rank if any new project have higher priority rank
        if (count($prioritycheck) > 0) {
            $currentRank = $request->priorityrank;
            $projectsToUpdate = Project::where('priorityrank', '>=', $currentRank)->get();

            $newRanks = [];
            $i = 0;
            foreach ($projectsToUpdate as $project) {
                $newRanks[$i++] = [
                    'id' => $project->id,
                    'priorityrank' => $project->priorityrank + 1
                ];
            }

            $updatedProject = new Project();

            batch()->update($updatedProject, $newRanks, 'id');
        }

        // PROCESSING REQUEST TECHSTACK
        $techstack_ids = explode(', ', $request->techstack);
        $techstack_refference = Techstack::all();

        // referencing the techstack input to the database
        $i = 0;
        foreach ($techstack_ids as $techstack) {
            foreach ($techstack_refference as $reff) {
                if ($reff['lowercase'] == $techstack) {
                    $techstack_ids[$i++] = $reff['id'];
                    break;
                }
            }
        }

        sort($techstack_ids, SORT_NUMERIC);

        // PROCESSING REQUEST IMAGE
        if ($request->icon !== null) {
            $icon = $request->file('icon')->store('img', 'public');
        } else {
            $icon = 'img/default.svg';
        }

        // Check if github repo is filled
        if ($request->gitrepo == null) {
            $request['gitrepo'] = 'empty';
        }

        /*===============================================================================*/
        // SAVE TO THE DATABASE
        /*===============================================================================*/
        $project = new Project;

        $project->title         = $request->title;
        $project->slug          = Str::slug($request->title);
        $project->priorityrank  = $request->priorityrank;
        $project->description   = $request->description;
        $project->gitrepo       = $request->gitrepo;
        $project->icon          = $icon;
        $project->techstack_ids = $techstack_ids;
        $project->status_id     = $request->status;
        $project->difficulty_id = $request->difficulty;

        $project->save();

        return redirect()->back()->with('success', 'Project created successfully');
    }

    public function deleteproject(Project $project)
    {
        // dd($project);

        if ($project->icon !== "img/default.svg") {
            Storage::delete([$project->icon]);
        }

        // refreshing the rank if any other project have higher priority
        $prioritycheck = Project::where('priorityrank', '=', $project->priorityrank)->get();
        if (count($prioritycheck) > 0) {
            $currentRank = $project->priorityrank;
            $projectsToUpdate = Project::where('priorityrank', '>=', $currentRank)->get();

            $newRanks = [];
            $i = 0;
            foreach ($projectsToUpdate as $updatingproject) {
                $newRanks[$i++] = [
                    'id' => $updatingproject->id,
                    'priorityrank' => $updatingproject->priorityrank - 1
                ];
            }

            $updatedProject = new Project();

            batch()->update($updatedProject, $newRanks, 'id');
        }

        // Deleting project
        $project->delete();

        return redirect()->back();
    }

    public function updateproject(Project $project, Request $request)
    {
        // PROCESSING REQUEST PRIORITY RANK

        // refreshing the rank if any new project have higher priority rank
        $newRank = (int)$request->priorityrank;
        $currentRank = $project->priorityrank;

        if ($newRank !== $currentRank) {
            if ($newRank < $currentRank) {
                // Moving project up in priority, increase ranks between newRank and currentRank
                Project::whereBetween('priorityrank', [$newRank, $currentRank - 1])
                    ->increment('priorityrank');
            } else {
                // Moving project down in priority, decrease ranks between currentRank + 1 and newRank
                Project::whereBetween('priorityrank', [$currentRank + 1, $newRank])
                    ->decrement('priorityrank');
            }
        }

        // PROCESSING REQUEST TECHSTACK
        $techstack_ids = explode(', ', $request->techstack);
        $techstack_refference = Techstack::all();

        // referencing the techstack input to the database
        $i = 0;
        foreach ($techstack_ids as $techstack) {
            foreach ($techstack_refference as $reff) {
                if ($reff['lowercase'] == $techstack) {
                    $techstack_ids[$i++] = $reff['id'];
                    break;
                }
            }
        }

        sort($techstack_ids, SORT_NUMERIC);

        // PROCESSING REQUEST IMAGE
        if ($request->icon !== null) {
            $icon = $request->file('icon')->store('img', 'public');
        } else {
            $icon = $project->icon;
        }

        // Check if github repo is filled
        if ($request->gitrepo == null) {
            $request['gitrepo'] = 'empty';
        }

        //SAVE
        $project->title         = $request->title;
        $project->slug          = Str::slug($request->title);
        $project->priorityrank  = $request->priorityrank;
        $project->description   = $request->description;
        $project->gitrepo       = $request->gitrepo;
        $project->icon          = $icon;
        $project->techstack_ids = $techstack_ids;
        $project->status_id     = (int)$request->status;
        $project->difficulty_id = (int)$request->difficulty;

        // dd($project);

        $project->save();

        return redirect('/all');
    }

    // default view laravel

    public function testpage()
    {
        return view('welcome');
    }
}
