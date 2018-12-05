@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="bg-white p-4 rounded shadow">
            <div class="flex -mx-2 flex-col-reverse md:flex-row">
                <div class="w-full md:w-1/2 px-2 mb-2">
                    <h2 class="font-normal mb-2">Searchable Lists</h2>
                    <div v-if="lists.length" class="w-full mb-4">
                        <transition-group name="fade" tag="ul" class="list-reset">
                            <li v-for="(list, index) in lists"
                                class="mb-2 bg-blue-lightest rounded p-2 cursor-pointer" :key="list.name" @click="showList(index)">
                                <div class="w-full flex justify-between items-center">
                                    <strong>@{{list.name}}</strong>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                         class="text-grey-dark cursor-pointer hover:text-red" @click.stop="destroy(index)">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </div>
                                <div class="mt-2 w-full" v-if="show == index">@{{list.content}}</div>
                            </li>
                        </transition-group>
                    </div>
                    <div>
                        <div>
                            <input type="text" class="border rounded p-2 block w-full mb-2"
                                   v-model="name" placeholder="Name...">
                        </div>
                        <div>
                    <textarea class="border rounded p-2 block w-full h-32 mb-2"
                              v-model="content" placeholder="Code1 Code2 Code3..."></textarea>
                        </div>
                        <button class="px-4 py-2 bg-blue rounded text-white hover:bg-blue-dark" @click.prevent="add">Add</button>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-2">
                    <button @click="start = !start" class="w-full bg-blue p-2 rounded text-white mb-4">Toggle Video Feed
                    </button>
                    <scanner v-if="start" :reader-size="{width: 200, height: 150}" @detected="processResult"></scanner>
                </div>
            </div>
        </div>
    </section>
    <transition name="fade">
    <div class="fixed w-full pin-b" :class="{'bg-green': names.length, 'bg-red': !names.length}" v-show="showResult">
        <div class="container py-4">
            <p v-if="names.length">
                <strong>@{{code.toUpperCase()}}</strong> is in lists: @{{names.join(',')}}
            </p>
            <p v-else>
                <strong>@{{code.toUpperCase()}}</strong> is in no list
            </p>
        </div>
    </div>
    </transition>
@endsection
