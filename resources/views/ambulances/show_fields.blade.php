<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $ambulance->title }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $ambulance->address }}</p>
</div>

<!-- Longitude Field -->
<div class="form-group">
    {!! Form::label('longitude', 'Longitude:') !!}
    <p>{{ $ambulance->longitude }}</p>
</div>

<!-- Latitude Field -->
<div class="form-group">
    {!! Form::label('latitude', 'Latitude:') !!}
    <p>{{ $ambulance->latitude }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $ambulance->user_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $ambulance->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $ambulance->updated_at }}</p>
</div>

