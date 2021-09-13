@extends('layouts.app')

@section('content')

<p>Welcome.</p>


<div class="row">
  <div class="blue-grey darken-3 white-text s12 z-depth-2 center-align">
    <strong style="font-size: large">benutzer@white-laptop: ~</strong>
  </div>
  <div class="grey darken-4 white-text s12 z-depth-2 left-align" style="font-family: Monospace"><strong class="green-text">
  benutzer@white-laptop:</strong><strong class="blue-text">~/minuteman</strong>$ minuteman-launch --now<br>
  WARNING:<br>
  The launch of intercontinental missiles without prior authorization from a superior officer is illegal and is punishable by military and international courts. It is critically important to use this program only on an official, written order. Make sure that such an order is stored at a safe place.<br><br>
  
  Are you sure you want to proceed? (Y/N) █
  </div>
  <div class="blue-grey darken-1 white-text s12 z-depth-2 center-align">
  Maybe you are sure, but this is <strong>not</strong> a terminal window. Sorry about that.
  </div>
  
</div>


  <div class="row">
    <div class="col s12 m6 l6">
      <div class="card red">
        <div class="card-content white-text">
          <span class="card-title">Not this time...</span>
          <p>If you are interested in destroying the world through such and other means,
          we have some ideas for you.</p>
        </div>
        <div class="card-action">
          <a href="https://en.wikipedia.org/wiki/Human_extinction">I'm in!</a>
        </div>
      </div>
    </div>
    <div class="col s12 m6 l6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Come on...</span>
          <p>Would rather make the world a better place?
          (Actually I could promote anything here.)</p>
        </div>
        <div class="card-action">
          <a href="http://example.com">Let's go!</a>
        </div>
      </div>
    </div>
  </div>
           
@endsection
