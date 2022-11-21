<div class="form-body">
    <form class="row g-3" method="POST" wire:submit.prevent='register'>
        <div class="col-12">
            <label for="inputFirstName" class="form-label">First Name</label>
            <input type="text" wire:model.lazy="first_name" class="form-control @error('first_name') is-invalid @enderror"
                id="inputFirstName" placeholder="First Name" required autofocus>
            @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputLastName" class="form-label">Last Name</label>
            <input type="email" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                id="inputLastName" placeholder="Last Name" value="{{ old('last_name') }}" required autofocus>
            @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputEmailAddress" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                id="inputEmailAddress" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputChoosePassword" class="form-label">Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control border-end-0 @error('password') is-invalid @enderror"
                    name="password" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;"
                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <label for="inputChoosePassword" class="form-label">Confirm Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password"
                    class="form-control border-end-0 @error('password_confirmation') is-invalid @enderror"
                    name="password" id="inputChoosePassword" placeholder="Confirm Password"> <a href="javascript:;"
                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-check form-switch">
                <input class="form-check-input" name="terms" type="checkbox" id="inputTerms">
                <label class="form-check-label" for="inputTerms">I read and agree to Terms &amp;
                    Conditions</label>
            </div>
        </div>
        <div class="col-12">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary"><i class="bx bx-user"></i>Register</button>
            </div>
        </div>
    </form>
</div>
