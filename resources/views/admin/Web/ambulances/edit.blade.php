@extends('admin.layouts.admin')

@section('title','Edit Ambulances', ['name' => $ambulance->name]) )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['ambulances.update', $ambulance->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">
                    Place name
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input value="{{$ambulance->title}}" id="title" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('title')) parsley-error @endif"
                           name="name" required>
                    @if($errors->has('title'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('title') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">
                    Address
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input value="{{$ambulance->Address}}" id="address" type="text"
                           class="form-control col-md-7 col-xs-12 @if($errors->has('address')) parsley-error @endif"
                           name="address" required>
                    @if($errors->has('address'))
                        <ul class="parsley-errors-list filled">
                            @foreach($errors->get('address') as $error)
                                <li class="parsley-required">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">
                    Create by User ->
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="user" name="user_id" class="select2" style="width: 100%" autocomplete="off">
                        @foreach($users as $user)
                            <option @if($ambulance->user->find($user->id)) selected="selected"
                                    @endif value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{ URL::previous() }}"> cancel </a>
                    <button type="submit" class="btn btn-success"> save</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection