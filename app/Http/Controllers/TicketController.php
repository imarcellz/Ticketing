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

    public function userDashboard()
    {
        $ticket = Ticket::all();
        return view ('dashboard', compact('ticket'));
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

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('admin.ticketing.update', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $ticket = $ticket = Ticket::findOrFail($id);
        $group_name = $request->group_name;
        $category_id = $request->category_id;
        $status = $request->status;
        $details = $request->details;
        $handled_by = $request->handled_by;
        $sender = $request->sender;

        $ticket->group_name = $group_name;
        $ticket->category_id = $category_id;
        $ticket->status = $status;
        $ticket->details = $details;
        $ticket->handled_by = $handled_by;
        $ticket->sender = $sender;
        $data = $ticket->save();
        if($data){
            session()->flash('success', 'Report updated successfully');
            return redirect(route('admin/ticketing'));
        }else{
            session()->flash('error', 'Report Updated failed');
            return redirect(route('admin/ticketing/update'));
        }
    }

    public function delete($id)
    {
        $ticket = Ticket::findOrFail($id)->delete();
        if ($ticket) {
            session()->flash('success', 'Report deleted successfully');
            return redirect(route('admin/ticketing'));
        } else {
            session()->flash('error', 'Report deletion failed');
            return redirect(route('admin/ticketing'));
        }
    }
   }


