<template>
    <div>
        <flash-message></flash-message>
        <h1>Tasks- index:</h1>
        <hr />
        <router-link :to="'/tasks/new/'" class="btn btn-primary">Add</router-link>
        <table class="table">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Content</th>
            <th>Action</th>
        </thead>
        <tbody v-for="task in tasks" v-bind:key="task.id">
        <tr>
            <td>{{ task.id }}</td>
            <td>
                <h3><router-link :to="'/tasks/show/' + task.id">{{ task.title }}</router-link>
                </h3>
            </td>
            <td>{{ task.content }}</td>
            <td>
                <router-link :to="'/tasks/edit/' + task.id" class="btn btn-outline-primary">edit</router-link>
            </td>
        </tr>
        </tbody>
        </table>    
    </div>
</template>

<script>
import {Mixin} from '../../mixin'

export default {
    mixins:[Mixin],
    created() {
//        console.log(this.sysConst.STORAGE_KEY_userData)
        this.check_userState(this.sysConst.STORAGE_KEY_userData, this)
        //userState.check()
        this.getTasks()
    },
    data() {
        return {
            tasks: []
        }
    },
    methods: {
        getTasks() {
            axios.get('/api/tasks')
            .then(res =>  {
                this.tasks = res.data
                //console.log( res.data )
            })
        }
    }
}
</script>

