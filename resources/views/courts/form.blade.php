<!-- Court Form -->
<form class="container-sm mt-5" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($court) && $court->exists)
        @method('PUT') <!-- Use PUT method for editing -->
    @endif

    <div class="row g-3">
        <div class="col">
            <!-- Court Name Field -->
            <x-textfield name="name" label="Court Name" type="text" placeholder="Enter court name" :value="old('name', $court->name ?? '')" />
        </div>
    </div>
    
    <div class="row g-3">
        <div class="col">
            <!-- Court Location Field -->
            <x-textfield name="location" label="Location" type="text" placeholder="Enter court's location" :value="old('location', $court->location ?? '')" />
        </div>
        <div class="col">
            <!-- Court Jurisdiction Field -->
            <x-textfield name="jurisdiction" label="Jurisdiction" type="text" placeholder="Enter court's jurisdiction" :value="old('jurisdiction', $court->jurisdiction ?? '')" />
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
