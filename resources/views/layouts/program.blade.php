@extends('template')

@section('header')
	<div class="fb-like pull-left" data-href="https://www.facebook.com/targygraf" data-layout="standard" data-action="recommend" data-show-faces="false" data-share="false"></div>

	@if ($university->has_logo)
		<img class="university-logo" src="{{ url('assets/img/logo/' . $university->slug . '.svg') }}">
	@endif

	@include('parts.program-selector', ['hidden' => true])

	<h1><a href="{{ route('university', ['university' => $university]) }}" class="muted">{{ $university->name }}</a> - {{ $program->name }}</h1>
	@if ( $program->description )
		<div class="program-description">
			{{ $program->description }}
		</div>
	@endif
	@if ( $program->curriculum_updated_at )
		@if ( date('Y', strtotime($program->curriculum_updated_at)) < date('Y') )
			<div class="program-curriculum-outdated">
				Ez egy régebbi (<b>{{ $program->curriculum_updated_at }}</b>) tanterv, hivatalos forrásból is ellenőrizd a tárgyaidat!
			</div>
		@else
			<div class="program-curriculum-updated">
				Tanterv: <b>{{ $program->curriculum_updated_at }}</b>
			</div>
		@endif
	@endif
@stop

@section('buttons')
	<div class="button reset" title="Adatok törlése"><i class="fa fa-power-off"></i></div>
	<a href="{{ route('university', ['university' => $university]) }}" class="button university" title="Egyetem"><i class="fa fa-university"></i></a>
@stop

@section('main')
	@include('parts.help')
	@include('parts.progressbar')
	@include('parts.credits-counter')
	@include('parts.targygraf')
@stop
