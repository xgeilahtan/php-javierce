@extends('common.base-template')

@section('header')
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
        Meu primeiro template do laravel
		</div>

@endsection



@section('content')
			<div class="content-wrapper">
				<div class="content-header">
					@yield('breadcrumb')
				</div>

				<div class="{{$page_width ?? 'container'}}">
					@yield('page')
				</div>
			</div>

		</div>

@endsection