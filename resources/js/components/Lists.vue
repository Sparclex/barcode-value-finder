<template>
    <div>
        <h2 class="font-normal mb-2">Searchable Lists</h2>
        <div v-if="lists.length" class="w-full mb-4">
            <transition-group name="fade" tag="ul" class="list-reset">
                <li v-for="(list, index) in lists"
                    class="flex justify-between items-center mb-2 bg-blue-lightest rounded p-2" :key="list.name">
                    <span>{{list.name}}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="text-grey-dark cursor-pointer" @click.stop="destroy(index)">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                </li>
            </transition-group>
        </div>
        <div>
            <div>
                <input type="text" class="w-full bg-grey-light rounded px-1 py-2 mb-2 block outline-none"
                       v-model="name">
            </div>
            <div>
                <textarea class="w-full bg-grey-light rounded p-1 h-32 block mb-2 outline-none"
                          v-model="content"></textarea>
            </div>
            <button class="px-4 py-2 bg-blue rounded text-white hover:bg-blue-dark" @click.prevent="add">Add</button>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                lists: [
                    {
                        name: 'Test',
                        content: 'List'
                    },
                    {
                        name: 'Test2',
                        content: 'List'
                    },
                    {
                        name: 'Test3',
                        content: 'List'
                    },
                ],
                name: '',
                content: '',
            }
        },
        methods: {
            add() {
                if (!this.name.trim() || !this.content.trim()) {
                    return false;
                }
                for (let i = 0; i < this.lists.length; i++) {
                    if (this.lists[i].name == this.name.trim()) {
                        this.name = this.name.trim() + " 2";
                        break;
                    }
                }

                this.lists.push({
                    name: this.name.trim(),
                    content: this.content.trim()
                })
                this.name = '';
                this.content = '';
            },
            destroy(index) {
                this.lists.splice(index, 1);
            }
        }
    }
</script>
