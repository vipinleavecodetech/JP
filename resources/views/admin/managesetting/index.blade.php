@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
       
        <form action="{{ route('admin.manage-setting.settingUpdate',1)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Update Logo</label>
                        <input type="file" id="update_logo" name="update_logo" class="form-control" value="{{ old('update_logo') }}" >
                        {{ $managesetting_data->logo }}
                        @if($errors->has('update_logo'))
                            <em class="invalid-feedback">
                                {{ $errors->first('update_logo') }}
                            </em>
                        @endif
                    </div>
                </div>
                 <div class="col-lg-6">
                    
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Admin Email Id</label>
                        <input type="email" id="update_email" name="update_email" class="form-control" value="{{ $managesetting_data->email }}" required>
                        @if($errors->has('update_email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('update_email') }}
                            </em>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
             <div class="col-lg-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Update Phone</label>
                    <input type="text" id="update_phone" name="update_phone" class="form-control" value="{{ $managesetting_data->phone }}" required>
                    @if($errors->has('update_phone'))
                        <em class="invalid-feedback">
                            {{ $errors->first('update_phone') }}
                        </em>
                    @endif
                </div>
            </div>
             <div class="col-lg-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Update Address</label>
                    <input type="text" id="update_address" name="update_address" class="form-control" value="{{ $managesetting_data->address }}" required>
                    @if($errors->has('update_address'))
                        <em class="invalid-feedback">
                            {{ $errors->first('update_address') }}
                        </em>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
               <div class="col-lg-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Pharmacy Email Id</label>
                    <input type="text" id="pharmacy_email" name="pharmacy_email" class="form-control" value="{{ $managesetting_data->pharmacy_email }}" required>
                    @if($errors->has('pharmacy_email'))
                        <em class="invalid-feedback">
                            {{ $errors->first('pharmacy_email') }}
                        </em>
                    @endif
                </div>
            </div>
            
             <div class="col-lg-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Update Site URL</label>
                    <input type="text" id="update_site_url" name="update_site_url" class="form-control" value="{{ $managesetting_data->site_url }}" required>
                    @if($errors->has('update_site_url'))
                        <em class="invalid-feedback">
                            {{ $errors->first('update_site_url') }}
                        </em>
                    @endif
                </div>
            </div>
        </div>


        <div class="row">    
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Update FB URL</label>
                    <input type="text" id="update_fb_url" name="update_fb_url" class="form-control" value="{{ $managesetting_data->fb_url }}" required>
                    @if($errors->has('update_fb_url'))
                        <em class="invalid-feedback">
                            {{ $errors->first('update_fb_url') }}
                        </em>
                    @endif
                </div>
            </div>
            
             <div class="col-lg-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Update Twitter URL</label>
                    <input type="text" id="update_twitter_url" name="update_twitter_url" class="form-control" value="{{ $managesetting_data->twitter_url }}" required>
                    @if($errors->has('update_twitter_url'))
                        <em class="invalid-feedback">
                            {{ $errors->first('update_twitter_url') }}
                        </em>
                    @endif
                </div>
            </div>
        </div>
            
            <div class="row">
             <div class="col-lg-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Update LinkedIn URL</label>
                    <input type="text" id="update_linkedin_url" name="update_linkedin_url" class="form-control" value="{{ $managesetting_data->linkedin_url }}" required>
                    @if($errors->has('update_linkedin_url'))
                        <em class="invalid-feedback">
                            {{ $errors->first('update_linkedin_url') }}
                        </em>
                    @endif
                </div>
            </div>
            
             <div class="col-lg-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Update Instagram URL</label>
                    <input type="text" id="update_instagram_url" name="update_instagram_url" class="form-control" value="{{ $managesetting_data->instagram_url }}" required>
                    @if($errors->has('update_instagram_url'))
                        <em class="invalid-feedback">
                            {{ $errors->first('update_instagram_url') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="row">
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
