<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swiss TPH Barcode Scanner</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css"/>
</head>
<body class="font-sans antialiased text-black">
<header class="h-16 bg-blue flex items-center text-white mb-4">
    <div class="container">
        <h1>Swiss TPH Barcode Scanner</h1>
    </div>
</header>
<div id="app">
    <section class="container">
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
                        <input type="text" class="w-full bg-grey-light rounded px-1 py-2 mb-2 block outline-none"
                               v-model="name" placeholder="Name...">
                    </div>
                    <div>
                <textarea class="w-full bg-grey-light rounded p-1 h-32 block mb-2 outline-none"
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
        {{--<div class="order-10 mb-4" v-if="lastResults.length">
            <h4 class="mt-4 mb-2 font-normal">Last Results</h4>
            <ul class="list-reset">
                <li class="rounded p-2 mb-2" :class="{'bg-red-lighter': !listNames(result).length, 'bg-green-lighter': listNames(result).length}" v-for="result in lastResults">
                    <p v-if="listNames(result).length">
                        <strong>@{{result.toUpperCase()}}</strong> is in lists: @{{listNames(result).join(',')}}
                    </p>
                    <p v-else>
                        <strong>@{{result.toUpperCase()}}</strong> is in no list
                    </p>
                </li>
            </ul>
        </div>--}}
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
</div>
<script src="//webrtc.github.io/adapter/adapter-latest.js" type="text/javascript"></script>
<script src="/js/app.js?v3" type="text/javascript"></script>
</body>
</html>
