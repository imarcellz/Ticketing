<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $ticket = Ticket::with(['category', 'handledBy'])->get();
        return view('admin.ticketing.home', compact('ticket'));
    }

    public function create()
    {
        return view('admin.ticketing.create');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'group_name' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'details' => 'required',
            'handled_by' => 'required',
            'sender' => 'required',
        ]);
        $data = Ticket::create($validation);
        if ($data) {
            session()->flash('success', 'Report created successfully');
            return redirect()->route('admin/ticketing');
        } else {
            session()->flash('error', 'Report creation failed');
            return redirect(route('admin/ticketing/create'));
        }
    }
}


