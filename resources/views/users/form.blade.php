<form class="container-sm" action="{{$action}}" method="POST">
    <div class="row g-3">
        <div class="col">
            <x-textfield name="fullname" label="Full name" type="text" placeholder="Enter User's full name" :value="old('fullname')" />
        </div>
        <div class="col">
            <x-textfield name="email" label="Email" type="email" placeholder="Enter email" :value="old('email')" />
        </div>
        <div class="col">
            <x-textfield name="password" label="Password" type="password" placeholder="Enter password" :value="old('password')" />
        </div>
        @php
        $roles = [
            ['value' => 'super_admin', 'label' => 'Super Admin'],
            ['value' => 'admin', 'label' => 'Admin'],
        ];
        @endphp
        <x-selectfield :options="$roles" name="role" label="Select Role" :value="old('role')" />
    </div>
    @csrf
    @isset($edit)
        @method('PATCH')
    @endisset
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
