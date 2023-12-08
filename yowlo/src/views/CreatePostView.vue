<script setup>
import { ref, onMounted } from 'vue';
import axios from "axios"
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import router from '../router';
const $toast = useToast();

defineProps({
  categories: Object
})

let categories = ref([]);
let selected = "";
let postTitle = "";
let postLink = "";
let postContent = "";

const parentCategories = () => {
  return categories.value.filter(category => category.parent_cat_id == null)
}

onMounted(async () => {
  getCategories();
})

function getCategories() {
  axios.get('http://localhost:8000/api/categories')
    .then(response => {
      categories.value = response.data
      console.log('Categories:', categories)
    })
    .catch(error => {
      console.error("Error getting categories:", error);
    });
}

function validTitle(postTitle) {
  let validTitlePattern = new RegExp("^[a-zA-Z]+(?:[-'\\s][a-zA-Z]+)*$");
  if (validTitlePattern.test(postTitle)) {
    return true;
  }
  return false;
}

function validLink(postLink) {
  let validTitlePattern = new RegExp("^[a-zA-Z]+(?:[-'\\s][a-zA-Z]+)*$");
  if (validTitlePattern.test(postLink)) {
    return true;
  }
  return false;
}

function validContent(postContent) {
  let validContentPattern = new RegExp("^[a-zA-Z]+(?:[-'\\s][a-zA-Z]+)*$");
  if (validContentPattern.test(postContent)) {
    return true;
  }
  return false;
}

function addPost() {
  if (validTitle() && validLink() && validContent()) {
    const post = {
      user_id: localStorage.getItem('id_locally_stored'),
      categories_id: selected,
      title: postTitle,
      link: postLink,
      content: postContent,
      created_at: new Date(),
    }
    console.log(post)
    axios.post('http://localhost:8000/api/post/add', post)
      .then(response => {
        console.log(response.data)
        setTimeout($toast.success('Post successfully created'), 3000)
        router.push('/')
      })
      .catch(error => {
        console.error("Error adding a post:", error);
      })
  
  } else {
    console.log("Invalid data format in a post")
  }
}

</script>

<template>
  <form class="m-3 light" @submit.prevent="addPost()">
    <div class="mb-1">
      <h3>Create a post</h3>
      <label for="postTitle" class="form-label">Title</label>
      <input type="text" class="form-control" maxlength="200" v-model="postTitle" aria-describedby="postTitle" required>
      <div id="postTitle" class="form-text">The title is limited to 200 characters.</div>
    </div>

    <div class="mb-2">
      <label for="postLink" class="form-label">Link</label>
      <input type="text" class="form-control" v-model="postLink" aria-describedby="postLink" required>
      <div id="postTitle" class="form-text">Share the link with other YOWLowers.</div>
    </div>

    <div class="form-floating">
      <select v-model="selected" class="form-select" aria-label="Category">
        <option v-for="category in parentCategories()" :key="category.id" :value="category.id">{{ category.title }}
        </option>
      </select>
      <label for="floatingSelect" id="floatingSelect" class="form-label">Category</label>
    </div>

    <div class="mb-1">
      <label for="postContent" class="form-label">Content</label>
      <textarea class="form-control" maxlength="2000" v-model="postContent" required style="height: 100px"></textarea>
      <div id="postContent" class="form-text">The post content is limited to 2000 characters.</div>
    </div>

    <button type="submit" class="dark btn-large rounded shadow px-3 py-2">Submit</button>
  </form>
</template>