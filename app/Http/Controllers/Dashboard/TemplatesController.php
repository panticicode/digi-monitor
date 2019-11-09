<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Group;
use App\Models\Template;
use App\Http\Requests\Templates\CreateRequest;
use App\Http\Requests\Templates\UpdateRequest;
use App\Notifications\Templates\Email as SendEmailNotification;

class TemplatesController extends Controller
{
    public function index()
    {
        $templates = \Auth::user()->templates()
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(5);

        return view('dashboard.templates.index', [
            'templates' => $templates
        ]);
    }

    public function create()
    {
        return view('dashboard.templates.create');
    }

    public function store(CreateRequest $request, Template $template)
    {
        $template->fill($request->all());

        $template->user_id = \Auth::user()->id;

        $template->save();

        session()->flash('success', 'You have been created templates');

        return redirect(route('dashboard.templates.index'));
    }

    public function edit(Template $template)
    {
        return view('dashboard.templates.edit', [
            'template' => $template
        ]);
    }

    public function update(UpdateRequest $request, Template $template)
    {
        $template->update($request->all());

        session()->flash('success', 'You have been updated templates');

        return redirect(route('dashboard.templates.index'));
    }

    public function destroy(Template $template)
    {
        $template->delete();

        session()->flash('success', 'You have been deleted templates');

        return redirect(route('dashboard.templates.index'));
    }
}
