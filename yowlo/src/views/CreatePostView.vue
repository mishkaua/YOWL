<script setup>
import { ref, onMounted } from 'vue';
import axios from "axios"

defineProps({
    categories: Object
})

let categories = ref([]);

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

</script>

<template>
  <form class="m-5">
    <div class="mb-3">
      <h3>Create a post</h3>
      <label for="postTitle" class="form-label">Title</label>
      <input type="text" class="form-control" id="postTitle" aria-describedby="postTitle" required>
      <div id="postTitle" class="form-text">The title is limited to 200 characters.</div>
    </div>

    <div class="mb-3">
      <label for="postLink" class="form-label">Link</label>
      <input type="text" class="form-control" id="postLink" aria-describedby="postLink" required>
      <div id="postTitle" class="form-text">Share the link with other YOWLowers.</div>
    </div>

    <div class="form-floating">
      <select class="form-select" aria-label="Category">
        <option v-for="category in parentCategories()" :key="category.id" :value="category.title">{{ category.title }}</option>
      </select>
      <label for="floatingSelect" id="floatingSelect" class="form-label">Category</label>
    </div>

    <div class="mb-3">
      <label for="postContent" class="form-label">Content</label>
      <textarea class="form-control" id="postContent" required style="height: 100px"></textarea>
      <div id="postContent" class="form-text">The post content is limited to 2000 characters.</div>
    </div>

    <button type="submit" class="dark btn-large rounded shadow px-3 py-2">Submit</button>
  </form>
</template>