@extends('admin.layout')

@section('page_title', 'Banners')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold">All Banners</h2>

    <a href="/admin/banner/create"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
        + Add Banner
    </a>
</div>

<div class="bg-white shadow rounded-xl overflow-hidden">

    <table class="w-full text-sm">

        <thead class="bg-gray-100 text-gray-600">
            <tr>
                <th class="p-3 text-left">Image</th>
                <th class="p-3 text-left">Title</th>
                <th class="p-3 text-left">Description</th>
                <th class="p-3 text-right">Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($banners as $b)
            <tr class="border-t hover:bg-gray-50">

                <td class="p-3">
                    <img src="/banners/{{ $b->image }}"
                         class="w-20 h-12 object-cover rounded-lg">
                </td>

                <td class="p-3 font-medium text-gray-800">
                    {{ $b->title }}
                </td>

                <td class="p-3 text-gray-500">
                    {{$b->description }}
                </td>

                <td class="p-3 text-right space-x-2">

                    <a href="/admin/banner/edit/{{ $b->id }}"
                       class="px-3 py-1 bg-blue-100 text-blue-600 rounded-md text-xs hover:bg-blue-200">
                        Edit
                    </a>

                    <a href="/admin/banner/delete/{{ $b->id }}"
                       onclick="return confirm('Delete this banner?')"
                       class="px-3 py-1 bg-red-100 text-red-600 rounded-md text-xs hover:bg-red-200">
                        Delete
                    </a>

                </td>

            </tr>
            @endforeach

        </tbody>

    </table>

</div>

@endsection