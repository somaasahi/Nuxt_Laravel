<template>
  <div>
    <h1　class="alert alert-primary">My Comics</h1>
    <ul>
      <li v-for="comic in comics" :key="comic.id">
        {{comic.title}}
        <nuxt-link :to="{ name: 'comic-id', params: { id: comic.id } }">詳細</nuxt-link>
        <button @click="onClickDelete(comic.id)">削除</button>
      </li>
    </ul>
    <h3>新規追加</h3>
    <input v-model="newTitle" type="text" placeholder="title" /><br />
    <input v-model="newAuthor" type="text" placeholder="author" /><br />
    <button @click="onClickAdd">追加</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data () {
    return {
      comics: [],
      newTitle: '',
      newAuthor: ''
    }
  },
  mounted () {
    axios.get('/api/comics')
      .then(response => {
        this.comics = response.data.data
      })
      .catch(e => {
        console.log(e);
      })
  },
  methods: {
    onClickDelete(id) {
      console.log(id);
      axios.delete('/api/comics/' + id)
        .then(response => {
          if (response.status === 200) {
            this.comics = this.comics.filter(comic => comic.id !== id);
          }
        })
        .catch(e => {
          console.log(e);
        })
    },
    onClickAdd() {
      if (this.newTitle === '' || this.newAuthor === '') {
        console.log('入力してください');
        return;
      }
      axios.post('/api/comics/', {
          title: this.newTitle,
          author: this.newAuthor
        })
        .then(response => {
          if (response.status === 201) {
            this.comics.push(response.data.data);
            this.newTitle = '';
            this.newAuthor = '';
          }
        })
        .catch(e => {
          console.log(e);
        })
    }
  }
}
</script>
