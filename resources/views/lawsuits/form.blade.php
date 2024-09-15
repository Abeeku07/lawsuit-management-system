<!-- Lawsuit Form -->
<form action="{{ $action }}" method="POST">
    @csrf
    @if (isset($lawsuit) && $lawsuit->exists)
        @method('PUT')
    @endif

    <!-- Lawsuit Fields -->
    <div class="mb-3">
        <label for="name" class="form-label">Lawsuit Name</label>
        <input type="text" name="lawsuit_name" class="form-control" value="{{ old('lawsuit_name', $lawsuit->lawsuit_name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="citation" class="form-label">Citation</label>
        <input type="text" name="citation" class="form-control" value="{{ old('citation', $lawsuit->citation ?? '') }}" required>
    </div>

   <!-- Court Dropdown -->
<div class="mb-3">
    <label for="court_id" class="form-label">Select Court</label>
    <select name="court_id" class="form-select" required>
        <option value="">Select a court</option>
        @foreach($courts as $court)
            <option value="{{ $court->id }}" {{ old('court_id', $lawsuit->court_id ?? '') == $court->id ? 'selected' : '' }}>
                {{ $court->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <!-- Date of Commencement Field -->
    <x-textfield name="doc" label="DOC" type="date" placeholder="Enter lawsuit start date" :value="old('doc', $lawsuit->doc ?? '')" />
</div>




    <!-- Embedded Applicant Fields -->
    <h5>Applicant Information</h5>
    <div class="mb-3">
        <label for="applicant_name" class="form-label">Applicant Name</label>
        <input type="text" name="applicant_name" class="form-control" value="{{ old('applicant_name') }}" required>
    </div>

    <div class="mb-3">
        <label for="applicant_phone" class="form-label">Applicant Phone</label>
        <input type="tel" name="applicant_phone" class="form-control" value="{{ old('applicant_phone') }}" required>
    </div>

    <div class="mb-3">
        <label for="applicant_email" class="form-label">Applicant Email</label>
        <input type="email" name="applicant_email" class="form-control" value="{{ old('applicant_email') }}" required>
    </div>

    <!-- Embedded Defendant Fields -->
    <h5>Defendant Information</h5>
    <div class="mb-3">
        <label for="defendant_name" class="form-label">Defendant Name</label>
        <input type="text" name="defendant_name" class="form-control" value="{{ old('defendant_name') }}" required>
    </div>

    <div class="mb-3">
        <label for="defendant_phone" class="form-label">Defendant Phone</label>
        <input type="tel" name="defendant_phone" class="form-control" value="{{ old('defendant_phone') }}" required>
    </div>

    <div class="mb-3">
        <label for="defendant_email" class="form-label">Defendant Email</label>
        <input type="email" name="defendant_email" class="form-control" value="{{ old('defendant_email') }}" required>
    </div>

    

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
