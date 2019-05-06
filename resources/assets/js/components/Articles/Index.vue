<template>
    <div>
        <div v-for="article in articles">
            <p>ID : {{ article.id }}</p>
            <h1>
                <router-link :to="'/articles/show/' + article.id">{{ article.title }}</router-link>
            </h1>
            <p>
                {{ article.content }}
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            this.fetchArticles()
        },
        data() {
            return {
                articles: []
            }
        },
        methods: {
            fetchArticles() {
                axios.get('/api/articles')
                .then(res =>  {
                    this.articles = res.data
                    //console.log(res.data )
                })
            }
        }
    }
</script>

