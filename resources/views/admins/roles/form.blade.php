@if (!isset($role))
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        {!! Form::text('name', null, array('id' => 'inputName', 'placeholder' => 'Enter name','class' => 'form-control')) !!}
    </div>
</div>
@endif

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Permission</label>
    <div class="col-sm-10">
        <div class="row">
            @foreach($permission as $value)
    
            <div class="col-4 mt-3">
                
                    @if (isset($rolePermissions))
                    <h5>{{ Str::ucfirst($value->name) }}</h5>

                    @foreach ($value->children as $item)
                    <div class="form-check">
                        <label>
                            {{ Form::checkbox('permission[]', $item->id, in_array($item->id, $rolePermissions) ? true : false, array('class' => 'name')) }}        
                            {{ $item->name }} 
                        </label>
                    </div>
                    @endforeach

                    
                    @else
                    <h5>{{ Str::ucfirst($value->name) }}</h5>

                    @foreach ($value->children as $item)
                    <div class="form-check">
                        <label>
                            {{ Form::checkbox('permission[]', $item->id, false, array('class' => 'name', 'id' => 'inputRoles')) }}        
                            {{ $item->name }} 
                        </label>
                    </div>
                    @endforeach
                    @endif
                    
                </label>
            </div>
            @endforeach
        </div>
        
    </div>
    
</div>

