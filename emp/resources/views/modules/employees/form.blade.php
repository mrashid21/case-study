<div class="form-group">
    <label for="inputName">Name</label>
    {!! Form::text('name', null, array('placeholder' => 'Enter name','class' => 'form-control', 'id' => 'inputName', 'required' => 'required', 'maxlength' => 191)) !!}
</div>

<div class="form-group">
    <label for="inputEmpNo">Emp No</label>
    {!! Form::text('emp_num', (isset($edit)&&($employee->details!=null))?$employee->details->emp_num:null, array('placeholder' => 'Enter employee no','class' => 'form-control', 'id' => 'inputEmpNo', 'required' => 'required', 'maxlength' => 191, 'oninput' => 'this.value=this.value.replace(/[^\d]/,"")')) !!}
</div>

<div class="form-group">
    <label for="inputEmail">Email</label>
    {!! Form::email('email', null, array('placeholder' => 'Enter email address','class' => 'form-control', 'id' => 'inputEmail', 'required' => 'required', (isset($edit)?'disabled':null), 'maxlength' => 191)) !!}
</div>

@if(!$edit)
<div class="form-group">
    <label for="inputPassword">Password</label>
    {!! Form::password('password', array('placeholder' => 'Password (if empty, default pw is "secretagent")','class' => 'form-control')) !!}
</div>

<div class="form-group">
    <label for="inputConfirmPassword">Confirm Password</label>
    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password (not required if using default pw)','class' => 'form-control')) !!}
</div>
@endif

<div class="form-group">
    <label for="inputAddress">Location</label>
    <select name="address_id" class="form-control" id="selAddress">
        @if(isset($employee->details->address_id))
        <option value="{{ $employee->details->address->id }}" selected>{{ $employee->details->address->name }}</option>
        @endif
    </select>
</div>

<input type="hidden" class="mr-2" name="roles" value="employee">
