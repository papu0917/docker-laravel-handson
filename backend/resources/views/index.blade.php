@extends('layouts.app')
@section('content')
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script> --}}
    <div id="app-7">
        <ol>
            <!--
                                                                                                                                                                                                      各 todo-item の内容を表す todo オブジェクトを与えます。
                                                                                                                                                                                                      これにより内容は動的に変化します。
                                                                                                                                                                                                      また後述する "key" を各コンポーネントに提供する必要があります。
                                                                                                                                                                                                     -->
            <todo-item v-for="item in groceryList" v-bind:todo="item" v-bind:key="item.id"></todo-item>
        </ol>
    </div>

    <div id="example-1">
        <button @click="show = !show">
            Toggle render
        </button>
        <transition name="slide-fade">
            <p v-if="show">hello</p>

        </transition>

    </div>
    <div id="flip-list-demo" class="demo">
        <button v-on:click="shuffle">Shuffle</button>
        <transition-group name="flip-list" tag="ul">
            <li v-for="item in items" v-bind:key="item">
                @{{ item }}
            </li>
        </transition-group>
    </div>
@endsection
