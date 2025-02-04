<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Reporting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Update Reporting</h1>
                    <hr />
                    <form action="{{ route('admin/ticketing/update', $ticket->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Group Name</label>
                                <input type="text" name="group_name" class="form-control" placeholder="group_name Name" value="{{ $ticket->group_name }}">
                                @error('group_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">category_id</label>
                                <input type="number" name="category_id" class="form-control" placeholder="category_id" value="{{ $ticket->category_id }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">status</label>
                                <input type="text" name="status" class="form-control" placeholder="status" value="{{ $ticket->status }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">details</label>
                                <input type="text" name="details" class="form-control" placeholder="details" value="{{ $ticket->details }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">handled_by</label>
                                <input type="number" name="handled_by" class="form-control" placeholder="handled_by" value="{{ $ticket->handled_by }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Sender</label>
                                <input type="text" name="sender" class="form-control" placeholder="Sender" value="{{ $ticket->sender }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>