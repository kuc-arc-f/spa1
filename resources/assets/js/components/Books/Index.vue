<template>
<div>
    <h1> Books - Index :</h1>
    <br />
    <div class="row">
      <div class="col-sm-6">
            <ul class="pagination">
            <li class="page-item">&nbsp;<a href="#" @click="change(current_page - 1)">[ &laquo; ]</a></li>
            <li class="page-item" v-for="page in pages" :key="page" >
                &nbsp;[ <a href="#" @click="change(page)">{{page}}</a> ]
            </li>
            <li class="page-item">&nbsp;<a href="#" @click="change(current_page + 1)">[ &raquo; ]</a></li>
            </ul>
      </div>
      <div style="margin-top: 20px" class="col-sm-6 text-right">全 {{total}} 件中 {{from}} 〜 {{to}} 件表示</div>
    </div>
    <!-- table -->
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
  </div>
</template>

<script>
  export default {
    data() {
      return {
        books: [],
        current_page: 1,
        last_page: 1,
        total: 1,
        from: 0,
        to: 0
      }
    },
    mounted() {
      this.load(1)
    },
    methods: {
      load(page) {
        axios.get('/api/books?page=' + page).then(({data}) => {
          this.books = data.data
          this.current_page = data.current_page
          this.last_page = data.last_page
          this.total = data.total
          this.from = data.from
          this.to = data.to
        })
      },
      change(page) {
        if (page >= 1 && page <= this.last_page) this.load(page)
      }
    },
    computed: {
      pages() {
        let start = _.max([this.current_page - 2, 1])
        let end = _.min([start + 5, this.last_page + 1])
        start = _.max([end - 5, 1])
        return _.range(start, end)
      },
    }
  }
</script>