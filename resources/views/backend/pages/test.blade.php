@extends('backend.layouts.app')
@section('main-content')

<div class="content-wrapper">
<div id="vue-wrapper">
    <form v-on:submit.prevent="saveForm()">
        First name:<br>
        <input type="text" name="firstname" value="Mickey" v-model="newItem.fname">
        <br>
        Last name:<br>
        <input type="text" name="lastname" value="Mouse" v-model="newItem.lname">
        <br><br>
        <input type="submit" value="Submit">
    </form> 
</div>
</div>

<script>
    var app = new Vue({
            el: '#vue-wrapper',

            data: function () {
                return {
                    newItem: {
                        fname: '',
                        lname: '',
                    }
                }
            },
            methods: {
                saveForm() {
                    alert(1);
                }
            },

    });
</script>

@endsection