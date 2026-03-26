@extends('admin.layout')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Blog Management</h1>
            <p class="text-gray-500 font-medium">Create, update, and delete blog posts.</p>
        </div>
        <div>
            <a href="{{ route('admin.blogs.create') }}" class="px-4 py-2 bg-red-600 rounded-xl text-sm font-bold text-white shadow-lg shadow-red-600/20 hover:bg-red-700 transition-all flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Post
            </a>
        </div>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Post</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Date</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($posts as $post)
                        <tr class="hover:bg-gray-50/50 transition-all">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 rounded-lg bg-gray-100 overflow-hidden flex-shrink-0">
                                        @if($post->image_path)
                                            <img src="{{ asset($post->image_path) }}" class="h-full w-full object-cover" />
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900 text-sm">{{ $post->title }}</div>
                                        <div class="text-[10px] text-gray-500 font-medium line-clamp-1">{{ $post->excerpt }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-xs font-bold text-gray-500">
                                {{ $post->published_at?->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('admin.blogs.edit', $post) }}" class="text-xs font-black text-gray-400 hover:text-gray-600 uppercase no-underline">Edit</a>
                                <form action="{{ route('admin.blogs.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-black text-red-600 hover:text-red-700 uppercase" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-50">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
