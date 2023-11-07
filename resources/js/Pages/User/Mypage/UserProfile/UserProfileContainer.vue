<script setup>
    import { usePage } from '@inertiajs/vue3';
    import { ref } from 'vue';
    import UserProfile from './UserProfilePresentational.vue';

    const { props } = usePage();
    const userData = ref("〇〇〇さん");
</script>

<template>
    <UserProfile v-bind:name="userData" />
</template>