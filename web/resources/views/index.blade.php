@extends('layouts.welcome')

@section('content')
  <div id="app" class="d-flex flex-column">
    <div class="container-fluid" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 10px; z-index:99;">
        <indexbanner></indexbanner>
    </div>
      
    <div class="container-fluid flex-grow-1">
      <router-view></router-view>
    </div>
    
    <footer>
      <copyright></copyright>
    </footer>
  </div>
@endsection


