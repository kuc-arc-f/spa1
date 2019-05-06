<template>
    <div>
        <flash-message></flash-message>
        <h1>Depts - Index:</h1>
        <br />
        <router-link :to="'/depts/new/'" class="btn btn-primary">Add</router-link>
        <!--
        <hr />
        <br />
        -->
        <table class="table">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Employee</th>
            <th>Action</th>
        </thead>
        <tbody v-for="item in items" v-bind:key="item.id">
        <tr>
            <td>{{ item.id }}</td>
            <td>
                <h3><router-link :to="'/depts/show/' + item.id">{{ item.name }}</router-link>
                </h3>
            </td>
            <td>
                <div v-for="employee in item.employees" v-bind:key="employee.id">
                <p>employee : {{ employee.id }} : {{ employee.name }}</p>
                </div>
            </td>
            <td>
                <router-link :to="'/depts/edit/' + item.id" class="btn btn-outline-primary">edit</router-link>
            </td>
        </tr>
        </tbody>
        </table>
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

