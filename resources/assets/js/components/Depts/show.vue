<template lang="html">
    <div>
        <h1>Depts - Show:</h1>
        <div class="card" v-if="item">
            <div v-if="updated" class="alert alert-primary" role="alert">
                更新しました
            </div>
            <div class="card-body">
                <div>
                    <h1 class="card-title">{{item.name}}</h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created() {
        userState.check()
    },
    data: function( ) {
        return {
            item: null,
            editFlg: false,
            updated: false,
        }
    },
    mounted: function() {
        this.getItem();
    },
    methods: {
        getItem: function() {
            axios.get('/api/depts/show/' + this.$route.params.id)
            .then( ( res ) => {
                this.item = res.data;
            });
        }
    }
}
</script>


