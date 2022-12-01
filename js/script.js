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
                {headers: {'Content-Type': 'multipart/form-data'}}
            ).then(
                (response) => {
                    // console.log(this.newTodoText);
                    console.log(response.data);

                    this.newTodoText = '';
                    this.getTodo();

                })
        },
        toggleTodo(index){
            console.log(index);
            const todoFormData = {
                toggleTodoIndex: this.index,
            }
            axios.post(
                this.apiUrl,
                todoFormData,
                { headers: { 'Content-Type': 'multipart/form-data' } }
            ).then(
                (response) => {
                    // console.log(response.data);
                    this.getTodo();
                })
        },
        deleteTodo(index) {
            console.log(index);
            const todoData = {
                deleteTodoIndex: this.index,
            }
            axios.post(
                this.apiUrl,
                todoData,
                { headers: { 'Content-Type': 'multipart/form-data' } }
            ).then(
                (response) => {
                    // console.log(response.data);
                    this.getTodo();
                })
        }
    },
    mounted() {
        this.getTodo();
    },
}).mount('#app');