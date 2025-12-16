<form method="POST" action="{{ route('contact.store') }}" class="form" novalidate>
    @csrf

    {{-- show success / error flashes if you use them --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <div class="form-grid">
        {{-- Name --}}
        <div class="form-row">
            <label for="name">Name <span class="req">*</span></label>
            <input id="name" name="name" type="text" class="input" value="{{ old('name') }}" required
                autocomplete="name" />
            @error('name') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        {{-- Company --}}
        <div class="form-row">
            <label for="company">Company/Organization</label>
            <input id="company" name="company" type="text" class="input" value="{{ old('company') }}"
                autocomplete="organization" />
            @error('company') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        {{-- Email --}}
        <div class="form-row">
            <label for="email">Email <span class="req">*</span></label>
            <input id="email" name="email" type="email" class="input" value="{{ old('email') }}" required
                autocomplete="email" />
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        {{-- Subject --}}
        <div class="form-row">
            <label for="subject">Subject</label>
            <select id="subject" name="subject" class="input select">
                @php $subj = old('subject'); @endphp
                <option value="" {{ $subj == '' ? 'selected' : '' }}>Select a subject…</option>
                <option value="Sales Inquiry" {{ $subj == 'Sales Inquiry' ? 'selected' : '' }}>Sales Inquiry</option>
                <option value="Technical Support" {{ $subj == 'Technical Support' ? 'selected' : '' }}>Technical Support
                </option>
                <option value="Partnership Opportunity" {{ $subj == 'Partnership Opportunity' ? 'selected' : '' }}>Partnership
                    Opportunity</option>
                <option value="General Question" {{ $subj == 'General Question' ? 'selected' : '' }}>General Question</option>
            </select>
            @error('subject') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        {{-- Message (full width) --}}
        <div class="form-row form-row--full">
            <label for="message">Message <span class="req">*</span></label>
            <textarea id="message" name="message" rows="6" class="textarea" required>{{ old('message') }}</textarea>
            @error('message') <p class="field-error">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Send Message</button>
        <span class="help-inline">We’ll reply within one business day.</span>
    </div>
</form>