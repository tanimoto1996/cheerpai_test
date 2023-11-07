<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import UserProfileContainer from './UserProfile/UserProfileContainer.vue';
  import StaffListContainer from './FavoriteStaff/StaffListPresentational.vue';
  import NotificationsListContainer from './Notification/NotificationsListContainer.vue';
  import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="商品一覧" />

        <UserProfileContainer />
        <StaffListContainer />
        <NotificationsListContainer />
</template>