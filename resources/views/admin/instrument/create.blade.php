<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Instrument
    </x-slot>

    <div class="row mb-5">
        <form action="{{ route('admin.instrument.store') }}" method="POST">
            @csrf
            <h5 class="mb-3 text-center">Demographics</h5>
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" value="{{ old('name') }}" placeholder="input fullname" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="place" class="form-label">Place</label>
                    <input type="text" class="form-control @error('place') is-invalid @enderror" name="place"
                        id="place" value="{{ old('place') }}" placeholder="input place" required>
                    @error('place')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control @error('designation') is-invalid @enderror"
                        name="designation" id="designation" value="{{ old('designation') }}"
                        placeholder="input designation" required>
                    @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="organisation" class="form-label">Organisation</label>
                    <input type="text" class="form-control @error('organisation') is-invalid @enderror"
                        name="organisation" id="organisation" value="{{ old('organisation') }}"
                        placeholder="input organisation" required>
                    @error('organisation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option selected disabled>{{ __('Select Gender') }}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="age" class="form-label">Age</label>
                    <select name="age" id="age" class="form-select @error('age') is-invalid @enderror">
                        <option selected disabled>{{ __('Select Age') }}</option>
                        <option value="30 to 40">30 to 40</option>
                        <option value="41 to 50">41 to 50</option>
                        <option value="51 to 60">51 to 60</option>
                        <option value="> 60">> 60</option>
                    </select>
                    @error('age')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="expertise" class="form-label">Area of Expertise</label>
                    <select name="expertise" id="expertise"
                        class="form-select @error('expertise') is-invalid @enderror">
                        <option selected disabled>{{ __('Select Expertise') }}</option>
                        <option value="Academia">Academia</option>
                        <option value="Research">Research</option>
                        <option value="Software Development">Software Development</option>
                        <option value="Administration">Administration</option>
                    </select>
                    @error('expertise')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="qualification" class="form-label">Qualification</label>
                    <select name="qualification" id="qualification"
                        class="form-select @error('qualification') is-invalid @enderror">
                        <option selected disabled>{{ __('Select Qualification') }}</option>
                        <option value="Bachelor">Bachelor</option>
                        <option value="Master">Master</option>
                        <option value="Doctorate">Doctorate</option>
                    </select>
                    @error('qualification')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="experience" class="form-label">Experience</label>
                    <select name="experience" id="experience"
                        class="form-select @error('experience') is-invalid @enderror">
                        <option selected disabled>{{ __('Select experience') }}</option>
                        <option value="Less than 5 years">Less than 5 years</option>
                        <option value="5 to 10 years">5 to 10 years</option>
                        <option value="More than 10 years">More than 10 years</option>
                    </select>
                    @error('experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- <div>
                @php
                    $groupedQuestions = $questions->groupBy('category.name');
                @endphp

                @foreach ($groupedQuestions as $categoryName => $questions)
                    <h5 class="mb-3 text-center">{{ $categoryName }}</h5>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($questions as $question)
                        <p>{{ $counter }}. {{ $question->name }}
                            <span>
                                <select name="experience" id="experience"
                                    class="form-select col-md-2 @error('experience') is-invalid @enderror">
                                    <option selected disabled>{{ __('Select Values') }}</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->value }}">{{ $level->name }} =
                                            {{ $level->value }}</option>
                                    @endforeach
                                </select>
                            </span>
                        </p>
                        @php
                            $counter++;
                        @endphp
                    @endforeach
                @endforeach
            </div> --}}
            <div>
                @php
                    $groupedQuestions = $questions->groupBy('category.name');
                @endphp

                @foreach ($groupedQuestions as $categoryName => $questions)
                    <h5 class="pt-3 text-center border-top">{{ $categoryName }}</h5>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($questions as $question)
                    <div class="mt-3">
                        <p>{{ $counter }}. {{ $question->name }}</p>
                        @foreach ($levels as $level)
                            <div class="form-check">
                                <input class="form-check-input @error('experience') is-invalid @enderror"
                                    type="radio" name="experience_{{ $question->id }}"
                                    id="experience_{{ $question->id }}_{{ $level->value }}"
                                    value="{{ $level->value }}">
                                <label class="form-check-label"
                                    for="experience_{{ $question->id }}_{{ $level->value }}">
                                    {{ $level->name }} = {{ $level->value }}
                                </label>
                            </div>
                        @endforeach
                        @php
                            $counter++;
                        @endphp
                    @endforeach
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

</x-admin-layout>
