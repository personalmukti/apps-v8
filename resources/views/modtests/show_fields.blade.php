<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/modtests.fields.id').':') !!}
    <p>{{ $modtest->id }}</p>
</div>

<!-- Field A Field -->
<div class="col-sm-12">
    {!! Form::label('field_A', __('models/modtests.fields.field_A').':') !!}
    <p>{{ $modtest->field_A }}</p>
</div>

<!-- Field B Field -->
<div class="col-sm-12">
    {!! Form::label('field_B', __('models/modtests.fields.field_B').':') !!}
    <p>{{ $modtest->field_B }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/modtests.fields.created_at').':') !!}
    <p>{{ $modtest->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/modtests.fields.updated_at').':') !!}
    <p>{{ $modtest->updated_at }}</p>
</div>

