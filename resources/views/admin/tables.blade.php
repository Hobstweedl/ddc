@extends('layouts.master')

@section('content')
    <h5 class="title is-5">Lookup Tables</h5>
    <div class="columns">

        <div class="column is-one-fourth">
            <div class="box">
                <h5 class="title is-5"><i class="fa fa-address-card-o" aria-hidden="true"></i> Address Types</h5>
                @include('admin.addresstypes.list')
            </div>
        </div>
        <div class="column is-one-fourth">
            <div class="box">
                <h5 class="title is-5"><i class="fa fa-phone" aria-hidden="true"></i> Phone Types</h5>
                @include('admin.phonetypes.list')
            </div>
        </div>
        <div class="column is-one-fourth">
            <div class="box">
                <h5 class="title is-5"><i class="fa fa-commenting-o" aria-hidden="true"></i> How Did You Hear?</h5>
                @include('admin.howdidyouhear.list')
            </div>
        </div>
        <div class="column is-one-fourth">
            <div class="box">
                <h5 class="title is-5"><i class="fa fa-map-marker" aria-hidden="true"></i> Locations</h5>
                @include('admin.locations.list')
            </div>
        </div>
    </div>

@endsection