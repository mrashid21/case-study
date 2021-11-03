<div class="form-group">
    <label for="inputName">Name</label>
    {!! Form::text('name', null, array('placeholder' => 'Enter name','class' => 'form-control', 'id' => 'inputName', 'required' => 'required', 'maxlength' => 191)) !!}
</div>

<div class="form-group">
    <label for="inputEmail">Email</label>
    {!! Form::email('email', null, array('placeholder' => 'Enter email address','class' => 'form-control', 'id' => 'inputEmail', 'required' => 'required', (isset($create)?null:'disabled'), 'maxlength' => 191)) !!}
</div>

@if($create || auth::user()->id == $user->id)
<div class="form-group">
    <label for="inputPassword">Password</label>
    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
</div>

<div class="form-group">
    <label for="inputConfirmPassword">Confirm Password</label>
    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
</div>
@endif

<div class="form-group">
    <label for="roles">Assign Role</label>
    @foreach($roles as $key => $role)
    <div class="col-3">
        <label class="checkbox-inline">
            {{ Form::checkbox('roles[]', $role, (isset($user_roles))?(in_array($role, $user_roles) ? true : false):null, array('class' => 'name')) }}
            {{ $role }}
        </label>
    </div>
    @endforeach
</div>

