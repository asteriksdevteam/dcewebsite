@extends('user_panel.layout.app')
@section('content')

<section class='aboutbanner'>
    <div class='container centercontainer'>
        <div class="row">
            <div class='col-lg-8'>
                <div class='bannercontnet'>
                    <h1><span class='highlight'>{{ $TermsCondition->heading }}</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='whoweare-section'> 
    <div class="container">
        <div class="row">
            <div class='col-lg-12 col-md-6 col-xs-12'>
                {!! $TermsCondition->text !!}
            </div>
        </div>
    </div>
</section>

@endsection