<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Issue Reporting') }}
        </h2>
    </x-slot>

    
    <div class="py-12"></div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('admin/ticketing/create') }}" class="btn btn-primary">Create Reporting</a>
                    </div>

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Group Name</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Details</th>
                                <th>Handled By</th>
                                <th>Sender</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ticket as $ticket)
                            <tr>
                                <td class="align-middle">{{ $ticket->id }}</td>
                                <td class="align-middle">{{ $ticket->group_name }}</td>
                                <td class="align-middle">{{ $ticket->category->category_name ?? '-' }}</td>
                                <td class="align-middle">{{ $ticket->status }}</td>
                                <td class="align-middle">{{ $ticket->details }}</td>
                                <td class="align-middle">{{ $ticket->handledBy->name ?? '-' }}</td>
                                <td class="align-middle">{{ $ticket->sender }}</td>
                                <td class="align-middle">{{ $ticket->created_at }}</td>
                                <td class="align-middle">{{ $ticket->created_at }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('admin/ticketing/edit', ['id'=>$ticket->id])}}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/ticketing/delete', ['id'=>$ticket->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">Data not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


