@extends('admin.layout')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Create New Post</h1>
            <p class="text-gray-500 font-medium">Add a new blog post to Cross Tanzania Cycling.</p>
        </div>
        <a href="{{ route('admin.blogs.index') }}" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">Back to List</a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8">
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Post Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" required class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" placeholder="Enter title" />
                        @error('title') <p class="mt-1 text-xs text-red-600 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Excerpt (Short Summary)</label>
                        <textarea name="excerpt" rows="3" required class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" placeholder="Short description...">{{ old('excerpt') }}</textarea>
                        @error('excerpt') <p class="mt-1 text-xs text-red-600 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2 block">Content</label>
                        <!-- Simple Rich Text Editor Container -->
                        <div class="mt-2">
                            <textarea id="editor" name="content" class="hidden">{{ old('content') }}</textarea>
                            <div id="quill-editor" style="height: 400px;" class="rounded-xl border border-gray-200"></div>
                        </div>
                        @error('content') <p class="mt-1 text-xs text-red-600 font-bold">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Featured Image</label>
                        <div class="mt-2 p-4 border-2 border-dashed border-gray-200 rounded-2xl text-center">
                            <input type="file" name="image" accept="image/*" class="w-full text-xs" />
                            <p class="mt-2 text-[10px] text-gray-400 font-bold uppercase">Max 2MB (JPG, PNG)</p>
                        </div>
                        @error('image') <p class="mt-1 text-xs text-red-600 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Publication Date</label>
                        <input type="date" name="published_at" value="{{ old('published_at', date('Y-m-d')) }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full px-6 py-3 bg-red-600 rounded-xl text-sm font-bold text-white shadow-lg shadow-red-600/20 hover:bg-red-700 transition-all">Publish Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Quill Editor Assets -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#quill-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        var form = document.querySelector('form');
        form.onsubmit = function() {
            var content = document.querySelector('textarea[name=content]');
            content.value = quill.root.innerHTML;
        };
    </script>
@endsection
