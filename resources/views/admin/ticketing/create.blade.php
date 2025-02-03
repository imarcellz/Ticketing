<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Reporting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Add Reporting</h1>
                    @if (session()->has('error'))
                </div>
                {{ session('error') }}
                @endif
                <hr />

                <p><a href="{{ route('admin/ticketing') }}" class="btn btn-primary">Go Back</a></p>

                <form action="{{ route('admin/ticketing/save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="group_name" class="form-control" placeholder="Group Name">
                        </div>
                    </div>
                    @error('group_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="category_id" class="form-control" placeholder="Category ID">
                        </div>
                    </div>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="status" class="form-control" placeholder="Status">
                        </div>
                    </div>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="details" class="form-control" placeholder="Details">
                        </div>
                    </div>
                    @error('details')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="handled_by" class="form-control" placeholder="Handled By">
                        </div>
                    </div>
                    @error('handled_by')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="sender" class="form-control" placeholder="Sender">
                        </div>
                    </div>
                    @error('sender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    <div class="row">
                        <div class="d-grid">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>