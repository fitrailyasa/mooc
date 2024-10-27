<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Instrument
    </x-slot>

    <div class="row mb-5">
        @if (auth()->user()->role == 'admin')
            <form action="{{ route('admin.instrument.store') }}" method="POST">
            @elseif (auth()->user()->role == 'user')
                <form action="{{ route('user.instrument.store') }}" method="POST">
        @endif
        @csrf
        <h5 class="mb-3 text-center">Demographics</h5>
        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    id="name" value="{{ auth()->user()->name }}" placeholder="input fullname" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-4">
                <label for="place" class="form-label">Place</label>
                <input type="text" class="form-control @error('place') is-invalid @enderror" name="place"
                    id="place" value="{{ auth()->user()->place }}" placeholder="input place" required>
                @error('place')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-4">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation"
                    id="designation" value="{{ auth()->user()->designation }}" placeholder="input designation" required>
                @error('designation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-4">
                <label for="organisation" class="form-label">Organisation</label>
                <input type="text" class="form-control @error('organisation') is-invalid @enderror"
                    name="organisation" id="organisation" value="{{ auth()->user()->organisation }}"
                    placeholder="input organisation" required>
                @error('organisation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                    <option selected disabled>{{ __('Select Gender') }}</option>
                    <option value="Male" {{ auth()->user()->gender == 'Male' ? 'selected' : '' }}>Male
                    </option>
                    <option value="Female" {{ auth()->user()->gender == 'Female' ? 'selected' : '' }}>Female
                    </option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-4">
                <label for="age" class="form-label">Age</label>
                <select name="age" id="age" class="form-select @error('age') is-invalid @enderror">
                    <option selected disabled>{{ __('Select Age') }}</option>
                    <option value="30 to 40" {{ auth()->user()->age == '30 to 40' ? 'selected' : '' }}>30 to 40
                    </option>
                    <option value="41 to 50" {{ auth()->user()->age == '41 to 50' ? 'selected' : '' }}>41 to 50
                    </option>
                    <option value="51 to 60" {{ auth()->user()->age == '51 to 60' ? 'selected' : '' }}>51 to 60
                    </option>
                    <option value="> 60" {{ auth()->user()->age == '> 60' ? 'selected' : '' }}>> 60</option>
                </select>
                @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-4">
                <label for="expertise" class="form-label">Area of Expertise</label>
                <select name="expertise" id="expertise" class="form-select @error('expertise') is-invalid @enderror">
                    <option selected disabled>{{ __('Select Expertise') }}</option>
                    @foreach ($expertises as $expertise)
                        <option value="{{ $expertise->name }}"
                            {{ auth()->user()->expertise == $expertise->name ? 'selected' : '' }}>
                            {{ $expertise->name }}</option>
                    @endforeach
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
                    @foreach ($qualifications as $qualification)
                        <option value="{{ $qualification->name }}"
                            {{ auth()->user()->qualification == $qualification->name ? 'selected' : '' }}>
                            {{ $qualification->name }}</option>
                    @endforeach
                </select>
                @error('qualification')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-4">
                <label for="experience" class="form-label">Experience</label>
                <select name="experience" id="experience" class="form-select @error('experience') is-invalid @enderror">
                    <option selected disabled>{{ __('Select experience') }}</option>
                    <option value="Less than 5 years"
                        {{ auth()->user()->experience == 'Less than 5 years' ? 'selected' : '' }}>Less than 5
                        years</option>
                    <option value="5 to 10 years"
                        {{ auth()->user()->experience == '5 to 10 years' ? 'selected' : '' }}>5 to 10 years
                    </option>
                    <option value="More than 10 years"
                        {{ auth()->user()->experience == 'More than 10 years' ? 'selected' : '' }}>More than 10
                        years</option>
                </select>
                @error('experience')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
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
                                <input class="form-check-input @error('question.' . $question->id) is-invalid @enderror"
                                    type="radio" name="question[{{ $question->id }}]"
                                    id="question_{{ $question->id }}_{{ $level->value }}"
                                    value="{{ $level->value }}">
                                <label class="form-check-label"
                                    for="question_{{ $question->id }}_{{ $level->value }}">
                                    {{ $level->name }} = {{ $level->value }}
                                </label>
                            </div>
                        @endforeach
                        @error('question.' . $question->id)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @php
                            $counter++;
                        @endphp
                @endforeach
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

</x-admin-layout>
