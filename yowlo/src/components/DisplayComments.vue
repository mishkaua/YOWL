<script setup>
defineProps({
    comments: Object
})
</script>

<template>
    <div class="border rounded shadow">
        <div v-for="comment in comments" :key="comment.id">
            <span>By {{ comment.name }}</span> | <span>On {{ comment.created_at }}</span>
            <p class="p-1"><small>{{ comment.content }}</small></p>
        </div>
    </div>
</template>
