<!-- defendant Form -->
<form class="container-sm mt-5" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($defendant) && $defendant->exists)
        @method('PUT') <!-- Use PUT method for editing -->
    @endif

    <div class="row g-3">
        
        <div class="col">
           
 
    <div class="mb-3">
        <label for="name" class="form-label">Defendant Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Defendant Phone</label>
        <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Defendant Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <!-- <button type="submit" class="btn btn-primary">Save Defendant</button> -->


        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
