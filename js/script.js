const { createApp } = Vue;

const app = createApp({
    data() {
        return {
            title: 'Todo List',
            newTodoText: '',
            todoList: [],
            apiUrl: './server.php'
        }
    },
    methods: {
        getTodo() {
            axios.get(this.apiUrl).then(
                (response) => {
                    // console.log(response.data);
                    this.todoList = response.data;
                })
        },
        addTodo(){
            const data = {
                newTodoText: this.newTodoText,
            }
            axios.post(
                this.apiUrl, 
                data,
                {'Content-Type': 'multipart/form-data'}
            ).then(
                (response) => {
                    // console.log(response.data);
                    
                    this.newTodoText = '';
                    this.getTodo();
                })
        }
    },
    mounted() {
        this.getTodo();
    },
}).mount('#app');