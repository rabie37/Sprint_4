<template >

  <div  id="up" class="search text-light">
    <h2 class="text-light bg-dark" >Nasa Image Search</h2>
    <form class="w-50 m-auto input-group mb-3" v-on:submit.prevent="getResult(query)">
      <input class="form-control" type="text" placeholder="Type in your search" v-model="query" aria-label="Recipient's username" aria-describedby="button-addon2" />

    </form>
    <div class="container-fluid">
    <div  v-if="results" class="row m-auto ">
      <div class="col-md-3  " v-for="result in results" v-bind:key="result">
          <img class="w-100  mb-3 " style="height:200px"  v-bind:src="result.links[0].href" />
      </div>
    </div>

  </div>
</div>


</template>

<style >
*{
  background-color: black;
}
</style>

<script>
import axios from 'axios';
export default {
  name: 'Vuenasa',
  data () {
    return {
      msg: 'Search',
      query: '',
      results: ''
    }
  },
  methods: {
      getResult(query) {
        axios.get('https://images-api.nasa.gov/search?q=' + query + '&media_type=image').then( response => {
            console.log(response.data.collection.items);
            this.results = response.data.collection.items;
        });
      }
  }
}


// </style>
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.results img {
    height: 300px;
    margin: 10px;
}
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>