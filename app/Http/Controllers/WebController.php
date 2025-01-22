<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebController extends Controller
{
    public function index(Request $request)
    {
        $search_query = $request->get('search');

        $students = Contact::query();

        if ($search_query) {
            $students->where(function ($query) use ($search_query) {
                $query->where('name', 'LIKE', "%{$search_query}%")
                    ->orWhere('grade', 'LIKE', "%{$search_query}%")
                    ->orWhere('contact', 'LIKE', "%{$search_query}%")
                    ->orWhere('index', 'LIKE', "%{$search_query}%");
            });
        }

        $students = $students->paginate(10);

        return view('welcome', compact('students', 'search_query'));
    }
}
