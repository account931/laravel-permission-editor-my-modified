{{-- @extends('permission-editor::layouts.app') --}}
@extends('layouts.app')

@section('content')

    
	<!-- Injected -->
	<div class="min-h-full">
	    <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('permission-editor.roles.index') }}"
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                           @if (request()->routeIs('permission-editor.roles.*')) border-indigo-500 text-gray-900
                           @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300
                           @endif">Roles</a>
                        <a href="{{ route('permission-editor.permissions.index') }}"
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                           @if (request()->routeIs('permission-editor.permissions.*')) border-indigo-500 text-gray-900
                           @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300
                           @endif">Permissions</a>
	    </div>					   
    </div>
    <!-- Injected -->
		
		
    <div class="sm:flex sm:items-center">
		
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Roles (modified forked package)</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('permission-editor.roles.create') }}"
               class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                Add Role
            </a>
        </div>
    </div>
	
	
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Name
                            </th>
                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Permissions
                            </th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($roles as $role)
                            <tr>
                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900 sm:pl-6">
                                    {{ $role->name }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900">
                                    {{ $role->permissions_count }}
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="{{ route('permission-editor.roles.edit', $role) }}"
                                       class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-1 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                                        Edit
                                    </a>

                                    <form action="{{ route('permission-editor.roles.destroy', $role) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure?')"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-600 px-4 py-1 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    No roles found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
