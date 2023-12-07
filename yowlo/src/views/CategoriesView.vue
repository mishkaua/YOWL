<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from "axios"

let categories = ref([]);

const parentCategories = () => {
    return categories.value.filter(category => category.parent_cat_id == null)
}

const childCategories = (parentId) => {
    console.log("PARENT ID => ", parentId)
    return categories.value.filter(category => category.parent_cat_id == parentId)
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
    <v-navigation-drawer class="light" max-width="10%">
        <v-expansion-panels class="light" variant="accordion">
            <v-expansion-panel class="light" v-for="category in parentCategories()" :key="category.id">
                <v-expansion-panel-title class="light">
                    {{ category.title }}
                </v-expansion-panel-title>
                <v-expansion-panel-text class="light">
                        <v-expansion-panels>
                            <v-expansion-panel v-for="childCat in childCategories(category.id)" :key="childCat.id"
                                :title="childCat.title"
                                >
                            </v-expansion-panel>
                        </v-expansion-panels>
                </v-expansion-panel-text>
            </v-expansion-panel>
        </v-expansion-panels>
    </v-navigation-drawer>
</template>