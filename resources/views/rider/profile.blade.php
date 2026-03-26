@extends('rider.layout')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
            <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Profile</div>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">My profile</h1>
            <p class="mt-2 text-gray-600">Sasisha taarifa zako na weka historia ya awards zako.</p>
        </div>
    </div>

    @if (session('status'))
        <div class="mt-5 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800">
            {{ session('status') }}
        </div>
    @endif

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-7">
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 sm:p-8">
                <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Account details</div>
                <div class="mt-2 text-xl font-extrabold text-gray-900">Edit profile</div>

                <form class="mt-6 space-y-5" method="POST" action="{{ route('rider.profile.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="flex items-center gap-4">
                        <div class="h-16 w-16 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200">
                            @if ($user->avatar_path)
                                <img src="{{ asset('storage/' . $user->avatar_path) }}" alt="Avatar" class="h-full w-full object-cover" />
                            @else
                                <div class="h-full w-full flex items-center justify-center text-gray-400 font-extrabold">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                            @endif
                        </div>

                        <div class="flex-1">
                            <div class="text-sm font-extrabold text-gray-900">Avatar</div>
                            <div class="text-xs text-gray-500">Upload picha yako (max 2MB)</div>
                            <input type="file" name="avatar" accept="image/*" class="mt-2 block w-full text-sm" />
                            @error('avatar')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Name</div>
                            <input name="name" value="{{ old('name', $user->name) }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" />
                            @error('name')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Phone</div>
                            <input name="phone" value="{{ old('phone', $user->phone) }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" placeholder="+255..." />
                            @error('phone')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Gender</div>
                            <select name="gender" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0">
                                <option value="">-- Select --</option>
                                <option value="male" @selected(old('gender', $user->gender) === 'male')>Male</option>
                                <option value="female" @selected(old('gender', $user->gender) === 'female')>Female</option>
                            </select>
                            @error('gender')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Date of birth</div>
                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth', optional($user->date_of_birth)->format('Y-m-d')) }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" />
                            @error('date_of_birth')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Region</div>
                            <input name="region" value="{{ old('region', $user->region) }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" />
                            @error('region')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">City</div>
                            <input name="city" value="{{ old('city', $user->city) }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" />
                            @error('city')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Club</div>
                            <input name="club" value="{{ old('club', $user->club) }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" />
                            @error('club')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Bio</div>
                            <textarea name="bio" rows="4" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" placeholder="Tell us about you...">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-2 border-t border-gray-100"></div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Emergency contact name</div>
                            <input name="emergency_contact_name" value="{{ old('emergency_contact_name', $user->emergency_contact_name) }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" />
                            @error('emergency_contact_name')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Emergency contact phone</div>
                            <input name="emergency_contact_phone" value="{{ old('emergency_contact_phone', $user->emergency_contact_phone) }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" placeholder="+255..." />
                            @error('emergency_contact_phone')
                                <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3">
                        <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f]">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 sm:p-8">
                <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Awards & History</div>
                <div class="mt-2 text-xl font-extrabold text-gray-900">My awards</div>

                <form class="mt-6 space-y-4" method="POST" action="{{ route('rider.awards.store') }}">
                    @csrf

                    <div>
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Title</div>
                        <input name="title" value="{{ old('title') }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" placeholder="E.g. Best Climber" />
                        @error('title')
                            <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Event name</div>
                            <input name="event_name" value="{{ old('event_name') }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" placeholder="Event" />
                        </div>
                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Position</div>
                            <input name="position" value="{{ old('position') }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" placeholder="1st / 2nd / Finisher" />
                        </div>
                    </div>

                    <div>
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Awarded on</div>
                        <input type="date" name="awarded_on" value="{{ old('awarded_on') }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" />
                    </div>

                    <div>
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Notes</div>
                        <textarea name="notes" rows="3" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" placeholder="More details...">{{ old('notes') }}</textarea>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-gray-900 text-white font-extrabold shadow hover:bg-black">Add award</button>
                    </div>
                </form>

                <div class="mt-6 border-t border-gray-100 pt-5">
                    <div class="text-sm font-extrabold text-gray-900">History</div>

                    <div class="mt-3 grid gap-3">
                        @forelse ($awards as $award)
                            <div class="rounded-2xl border border-gray-200 p-4">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <div class="font-extrabold text-gray-900">{{ $award->title }}</div>
                                        <div class="mt-1 text-xs text-gray-500">
                                            @if($award->event_name) <span class="font-semibold text-gray-700">{{ $award->event_name }}</span> @endif
                                            @if($award->position) <span class="ml-2">• {{ $award->position }}</span> @endif
                                            @if($award->awarded_on) <span class="ml-2">• {{ $award->awarded_on->format('M d, Y') }}</span> @endif
                                        </div>
                                        @if($award->notes)
                                            <div class="mt-2 text-sm text-gray-600">{{ $award->notes }}</div>
                                        @endif
                                    </div>

                                    <form method="POST" action="{{ route('rider.awards.destroy', $award) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-extrabold text-red-600 hover:text-red-700">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-sm text-gray-600">No awards yet.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
