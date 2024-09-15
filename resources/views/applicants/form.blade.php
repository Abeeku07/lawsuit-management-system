<!-- Applicant/Defendant Form -->
<form class="container-sm mt-5" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($edit) 
        @method('PUT') <!-- Use PUT method for editing -->
    @endif

    <div class="row g-3">
        <div class="col">
            <!-- Applicant/Defendant Name Field -->
            <x-textfield name="name" label="Name" type="text" placeholder="Enter name" 
                :value="old('name', $applicant->name ?? $defendant->name ?? '')" />
        </div>
    </div>
    
    <div class="row g-3">
        <div class="col">
            <!-- Phone Field -->
            <x-textfield name="phone" label="Phone" type="tel" placeholder="Enter phone number" 
                :value="old('phone', $applicant->phone ?? $defendant->phone ?? '')" />
        </div>
        <div class="col">
            <!-- Email Field -->
            <x-textfield name="email" label="Email" type="email" placeholder="Enter email address" 
                :value="old('email', $applicant->email ?? $defendant->email ?? '')" />
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
