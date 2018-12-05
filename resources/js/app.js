require('./bootstrap');
import Scanner from './components/Scanner';

window.Vue = require('vue');

Vue.component('scanner', Scanner);

const app = new Vue({
    el: '#app',
    data: {
        start: false,
        code: '',
        lists: [],
        showResult: false,
        name: '',
        content: '',
        show: 1,
        lastResults: [],
        resultTimeout: null,
    },
    mounted() {
        this.lastResults = localStorage.getItem('lastResults') ? JSON.parse(localStorage.getItem('lastResults')) : [];
        this.fetchLists();
    },
    computed: {
        names() {
            let names = [];
            for (let i = 0; i < this.lists.length; i++) {
                if (this.lists[i].content.toLowerCase().includes(this.code.toLowerCase())) {
                    names.push(this.lists[i].name);
                }
            }
            return names;
        }
    },
    methods: {
        listNames(code) {
            let names = [];
            for (let i = 0; i < this.lists.length; i++) {
                if (this.lists[i].content.toLowerCase().includes(code.toLowerCase())) {
                    names.push(this.lists[i].name);
                }
            }
            return names;
        },
        processResult(result) {
            if(this.code != result.codeResult.code) {
                this.code = result.codeResult.code;
                this.updateLastResult();
            }
            this.showResult = true;
            if(this.resultTimeout) {
                clearTimeout(this.resultTimeout);
            }
            this.resultTimeout = setTimeout(() => {
                this.showResult = false;
            }, 3000)
        },
        updateLastResult() {
            this.lastResults = [this.code, ...this.lastResults];
            if(this.lastResults.length > 5) {
                this.lastResults.splice(0, 1);
            }
            localStorage.setItem('lastResults', JSON.stringify(this.lastResults));
        },
        async fetchLists() {
            let {data: lists} = await axios.get('/api/lists');
            this.lists = lists;
        },
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
            axios.post('/api/lists', {
                name: this.name.trim(),
                content: this.content.trim()
            }).then(({data: list}) => {
                this.lists.push(list);
            });
            this.name = '';
            this.content = '';
        },
        destroy(index) {
            axios.delete('/api/lists/' + this.lists[index].id);
            this.lists.splice(index, 1);
        },
        showList(index) {
            if(this.show == index) {
                this.show = -1;
            } else {
                this.show = index;
            }

        }
    }
});
