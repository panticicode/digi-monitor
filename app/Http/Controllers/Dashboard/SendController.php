<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Template;

class SendController extends Controller
{
    public function showTemplate()
    {
        $groups = \Auth::user()->getGroup()->paginate(5);
  
        return view('dashboard.campaigns.show', [
            'groups' => $groups
        ]);
    }
    public function show_all()
    {
		$templates = \Auth::user()->templates()
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(5);
		// return $templates;
		//$members = Member:: pluck('email');
        return view('dashboard.members.show', [
            'templates' => $templates
        ]);
    }
}
