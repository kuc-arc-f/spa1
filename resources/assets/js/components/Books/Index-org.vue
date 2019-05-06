<template>
  <table class="table table-bordered">
    <thead>
      <tr><th>ID</th><th>タイトル</th><th>コンテンツ</th></tr>
    </thead>
    <tbody>
      <tr v-for="book in books" :key="book.id">
        <td>{{book.id}}</td>
        <td>{{book.title}}</td>
        <td>{{book.content}}</td>

      </tr>
    </tbody>
  </table>
</template>

<script>
  export default {
    data() {
      return {
        books: []
      }
    },
    mounted() {
      axios.get('/api/books').then(res => {
        this.books = res.data.data
      })
    }
  }
</script>