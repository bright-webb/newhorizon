@extends('layout.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <h2 class="big">You are here!</h2>
            <a href="https://{{$_GET['user']}}" target="_blank" style="position: relative; top: -10px">{{$_GET['user']}}</a>
            <div class="ui divider"></div>

            <form class="ui form">
                <div class="field">
                    <label><strong>What should we call you?</strong></label>
                    <input type="text" name="name" class="name" pattern="^[A-Za-z\s]+$" placeholder="Please tell us your name" required>
                </div>
                <div class="field date hidden">
                    <label><strong>Oh, and how old are you?</strong> <span class="age"></span></label>
                    <input type="date" name="dob" class="dob" required>
                </div>
                <div class="field">
                    <button type="button" class="ui secondary button next-btn" style="width: 100%">continue</button>
                </div>
            </form>
        </div>
    </div>
@endsection
