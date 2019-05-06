<template lang="html">
    <div>
        <div class="card" v-if="item">
            <div v-if="updated" class="alert alert-primary" role="alert">
                更新しました
            </div>
            <div class="card-body">
                <div>
                    <h1 class="card-title">{{item.title}}</h1>
                    <div class="card-text">{{item.content}}</div>
                </div>
            </div>
            <div class="card-footer">
                <time>{{item.date}}</time>
                <button class="btn btn-light text-right" v-if="!editFlg" @click="(editFlg = true)">編集</button>
                <button class="btn btn-light text-right" v-else @click="onUpdate">更新</button>
            </div>

        </div>
    </div>
</template>

<script>
export default {
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
//           console.log('#id='+ this.$route.params.id);
            axios.get('/api/articles/show/' + this.$route.params.id)
            .then( ( res ) => {
                this.item = res.data;
            });
        }
    }
}
</script>


