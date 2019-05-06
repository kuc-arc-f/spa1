<template>
    <div>
        <flash-message></flash-message>
        <h1>Index:</h1>
        <hr />
        <router-link :to="'/tasks/new/'">[ add ]</router-link>
        <hr />
        <br />
        <div v-for="task in tasks" v-bind:key="task.id">
            <p>ID : {{ task.id }}</p>
            <h1>
                <router-link :to="'/tasks/show/' + task.id">{{ task.title }}</router-link>
            </h1>
            <p>
                {{ task.content }}
                <router-link :to="'/tasks/edit/' + task.id">[ edit ]</router-link>
            </p>
            <hr />
        </div>
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

