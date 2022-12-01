<template>
  <div>
    <h2>詳細</h2>
    <input v-model="comic.title" type="text" />
    <input v-model="comic.author" type="text" />
    <button @click="onClickEdit">修正</button>
    <nuxt-link :to="{ name: 'index' }"><p>Book List</p></nuxt-link>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data () {
    return {
      id: this.$route.params.id,
    }
  },
  asyncData ( context ) {
    return axios.get('/api/comics/' + context.params.id)
      .then(response => {
        console.log(response.data.data);
        return {
          comic: response.data.data
        }
      })
      .catch(e => {
        console.log(e);
      })
  },
  methods: {
     onClickEdit() {
        axios.put('/api/comics/' + this.id, {
          title: this.comic.title,
          author: this.comic.author
        })
        .then(response => {
          console.log(response);
        })
        .catch(e => {
          console.log(e);
        })
    }
  }
}
</script>
