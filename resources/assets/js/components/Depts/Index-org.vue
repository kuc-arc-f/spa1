<template>
    <div>
        <flash-message></flash-message>
        <h1>Depts - Index:</h1>
        <hr />
        <router-link :to="'/depts/new/'">[ add ]</router-link>
        <hr />
        <br />
        <div v-for="item in items" v-bind:key="item.id">
            <p>ID : {{ item.id }}</p>
            <h1>
                <router-link :to="'/depts/show/' + item.id">{{ item.name }}</router-link>
            </h1>
            <div v-for="employee in item.employees" v-bind:key="employee.id">
                <p>employee : {{ employee.id }} : {{ employee.name }}</p>
            </div>
            <p>
                {{ item.content }}<br />
                <router-link :to="'/depts/edit/' + item.id">[ edit ]</router-link>
            </p>
            <hr />
        </div>
    </div>
</template>

<script>
export default {
    created() {
        this.getItems()
    },
    data() {
        return {
            items: []
        }
    },
    methods: {
        getItems() {
            axios.get('/api/depts/index')
            .then(res =>  {
                this.items = res.data
                //console.log( res.data )
                /*
                this.items.forEach( function (item) {
                    console.log(item.employees );
                })
                */
            })
        }
    }
}
</script>

