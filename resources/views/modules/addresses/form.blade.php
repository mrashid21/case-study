<div class="form-group">
    <label for="inputName">Name</label>
    {!! Form::text('name', null, array('placeholder' => 'Enter name','class' => 'form-control', 'id' => 'inputName', 'required' => 'required', 'maxlength' => 191)) !!}
</div>

<div class="form-group">
    <label for="inputAddress">Address</label>
    {!! Form::textarea('address', null, array('placeholder' => 'Enter address','class' => 'form-control', 'id' => 'inputAddress', 'required' => 'required', 'maxlength' => 191, 'rows' => 3)) !!}
</div>

